<html>
<head>
<title>ThaiCreate.Com Tutorial</title>
</head>
<body>
<script language="javascript">
function fncSubmit()
{
	for(i=1;i<=document.form1.hdnLine.value;i++)
	{
		if(eval("document.form1.txtName"+i+".value")=="")
		{
			alert("Please input Input "+i+" Thank.");
			eval("document.form1.txtName"+i+".focus();")
			return false;
		}
	}
	document.form1.submit();
}
</script>
<form action="index.php" method="post" name="form1" onSubmit="JavaScript:return fncSubmit();">
Input 1 <input name="txtName[]" id="txtName1" type="text"><br>
Input 2 <input name="txtName[]" id="txtName2" type="text"><br>
Input 3 <input name="txtName[]" id="txtName3" type="text"><br>
Input 4 <input name="txtName[]" id="txtName4" type="text"><br>
Input 5 <input name="txtName[]" id="txtName5" type="text"><br>
<input type="hidden" name="hdnLine" value="5">
<input name="btnSubmit1" type="submit" value="Submit" >
</form>
</body>
</html>