<div class="header">Thêm Chuyên Mục</div>
<?php
if(isset($_POST['submit_add_chuyenmuc']))
{
	if($_FILES['image']['name']!=NULL)
	{
		$target_dir="images_cm/";
		$target_file = $target_dir . basename($_FILES["image"]["name"]);
		$uploadOk = 1;
		$imageFileType = pathinfo($target_file,PATHINFO_EXTENSION);
		//check fake image
		$check = getimagesize($_FILES["image"]["tmp_name"]);
		if($check == false) $uploadOk = 0;
		// Check if file already exists
		$i=0;
		while(file_exists($target_dir . $i . '_' . basename($_FILES["image"]["name"]))) $i++;
		$target_file=$target_dir . $i . '_' . basename($_FILES["image"]["name"]);
		// Check file size
		if ($_FILES["image"]["size"] > 5000000) $uploadOk = 0;
		// Allow certain file formats
		if($imageFileType != "jpg" && $imageFileType != "png" && $imageFileType != "jpeg" && $imageFileType != "gif" ) $uploadOk = 0;
		// Check if $uploadOk
		if ($uploadOk == 1) 
		{
		    if (move_uploaded_file($_FILES["image"]["tmp_name"], $target_file))
		        echo "The file ". basename( $_FILES["image"]["name"]). " has been uploaded.<br/>";
		    else $uploadOk = 0;
		}
		$image="/admin/".$target_file;
		$title=$_POST['title'];
		//////////////////////////////////SQL/////////////////////////////////////////////////
		if($uploadOk == 1)
		{
			$sql="INSERT INTO chuyenmuc(title,image) VALUES('$title','$image')";
			if(mysqli_query($conn,$sql)) echo "đã thêm chuyên mục thành công!";
			else echo "có lỗi xảy ra";
		}
		else echo "upload có lỗi xảy ra!";
	}
}
?>
<form action="" method="post" enctype="multipart/form-data">
	Tiêu Đề Chuyên Mục: <input type="text" name="title"/><br/>
	Hình Ảnh: <input type="file" name="image"/><br/>
	<input type="submit" name="submit_add_chuyenmuc" value="Add"/>
</form>