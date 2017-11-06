
<?php
        session_start();
        $serverName   = "localhost";
        $userName     = "root";
        $userPassword = "";
        $dbName   = "waterwork";
        $conn = mysqli_connect($serverName,$userName,$userPassword,$dbName);
   
        $strUsername = mysqli_real_escape_string($conn,$_POST['txtUsername']);
        $strPassword = mysqli_real_escape_string($conn,$_POST['txtPassword']);
	
        $strSQL = "SELECT * FROM member WHERE Username = '".$strUsername."'and Password = '".$strPassword."'";
        $objQuery = mysqli_query($conn,$strSQL);
        $objResult = mysqli_fetch_array($objQuery);
	
	if(!$objResult)
	{
	    header("location:../login_admin.php");
	}
	else
	{
			$_SESSION["UserID"] = $objResult["UserID"];
			$_SESSION["Status"] = $objResult["Status"];

			session_write_close();
			
			if($objResult["Status"] == "admin")
			{
				header("location:../../menu_page/homepage_admin.php");
			}
			else
			{
				header("location:user_page.php");
			}
	}
	mysql_close();
?>