<div class="header">xóa chuyên mục</div>
<?php
////////////////xử lý//////////////////////
if(isset($_POST['submit_del_chuyenmuc']))
{
	$id=$_POST['id'];
	$sql="DELETE FROM chuyenmuc WHERE id=$id";
	if(mysqli_query($conn,$sql)) echo "đã xóa chuyên mục thành công!";
	else echo "có lỗi xảy ra";
	$sql=NULL;
}
//////////////////////////////////////////////
?>
<form action="" method="post">
	chọn chuyên mục cần xóa: <select name="id">
	<option value="NULL">chọn chuyên mục</option>
<?php
$sql="SELECT * FROM chuyenmuc ORDER BY id DESC";
$result=mysqli_query($conn,$sql);
while($row=mysqli_fetch_assoc($result))
{
?>
		<option value="<?php echo $row['id']; ?>">
			<?php echo $row['title']; ?>
		</opton>
<?php
}
$sql=NULL;
$result=NULL;
$row=NULL;
?>
	</select><br/><br/>
	<input type="submit" name="submit_del_chuyenmuc" value="DELETE"/>
</form>