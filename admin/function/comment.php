<div class="header">Comment</div>
<?php
if(isset($_GET['cmt_id']))
{
	$cmt_id=$_GET['cmt_id'];
	$sql="DELETE FROM comment WHERE cmt_id=$cmt_id";
	if(mysqli_query($conn,$sql)) echo "đã xóa comment thành công";
	else echo "có lõi xảy ra";
	$sql=NULL;
}
//tìm số trang
$sql="SELECT * FROM comment";
$result = mysqli_query($conn,$sql);
$num=mysqli_num_rows($result);
$nump=(int)($num/$maxpage_cmt);
if(($nump*$maxpage_cmt)<$num) $nump++;
if(isset($_POST['page'])) $p=$_POST['page'];
else $p=1;
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
		<th width="90%">comment</th>
		<th width="10%">delete</th>
	</tr>
<?php
$sql=NULL;
$result=NULL;
$row=NULL;
$sql="SELECT * FROM comment LEFT JOIN baiviet ON cmt_idbv=idbv ORDER BY cmt_id DESC LIMIT ".($p-1)*$maxpage_cmt.",".$maxpage_cmt;
$result=mysqli_query($conn,$sql);
while($row=mysqli_fetch_assoc($result))
{
?>
<tr>
	<td><a target="_blank" href="<?php echo $homeurl; ?>/<?php echo $row['idbv']; ?>-<?php echo rewrite($row['subject']); ?>.html"><?php echo $row['cmt_content']; ?></a></td>
	<td style="text-align:center"><a href="?frame=cmt&cmt_id=<?php echo $row['cmt_id']; ?>"><img src="css/images/delete.png"/></a></td>
</tr>
<?php
}
$sql=NULL;
$result=NULL;
$row=NULL;
?>
</table>
</div>