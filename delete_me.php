<html>
	<head>

	<script type="text/javascript" src="http://jquery.com/src/jquery-latest.js"></script>

	</head>
	<body>

	<form action="" method="GET">
		<div id="blacklist">
			<input type="button" name="blacklist" id="button_blacklist" value="Blacklist" onClick="blacklist1()" />
		</div>
	</form>
	<script type="text/javascript" >
	function blacklist1(){
        var phone="55";
        alert(phone);
        var id="1";
        alert(id);
        $("#comandni_div").load("HIV-AIDS/getTPLinks?tp_number=1&lang=1,function() {
        var reciverParameters = $("#comandni_div").html();
        var parser = new Array();
        parser = reciverParameters.split(",");
        alert(parser);
                });
		}

	</script>

<div id="comandni_div" style="width:1px; height:1px; overflow:hidden;"></div>

</html>
