<?php
if(isset($_POST['submit_new_avatar']))
{
	$target_dir="uploads/avatar/";
	$target_file = $target_dir . basename($_FILES["new_avatar"]["name"]);
	$uploadOk = 1;
	$imageFileType = pathinfo($target_file,PATHINFO_EXTENSION);
	$check = getimagesize($_FILES["new_avatar"]["tmp_name"]);
	if($check == false) $uploadOk = 0;
	// Check if file already exists
	$i=0;
	while(file_exists($target_dir . $i . '_' . basename($_FILES["new_avatar"]["name"]))) $i++;
	$target_file=$target_dir . $i . '_' . basename($_FILES["new_avatar"]["name"]);
	// Check file size
	if ($_FILES["new_avatar"]["size"] > 5000000) $uploadOk = 0;
	// Allow certain file formats
	if($imageFileType != "jpg" && $imageFileType != "png" && $imageFileType != "jpeg" && $imageFileType != "gif" ) $uploadOk = 0;
	// Check if $uploadOk
	if ($uploadOk == 1) 
	{
	    if (move_uploaded_file($_FILES["new_avatar"]["tmp_name"], $target_file))
	    {
	        if(($row['avatar']!="uploads/avatar/user_male.png") and ($row['avatar']!="uploads/avatar/user_female.png"))
	        	unlink($row['avatar']);
	    }
	    else $uploadOk = 0;
	}
	//xu ly sau upload avatar
	if($uploadOk == 1)
	{
		$sql1="UPDATE users SET avatar='$target_file'WHERE uid=$uid";
		if(mysqli_query($conn,$sql1)) header("location: profile.php");
		else echo "có lỗi xảy ra<br/>";
	}
}
?>
<b>edit avatar:</b>
<form action="" method="post" enctype="multipart/form-data">
	<input type="file" name="new_avatar"/><br>
	<input type="submit" name="submit_new_avatar" value="edit"/>
</form>