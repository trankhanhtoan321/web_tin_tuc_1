<div class="header">xóa bài viết</div>
<?php
////////////////xử lý////////////////////////////////////
if(isset($_GET['idbv']))
{
	$idbv=$_GET['idbv'];
	$sql="DELETE FROM baiviet WHERE idbv=$idbv";
	if(mysqli_query($conn,$sql)) echo "đã xóa bài viết thành công";
	else echo "có lõi xảy ra";
}
////////////xóa theo chuyên mục
if(isset($_POST['submit_del_parent_baiviet']))
{
	$parent=$_POST['parent'];
	$sql="DELETE FROM baiviet WHERE parent=$parent";
	if(mysqli_query($conn,$sql)) echo "đã xóa thành công";
	else echo "có lõi xảy ra";
	$sql=NULL;
}
//tìm số trang và tổng số bài bình luận
$sql="SELECT * FROM baiviet";
$result = mysqli_query($conn,$sql);
$num=mysqli_num_rows($result);
$nump=(int)($num/$maxpage);
if(($nump*$maxpage)<$num) $nump++;
if(isset($_POST['page'])) $p=$_POST['page'];
else $p=$nump;
?>
<!--hiển thị list page-->
<div class="listpage">
<?php for($i=1;$i<=$nump;$i++) 
{ 
	if($i==$p)
	{?>
		<form action="" method="post" style="display:inline-block">
			<input style="background:#000;color:#fff" type="submit" name="page" value="<?php echo $i; ?>"/>
		</form>
	<?php 
	} 
	else 
	{?>
		<form action="" method="post" style="display:inline-block">
			<input type="submit" name="page" value="<?php echo $i; ?>"/>
		</form>
<?php
	}
} ?>
</div>
<!--end lít page-->
<div class="list-baiviet">
<table>
	<tr>
		<th width="70%">tiêu đề bài viết</th>
		<th width="20%">chuyên mục</th>
		<th width="10%">xóa</th>
	</tr>
<?php
$sql=NULL;
$result=NULL;
$row=NULL;
$sql="SELECT subject,idbv,title FROM baiviet LEFT JOIN chuyenmuc ON parent=id ORDER BY idbv ASC LIMIT ".($p-1)*$maxpage.",".$maxpage;
$result=mysqli_query($conn,$sql);
while($row=mysqli_fetch_assoc($result))
{
?>
<tr>
	<td><a href="<?php echo $homeurl; ?>/<?php echo $row['idbv']; ?>-<?php echo rewrite($row['subject']); ?>.html"><?php echo $row['subject']; ?></a></td>
	<td><?php echo $row['title']; ?></td>
	<td style="text-align:center"><a href="?frame=del_baiviet&idbv=<?php echo $row['idbv']; ?>"><img src="css/images/delete.png"/></a></td>
</tr>
<?php
}
$sql=NULL;
$result=NULL;
$row=NULL;
?>
</table>
</div>
<div class="header">xóa bài viết theo chuyên mục</div>
<form action="" method="post">
	chọn chuyên mục: <select name="parent">
	<option value="NULL">chọn chuyên mục</option>
<?php
$sql="SELECT * FROM chuyenmuc ORDER BY id DESC";
$result=mysqli_query($conn,$sql);
while($row=mysqli_fetch_assoc($result))
{
?>
<option value="<?php echo $row['id']; ?>"><?php echo $row['title']; ?></option>
<?php	
}
?>
	</select><br/>
	<input type="submit" name="submit_del_parent_baiviet" value="DELETE"/>
</form>