<?php include "header.php" ?>
<table style="width:100%">
	<tr>
		<td style="vertical-align:top;width:75%">
			<div class="header">Kết quả tìm kiếm : <?php if(isset($_GET['q'])) echo $_GET['q']; ?></div>
<?php
$q='';
if(isset($_GET['q'])) $q=$_GET['q'];
$sql="SELECT * FROM baiviet WHERE subject like '%".$q."%' ORDER BY idbv DESC LIMIT 20";
$result = mysqli_query($conn,$sql);
if(mysqli_num_rows($result)>0)
{
	while($row=mysqli_fetch_assoc($result))
	{
		?>
		<a href="<?php echo $row['idbv']; ?>-<?php echo rewrite($row['subject']); ?>.html">
			<table class="list">
				<tr>
					<td width="150px">
						<img style="width:150px;height:150px" src="<?php echo $row['image_bv']; ?>"/>
					</td>
					<td style="padding-left:5px;vertical-align:top">
						<font style="font-size:30px"><?php echo $row['subject']; ?></font>
						<br/>
						<i>
						Bài Viết Bởi: 
						<?php 
						$sql1="SELECT username FROM users WHERE uid=".$row['author'];
						$result1=mysqli_query($conn,$sql1);
						$row1=mysqli_fetch_assoc($result1);
						echo $row1['username'];
						 ?>
						- Đăng Ngày: <?php echo $row['date_add']; ?>
						</i>
						<br/>
						<?php if($row['des']!=NULL) echo $row['des']; ?>
					</td>
				</tr>
			</table>
		</a>
		<hr/>
<?php
	}
}
else echo "<br/>không tìm thấy trong tài liệu nào!<br/>"
?>
		</td>
<?php include "footer.php" ?>