<?php include_once "header.php"; ?>
<div class="body-content">
<table style="width:100%">
	<tr>
		<td style="vertical-align:top;width:75%">
<?php
if(isset($_POST['submit_cauhoi']))
{
	$subject=$_POST['subject'];
	$content=$_POST['content'];
	$des="";
	$date_add=date("Y-m-d");
	$author=$_SESSION['uid'];
	$parent=43;
	$image_bv="/admin/images_cm/0_cau_hoi.png";
	$sql="INSERT INTO baiviet(subject,content,des,date_add,author,parent,image_bv) VALUES('$subject', '$content', '$des', '$date_add', $author, $parent, '$image_bv')";
	mysqli_query($conn,$sql);
	$sql=NULL;
	///////////////set theo doi cho user và chuyển hướng
	$sql="SELECT * FROM baiviet ORDER BY idbv DESC LIMIT 2";
	$result=mysqli_query($conn,$sql);
	$row=mysqli_fetch_assoc($result);
	$td_idbv=$row['idbv'];
	$td_uid=$_SESSION['uid'];
	$sql=NULL;$result=NULL;
	$sql="INSERT INTO theo_doi(td_uid,td_idbv) VALUES($td_uid,$td_idbv)";
	mysqli_query($conn,$sql);
	$sql=NULL;
	$s=$td_idbv."-".rewrite($row['subject']).".html";
	$row=NULL;
	header("location:$s");
}
?>
			<div class="header">Đặt Câu Hỏi</div>
			<form action="" method="post">
				<b>tiêu đề câu hỏi:</b><input style="width:400px" type="text" name="subject"/><br/><br/>
				<b>nội dung chi tiết câu hỏi:</b><br/>
				<textarea name="content" class="ckeditor"></textarea><br/>
				<input type="submit" name="submit_cauhoi" value="Đăng Câu Hỏi"/>
			<form>
		</td>
<?php include "footer.php"; ?>