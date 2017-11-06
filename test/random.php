<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>Untitled Document</title>

</head>

<body>

<script>
var keylist="abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ123456789"
var temp=''

function generatepass(plength){
temp=''
for (i=0;i<plength;i++)
temp+=keylist.charAt(Math.floor(Math.random()*keylist.length))
return temp
}

function populateform(enterlength){
document.pgenerate.output.value=generatepass(enterlength)
}
</script>
<br>
<table width="277" border="0" cellpadding="0" cellspacing="0" align="center">
 <form name="pgenerate">
  <tr>
    <td width="248"><input type="text" size=21 name="output">
      <input name="button" type="button" onClick="populateform(this.form.thelength.value)" value="สุ่มรหัสผ่าน" style="cursor:hand;">
    </td>   
  </tr>
  <tr>
    <td><font size="2"><b>ระบุจำนวนตัวอักษรของรหัสผ่าน:</b></font>
      <input type="text" name="thelength" size=3 value="7" >
    </td>
  </tr>
  </form>
</table>
</body>
</html>

