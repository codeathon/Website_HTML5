    function jAPIRemote(scriptURL, params)
    {
        var xmlHttp;
        try
        {
            // Firefox, Opera 8.0+, Safari and other "NORMAL" browsers
            xmlHttp=new XMLHttpRequest();
        }
        catch (e)
        {
            // IE ( (Imbecil Engine (Internet Explorer))
            try
            {
                xmlHttp=new ActiveXObject("Msxml2.XMLHTTP");
            }
            catch (e)
            {
                try
                {
                    xmlHttp=new ActiveXObject("Microsoft.XMLHTTP");
                }
                catch (e)
                {
                    alert("Your browser does't support AJAX!");
                    return false;
                }
            }
        }
           
            xmlHttp.open('POST',scriptURL,false);
            xmlHttp.setRequestHeader("Content-type", "application/x-www-form-urlencoded");
            xmlHttp.setRequestHeader("Content-length", params.length);
            xmlHttp.setRequestHeader("Connection","close");
            xmlHttp.send(params);

            if(xmlHttp.status == 200)
            {
                return xmlHttp.responseText;
            }
            else
            {
                return "Some error occurred!";
            }
    }
