<div class="header">Thảo Luận</div>
<?php
//xử lý coment gởi lên
if(isset($_POST['comment']))
{
	$cmt_content=$_POST['cmt_content'];
	$cmt_uid=$_SESSION['uid'];
	$cmt_idbv=$_GET['idbv'];
	//add comment
	$sql="INSERT INTO comment(cmt_idbv,cmt_uid,cmt_content) VALUES($cmt_idbv,$cmt_uid,'$cmt_content')";
	mysqli_query($conn,$sql);
	$sql=NULL;
	//update thong bao
	$sql="UPDATE theo_doi SET thong_bao=1 WHERE td_idbv=$cmt_idbv AND td_uid<>$cmt_uid";
	mysqli_query($conn,$sql);
	$sql=NULL;
	//add theo doi
	$sql="SELECT count(*) as num FROM theo_doi WHERE td_uid=$cmt_uid AND td_idbv=$cmt_idbv";
	$result=mysqli_query($conn,$sql);
	$row=mysqli_fetch_assoc($result);
	$sql=NULL;
	$result=NULL;
	if($row['num']==0)
	{
		$sql="INSERT INTO theo_doi(td_uid,td_idbv) VALUES($cmt_uid,$cmt_idbv)";
		mysqli_query($conn,$sql);
	}
	$row=NULL;
}
?>
<?php
//tìm số trang và tổng số bài bình luận
$idbv=$_GET['idbv'];
$sql="SELECT * FROM comment WHERE cmt_idbv=$idbv";
$result = mysqli_query($conn,$sql);
$num=mysqli_num_rows($result);
$nump=(int)($num/$maxpage_cmt);
if(($nump*$maxpage_cmt)<$num) $nump++;
if(isset($_POST['page_cmt'])) $p=$_POST['page_cmt'];
else $p=$nump;
?>
<!--hiển thị list page-->
<div class="listpage">
<?php for($i=1;$i<=$nump;$i++) { 
	if($i==$p)
		{?>
<form action="" method="post" style="display:inline-block">
	<input style="background:#000;color:#fff" type="submit" name="page_cmt" value="<?php echo $i; ?>"/>
</form>
<?php } else {?>
<form action="" method="post" style="display:inline-block">
	<input type="submit" name="page_cmt" value="<?php echo $i; ?>"/>
</form>
<?php
}
} ?>
</div>
<!--end lít page-->
<?php
if($num>0)
{
	//hiển thị các bình luận trên bài viết
	$sql1="SELECT * FROM comment WHERE cmt_idbv=$idbv LIMIT ".($p-1)*$maxpage_cmt.",".$maxpage_cmt;
	$result1=mysqli_query($conn,$sql1);
	while($row1=mysqli_fetch_assoc($result1))
	{
	?>
	<div class="comment">
		<table>
			<tr>
				<td style="width:100px;text-align:center;">
		<?php
		$sql2="SELECT username,avatar FROM users WHERE uid=".$row1['cmt_uid'];
		$result2=mysqli_query($conn,$sql2);
		$row2=mysqli_fetch_assoc($result2);
		$sql2=$result2="";
		?>
					<img src="<?php echo $row2['avatar']; ?>"/><br/>
					<b><?php echo $row2['username']; ?></b>
				</td >
				<td style="text-align:left;">
					<i><?php echo $row1['cmt_content']; ?></i>
				</td>
			</tr>
		</table>
	</div>
	<?php
	}
}
?>
<!--form thao luan, chỉ hiện form thảo luận khi đã đăng nhập
nếu chưa đăng nhập thì hiện dòng chữ kèm link
bạn phải<a> đăng nhập </a> để được thảo luận-->
<?php
if(isset($_SESSION['uid']))
{
?>
<form action="" method="post" style="text-align:center">
	<textarea name="cmt_content"></textarea><br/>
	<input type="submit" name="comment" value="Comment"/>
</form>
<script>CKEDITOR.replace( 'cmt_content');</script>
<?php
}
else
{
?>
Bạn Phải <a style="color:blue" href="login.php">Đăng Nhập </a> Để Được Bình Luận<br/>
Nếu Chưa Có Tài Khoản, Bạn Có Thể <a style="color:blue" href="register.php">Đăng Ký</a><br/>
<?php
}
?>
