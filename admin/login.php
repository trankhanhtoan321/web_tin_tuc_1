<?php 
require("../config.php");
session_start();
?>
<html>
	<head>
		<meta http-equiv="Content-Type" content="text/html; charset=utf-8"/>
		<link href="css/style.css" rel="stylesheet" type="text/css"/>
		<link rel="icon" href="../css/images/icon.png" type="image/png" sizes="16x16">	
		<title>Login Lập trình 321</title>
	</head>
	<body style="background-image:url(css/images/bg.jpg);">
		<table style="width:100%;height:100%;text-align:center;">
			<tr>
				<td> 
<?php
if(isset($_POST['submit']))
{
	$username=$_POST['user'];
	$pass=md5($_POST['pass']);
	$sql="SELECT * FROM users WHERE username='$username' AND pass='$pass' AND uid=1";
	$result=mysqli_query($conn,$sql);
	$sql=NULL;
	if(mysqli_num_rows($result)==1)
	{
		$_SESSION['uid']=1;
		header("location:./");

	}
	else
	{
?>
<font style="color:red;font-style:strong">Đăng Nhập Không Thành Công!</font>
<?php
	}
}
if(isset($_SESSION['uid']))
{
	if($_SESSION['uid']==1) header("location:./");
}
?>
					<form action="" method="post">
						<input type="text" name="user"/><br/>
						<input type="password" name="pass"/><br/>
						<input type="submit" name="submit" value="Login"/>
					</form>
				</td>
			</tr>
		</table>
	</body>
</html>
<?php mysqli_close($conn);?>