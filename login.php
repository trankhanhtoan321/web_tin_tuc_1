<?php include "header.php" ?>
<table style="width:100%">
	<tr>
		<td style="vertical-align:top;width:75%">
			<div class="header">user login</div>
<?php
if(isset($_POST['login']))
{
	$n=$_POST['username'];
	$p=$_POST['password'];
	$sql="SELECT * FROM users WHERE username='".$n."' AND pass='".md5($p)."'";
	$result=mysqli_query($conn,$sql);
	$row=mysqli_fetch_assoc($result);
	if(mysqli_num_rows($result)==1 && $row['checkmail']==1)
	{
		$sql="UPDATE users SET lastlogin='".time()."' WHERE uid='".$row['uid']."'";
		mysqli_query($conn,$sql);
		$_SESSION['uid']=$row['uid'];
		echo "<meta http-equiv=\"refresh\" content=\"0;url=/profile.php\" />";
	}
	else echo "<br/>đăng nhập không thành công!<br/><br/>";
}

?>
			<form action="login.php" method="post">
				UserName: <input type="text" name="username"/><br/>
				PassWord: <input type="password" name="password"/><br/>
				<input type="submit" name="login" value="Login"/>
			</form>
		</td>
<?php include "footer.php" ?>