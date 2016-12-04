<div class="header">Viết Bài</div>
<?php
if(isset($_POST['submit_vietbai']))
{
	//xử lý file ảnh đại diện upload
	$subject=$_POST['subject'];
	$parent=$_POST['parent'];
	$des=$_POST['des'];
	$content=$_POST['content'];
	$date_add=date("Y-m-d");
	$author=$_SESSION['uid'];
	////////////////////////////////////////////////////////////
	$uploadOk = 0;
	if($_FILES['image_bv']['name']!=NULL)
	{
		$target_dir="images/";
		$target_file = $target_dir . basename($_FILES["image_bv"]["name"]);
		$uploadOk = 1;
		$imageFileType = pathinfo($target_file,PATHINFO_EXTENSION);
		//check fake image
		$check = getimagesize($_FILES["image_bv"]["tmp_name"]);
		if($check == false) $uploadOk = 0;
		// Check if file already exists
		$i=0;
		while(file_exists($target_dir . $i . '_' . basename($_FILES["image_bv"]["name"]))) $i++;
		$target_file=$target_dir . $i . '_' . basename($_FILES["image_bv"]["name"]);
		// Check file size
		if ($_FILES["image_bv"]["size"] > 5000000) $uploadOk = 0;
		// Allow certain file formats
		if($imageFileType != "jpg" && $imageFileType != "png" && $imageFileType != "jpeg" && $imageFileType != "gif" ) $uploadOk = 0;
		// Check if $uploadOk
		if ($uploadOk == 1) 
		{
		    if (move_uploaded_file($_FILES["image_bv"]["tmp_name"], $target_file))
		        echo "The file ". basename( $_FILES["image_bv"]["name"]). " has been uploaded.<br/>";
		    else $uploadOk = 0;
		}
		$image_bv="/admin/".$target_file;
	}
	else
	{
		$sql="SELECT image FROM chuyenmuc WHERE id=$parent";
		$result=mysqli_query($conn,$sql);
		$row=mysqli_fetch_assoc($result);
		$image_bv=$row['image'];
		$sql=NULL;
		$result=NULL;
		$row=NULL;
	}
	//////////////////////////////
	$sql="INSERT INTO baiviet(subject,des,content,parent,image_bv,date_add,author) VALUES('$subject','$des','$content',$parent,'$image_bv','$date_add',$author)";
	if(mysqli_query($conn,$sql)) echo "đã đăng bài viết thành công!";
	else echo "có lỗi xảy ra!";
	$sql=NULL;
}
?>
<!--form viet bai viet moi -->
<form action="" method="post" enctype="multipart/form-data">
	Tiêu Đề Bài viết: 
		<input type="text" name="subject"/><br/>
	chuyên mục:
		<select name="parent">
<?php
$sql="SELECT * FROM chuyenmuc ORDER BY id DESC";
$result=mysqli_query($conn,$sql);
while($row=mysqli_fetch_assoc($result))
{
?>
	<option value="<?php echo $row['id']; ?>"><?php echo $row['title']; ?></option>
<?php
}
$sql=NULL;
$result=NULL;
$row=NULL;
?>
		</select><br/>
	Hình ảnh đại diện : 
		<input type="file" name="image_bv"/><br/>
	<b>Description:</b><br/>
		<textarea name="des"></textarea><br/>
	<b>Content:</b><br/>
		<textarea name="content" class="ckeditor"></textarea>
		<input type="submit" name="submit_vietbai" value="POST"/>
</form>