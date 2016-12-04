<?php
if(isset($_POST['submit_new_email']))
{
	$new_email=$_POST['new_email'];
	$sql1="SELECT * FROM users WHERE email='$new_email'";
	$result1=mysqli_query($conn,$sql1);
	if(mysqli_num_rows($result1)>0) echo "email đã có người sử dụng<br/>";
	else 
	{
		$sql1="UPDATE users SET email='$new_email' WHERE uid=$uid";
		if(mysqli_query($conn,$sql1)) header("location: profile.php");
		else echo "có lỗi cảy ra<br/>";
	}
}
?>
<b>edit email: </b><br/>
<form action="" method="post">
	<input type="email" name="new_email" value="<?php echo $row['email']; ?>"/><br/>
	<input type="submit" name="submit_new_email" value="edit"/>
</form>