<?php
/**
 * jAPIBaseClass   Base class that extends all classes from which we want to get reflections
 *
 * @author Vladica Savic
 *
 */
class jAPIBaseClass {
    /**
     * @return string   Get reflections from specific class name
     */
    private function GetReflection($className) {
        $methods = array();
        $reflection = new ReflectionClass( $className );
        $scriptLocation = str_replace("\\","/","http://".$_SERVER["HTTP_HOST"]."/".substr($reflection->getFileName(),strlen($_SERVER["DOCUMENT_ROOT"])));

        foreach( $reflection->getMethods() as $method )
            if ( $method->isPublic() && ( $method->getDeclaringClass()->name == $className ) )
                $methods[] = array( 'ClassName'=>$className, 'MethodName' => $method->getName(), 'MethodParams' => $method->getNumberOfRequiredParameters(),'ScriptLocation'=>$scriptLocation );
        return json_encode( $methods );
    }

    /**
     * @return mixed   Result of the action
     */
    private function jAPICallFunction($className, $methodName) {

        $reflectedData = json_decode($this->GetReflection($className));
        $class                         =$reflectedData[0]->ClassName;
        $method                        =$reflectedData[0]->MethodName;
        $numberOfRequiredParameters    =$reflectedData[0]->MethodParams;
        $scriptLocation                =$reflectedData[0]->ScriptLocation;

        $jAPIHelper = new jAPIHelper();
        $params = array();
        for($counter = 1; $counter <= $numberOfRequiredParameters; $counter++) {
            $params[] = $_POST['Arg'.$jAPIHelper->SpellNumber($counter)];
        }

        //Finaly, here we are calling
        return call_user_func_array(array($className, $methodName),$params);
    }

    /**
     * jAPIJS Class Constructor
     */
    function __construct($classNames) {
        if($_SERVER['REQUEST_METHOD'] == 'POST') {
            $requestParams = array();
            foreach ($_POST as $key => $value) {
                if ($key != "action" && $value != "jAPIRequest") {
                    $requestParams[$key] = "$value";
                }
            }
            return $this->jAPICallFunction($_POST["jAPIMethodClassName"],$_POST["jAPIMethodName"]);
        }else {
            foreach(explode(',',$classNames) as $class) {
                $reflectedClassData = json_decode($this->GetReflection($class));
                new jAPIJS($reflectedClassData);
            }
        }
    }
}

/**
 * jAPIJS Class
 *
 * @author Vladica Savic
 *
 */
class jAPIJS {
    /**
     * @var string   jAPI JavaScript Template name
     */
    public $templateFile = "js/jAPI-Template.js";

    /**
     * @var string   Class name
     */
    public $class;

    /**
     * @var string   Method name
     */
    public $method;

    /**
     * @var int   Number of method arguments
     */
    public $methodArguments;

    /**
     * @return string   ParsedJavascript template
     */
    private function GetJavascript($reflectedClassData) {
        $jAPIModel = null;

        $jAPIHelper = new jAPIHelper();
        $jAPIModel = $reflectedClassData[0]->ClassName.'={';

        foreach($reflectedClassData as $reflectedData) {
            $methodArguments = null;
            $params = null;
            for($counter = 1; $counter <= $reflectedData->MethodParams; $counter++) {
                $methodArguments .= '+"&Arg'.$jAPIHelper->SpellNumber($counter).'="+Arg'.$jAPIHelper->SpellNumber($counter);
                $params .= 'Arg'.$jAPIHelper->SpellNumber($counter).',';
            }

            $translator = array('[%methodName%]' => $reflectedData->MethodName,
                    '[%scriptURL%]' => $reflectedData->ScriptLocation,
                    '[%params%]' => substr($params,0,(strlen($params)-1)),
                    '[%postData%]'=>'"action=jAPIRequest&jAPIMethodClassName='.$reflectedData->ClassName.'&jAPIMethodName='.$reflectedData->MethodName.'"'.$methodArguments.';');

            $jsMethodModel = '[%methodName%]:function([%params%]){ var serverMethodParams = [%postData%] return jAPIRemote("[%scriptURL%]",serverMethodParams); },';
            $jAPIModel .= strtr($jsMethodModel, $translator);
        }

        $jAPIModel = rtrim($jAPIModel,',');
        $jAPIModel.='};';

        echo $jAPIModel;
    }

    /**
     * jAPIJS Class Constructor
     */
    function __construct($reflectedClassData) {
        $this->GetJavascript($reflectedClassData);
    }
}

/**
 * jAPIHelper Class
 *
 * @author Vladica Savic
 *
 */
class jAPIHelper {
    /**
     * @return string   Convert number into word
     */
    public function SpellNumber($number) {
        if (($number < 0) || ($number > 999999999)) {
            throw new Exception("Number is out of range");
        }

        $Gn = floor($number / 1000000);  /* Millions (giga) */
        $number -= $Gn * 1000000;
        $kn = floor($number / 1000);     /* Thousands (kilo) */
        $number -= $kn * 1000;
        $Hn = floor($number / 100);      /* Hundreds (hecto) */
        $number -= $Hn * 100;
        $Dn = floor($number / 10);       /* Tens (deca) */
        $n = $number % 10;               /* Ones */

        $res = "";

        if ($Gn) {
            $res .= convert_number($Gn) . " Million";
        }

        if ($kn) {
            $res .= (empty($res) ? "" : " ") .
                    convert_number($kn) . " Thousand";
        }

        if ($Hn) {
            $res .= (empty($res) ? "" : " ") .
                    convert_number($Hn) . " Hundred";
        }

        $ones = array("", "One", "Two", "Three", "Four", "Five", "Six",
                "Seven", "Eight", "Nine", "Ten", "Eleven", "Twelve", "Thirteen",
                "Fourteen", "Fifteen", "Sixteen", "Seventeen", "Eightteen",
                "Nineteen");
        $tens = array("", "", "Twenty", "Thirty", "Fourty", "Fifty", "Sixty",
                "Seventy", "Eigthy", "Ninety");

        if ($Dn || $n) {
            if (!empty($res)) {
                $res .= " and ";
            }

            if ($Dn < 2) {
                $res .= $ones[$Dn * 10 + $n];
            }
            else {
                $res .= $tens[$Dn];

                if ($n) {
                    $res .= "-" . $ones[$n];
                }
            }
        }

        if (empty($res)) {
            $res = "zero";
        }

        return $res;
    }
}
?>
