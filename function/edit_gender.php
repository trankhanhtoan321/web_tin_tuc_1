<?php
if(isset($_POST['submit_new_gender']))
{
	$new_gender=$_POST['new_gender'];
	$sql1="UPDATE users SET gender='$new_gender' WHERE uid=$uid";
	if(mysqli_query($conn,$sql1)) header("location: profile.php");
	else echo "có lỗi cảy ra<br/>";
}
?>
<b>edit gender: </b><br/>
<form action="" method="post">
	<input type="radio" name="new_gender" value="male"/> male/boy/man (Nam)<br/>
	<input type="radio" name="new_gender" value="female"/> female/girl/woman (Nữ)<br/>
	<input type="submit" name="submit_new_gender" value="edit"/>
</form>