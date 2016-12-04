<!--update lượt views-->
<?php
$sql="UPDATE baiviet SET views=views+1 WHERE idbv='".$_REQUEST['idbv']."'";
mysqli_query($conn,$sql);
?>
<!--end update lượt views-->
<?php
$sql="SELECT * FROM baiviet WHERE idbv=".$_GET['idbv'];
$result=mysqli_query($conn,$sql);
if(mysqli_num_rows($result)>0)
{
	$row=mysqli_fetch_assoc($result);
?>
<table>
	<tr>
		<td width="80px">
			<img style="width:80px;height:80px" src="<?php echo $row['image_bv']; ?>"/>
		</td>
		<td>
			<h1 style="padding-left:5px"><?php echo $row['subject']; ?></h1>
		</td>
	</tr>
</table>
<br/>
<i>
	Bài Viết Bởi: 
	<?php 
		$sql1="SELECT username FROM users WHERE uid=".$row['author'];
		$result1=mysqli_query($conn,$sql1);
		$row1=mysqli_fetch_assoc($result1);
		echo $row1['username'];
	 ?>
	- Đăng Ngày: <?php echo $row['date_add']; ?> - Lượt Views: <?php echo $row['views']; ?>
</i>
<hr/>
<br/>
<div class="content">
	<?php echo $row['content']; ?>
<?php 
//nếu là tools tự viết thì include file vào
$s=$row['content'];
if($i=stripos($s,"###tools###"))
{
	$j=stripos($s,"###-->");
	$s=substr($s,$i+11,$j-$i-11);
	include "/tools/$s";
}
//////////////////////////////////////<!--###tools###file.php###-->
?>
</div>
<!-- Go to www.addthis.com/dashboard to customize your tools -->
<script type="text/javascript" src="//s7.addthis.com/js/300/addthis_widget.js#pubid=ra-565a6fefb5fa6799" async="async"></script>
<!-- Go to www.addthis.com/dashboard to customize your tools -->
<div class="addthis_native_toolbox"></div>
<?php
include "function/thao_luan.php";
include "function/cung_chuyen_muc.php";
}
?>