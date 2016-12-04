<?php
if(isset($_POST['submit_new_username']))
{
	$new_username=$_POST['new_username'];
	$sql1="SELECT * FROM users WHERE username='$new_username'";
	$result1=mysqli_query($conn,$sql1);
	if(mysqli_num_rows($result1)>0) echo "username đã có người sử dụng<br/>";
	else 
	{
		$sql1="UPDATE users SET username='$new_username' WHERE uid=$uid";
		if(mysqli_query($conn,$sql1)) header("location: profile.php");
		else echo "có lỗi cảy ra<br/>";
	}
}
?>
<b>edit username: </b><br/>
<form action="" method="post">
	<input type="text" name="new_username" value="<?php echo $row['username']; ?>"/><br/>
	<input type="submit" name="submit_new_username" value="edit"/>
</form>