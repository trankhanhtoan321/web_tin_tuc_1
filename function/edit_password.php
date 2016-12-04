<?php
if(isset($_POST['submit_new_password']))
{
	$new_password=md5($_POST['new_password']);
	$old_password=md5($_POST['old_password']);
	$sql1="SELECT * FROM users WHERE uid=$uid AND pass='$old_password'";
	$result1=mysqli_query($conn,$sql1);
	if(mysqli_num_rows($result1)>0)
	{
		$sql1="UPDATE users SET pass='$new_password' WHERE uid=$uid";
		if(mysqli_query($conn,$sql1)) header("location: profile.php");
		else echo "có lỗi cảy ra<br/>";
	}
	else echo "nhập password hiện tại không đúng<br/>";
}
?>
<b>edit password: </b><br/>
<form action="" method="post">
	old password: <input type="password" name="old_password"/><br/>
	new password: <input type="password" name="new_password"/><br/>
	<input type="submit" name="submit_new_password" value="edit"/>
</form>