<div class="header">config</div>
<?php
////////////////////xu ly///////////////////////////////
if(isset($_POST['submit_edit_config']))
{
	$footer=$_POST['footer'];
	$maxpage=$_POST['maxpage'];
	$maxpage_cmt=$_POST['maxpage_cmt'];
	$facebook=$_POST['facebook'];
	$google=$_POST['google'];
	$youtube=$_POST['youtube'];
	$sql="UPDATE options SET footer='$footer',maxpage=$maxpage,maxpage_cmt=$maxpage_cmt,facebook='$facebook',google='$google',youtube='$youtube'";
	if(mysqli_query($conn,$sql)) echo "đã cập nhât thành công";
	else echo "có lỗi xảy ra";
	$sql=NULL;
}
//////////////////////////////////////////////////////
$sql="SELECT * FROM options";
$result=mysqli_query($conn,$sql);
$row=mysqli_fetch_assoc($result);
$sql=NULL;$result=NULL;
?>
<form action="" method="post">
	<b>footer content:</b><br/><textarea class="ckeditor" name="footer"><?php echo $row['footer']; ?></textarea><br/>
	<b>max item / page :</b><input type="number" name="maxpage" value="<?php echo $row['maxpage']; ?>"/><br/>
	<b>max item comment / page :</b><input type="number" name="maxpage_cmt" value="<?php echo $row['maxpage_cmt']; ?>"/><br/>
	<b>facebook :</b><input type="text" name="facebook" value="<?php echo $row['facebook']; ?>"/><br/>
	<b>google :</b><input type="text" name="google" value="<?php echo $row['google']; ?>"/><br/>
	<b>youtube :</b><input type="text" name="youtube" value="<?php echo $row['youtube']; ?>"/><br/>
	<input type="submit" name="submit_edit_config" value="UPDATE"/>
</form>