<?php include "header.php" ?>
<table style="width:100%">
	<tr>
		<td style="vertical-align:top;width:75%">
<?php
$uid=$_SESSION['uid'];
//xu ly submit thong bao
if(isset($_POST['submit_thong_bao']))
{
	$idbv=$_POST['thong_bao'];
	$sql="SELECT subject FROM baiviet WHERE idbv=$idbv";
	$result=mysqli_query($conn,$sql);
	$row=mysqli_fetch_assoc($result);
	$s=rewrite($row['subject']);
	if($_POST['submit_thong_bao']=="Xem Lại Bài Viết")
	{
		$sql=NULL;
		$sql="UPDATE theo_doi SET thong_bao=0 WHERE td_uid=$uid AND td_idbv=$idbv";
		mysqli_query($conn,$sql);
		header("location:./$idbv-$s.html");
	}
	else
	{
		$sql=NULL;
		$sql="DELETE FROM theo_doi WHERE td_uid=$uid AND td_idbv=$idbv";
		mysqli_query($conn,$sql);
	}
	$sql=NULL;
	$result=NULL;
	$row=NULL;
	$s=NULL;
}
//hien thi thong bao
$sql="SELECT * FROM theo_doi WHERE td_uid=$uid AND thong_bao=1";
$result=mysqli_query($conn,$sql);
$sql=NULL;
if(mysqli_num_rows($result)>0)
{
?>	
	<div class="header">Thông Báo Mới</div>
	<div class="table_theo_doi">
	<table>
	<?php
	while($row=mysqli_fetch_assoc($result))
	{
		$sql="SELECT subject FROM baiviet WHERE idbv=".$row['td_idbv'];
		$result1=mysqli_query($conn,$sql);
		$row1=mysqli_fetch_assoc($result1);
		$sql=NULL;
	?>
		<tr>
			<td style="width:70%;text-align:left">
				<?php echo $row1['subject']; ?>
			</td>
			<td width="30%">
				<form style="display:inline-block" action="" method="post">
					<input style="display:none" type="number" name="thong_bao" value="<?php echo $row['td_idbv']; ?>"/>
					<input type="submit" name="submit_thong_bao" value="Xem Lại Bài Viết"/>
					<input type="submit" name="submit_thong_bao" value="Bỏ Theo Dõi"/>
				</form>
			</td>
		</tr>
	<?php
	}
	?>
	</table>
	</div>
<?php
}
//bai viet dang theo doi
$result=NULL;
$sql=NULL;
$sql="SELECT subject,idbv FROM theo_doi INNER JOIN baiviet ON td_idbv=idbv WHERE td_uid=$uid AND thong_bao=0";
$result=mysqli_query($conn,$sql);
if(mysqli_num_rows($result)>0)
{
?>
<div class="header">Bài Viết Đang Theo Dõi</div>
<div class="table_theo_doi">
	<table>
<?php
	while($row=mysqli_fetch_assoc($result))
	{
?>
		<tr>
			<td style="width:70%;text-align:left">
				<a href="./<?php echo $row['idbv']; ?>-<?php echo rewrite($row['subject']); ?>.html"><?php echo $row['subject']; ?></a>
			</td>
			<td width="30%">
				<form action="" method="post">
					<input style="display:none" type="number" name="thong_bao" value="<?php echo $row['idbv']; ?>"/>
					<input type="submit" name="submit_thong_bao" value="Bỏ Theo Dõi"/>
				</form>
			</td>
		</tr>
<?php
	}
?>
	</table>
</div>
<?php
}
?>
		</td>
<?php include "footer.php" ?>