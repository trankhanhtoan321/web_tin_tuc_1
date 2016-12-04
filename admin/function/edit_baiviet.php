<div class="header">sửa bài viết</div>
<?php
/////////////////////////////////////////////////////////////
if(isset($_POST['submit_edit_baiviet']))
{
	$idbv=$_GET['idbv'];
	$subject=$_POST['subject'];
	$des=$_POST['des'];
	$content=$_POST['content'];
	$sql="UPDATE baiviet SET subject='$subject',des='$des',content='$content' WHERE idbv=$idbv";
	if(mysqli_query($conn,$sql)) echo "đã cập nhật thành công";
	else echo "có lỗi xảy ra";
}
///////////////////////////////////////////////////////////////
if(isset($_GET['idbv']))
{
	$idbv=$_GET['idbv'];
	$sql="SELECT * FROM baiviet WHERE idbv=$idbv";
	$result=mysqli_query($conn,$sql);
	$row=mysqli_fetch_assoc($result);
	$sql=NULL;$result=NULL;
?>
<form action="" method="post">
	<b>tiêu đề bài viết: </b><br/>
	<input type="text" name="subject" value="<?php echo $row['subject']; ?>"/><br/>
	<b>description:</b><br/>
	<textarea name="des"><?php echo $row['des']; ?></textarea><br/>
	<b>content: </b><br/>
	<textarea name="content" class="ckeditor"><?php echo $row['content']; ?></textarea><br/>
	<input type="submit" name="submit_edit_baiviet" value="edit"/>
</form>
<?php
}
?>
<div class="header">danh sách bài viết</div>
<?php
//tìm số trang
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
		<th width="10%">sửa</th>
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
	<td style="text-align:center"><a href="?frame=edit_baiviet&idbv=<?php echo $row['idbv']; ?>"><img src="css/images/edit.png"/></a></td>
</tr>
<?php
}
$sql=NULL;
$result=NULL;
$row=NULL;
?>
</table>
</div>