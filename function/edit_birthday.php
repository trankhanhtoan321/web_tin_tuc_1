<?php
if(isset($_POST['submit_new_birthday']))
{
	$new_birthday=$_POST['new_birthday'];
	$sql1="UPDATE users SET birthday='$new_birthday' WHERE uid=$uid";
	if(mysqli_query($conn,$sql1)) header("location: profile.php");
	else echo "có lỗi cảy ra<br/>";
}
?>
<b>edit birthday: </b><br/>
<form action="" method="post">
	<input type="date" name="new_birthday" value="<?php echo $row['birthday']; ?>"/><br/>
	<input type="submit" name="submit_new_birthday" value="edit"/>
</form>