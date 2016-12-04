<?php
$a=getdate_now();
$a=substr($a,5);
$sql2="SELECT * FROM users WHERE birthday LIKE '%$a'";
if($result2=mysqli_query($conn,$sql2))
if(mysqli_num_rows($result2)>0)
{
?>
	<div style="text-align:center">
<?php
	echo "<h1>chúc mừng sinh nhật ";
	while($row2=mysqli_fetch_assoc($result2))
	{
		echo $row2['username'].", ";
	}
	echo "</h1><br/>";
?>
	<img src="css/images/chuc-sinh-nhat.png"/></div>
<?php
}
///////////////////////////////////////////////////////////
?>
<div class="header">Mới cập nhật</div>
<?php
$sql="SELECT * FROM baiviet ORDER BY idbv DESC LIMIT ".$maxpage;
if($result = mysqli_query($conn,$sql))
if(mysqli_num_rows($result)>0)
{
	$n=($maxpage-2)/2;
	$dem=1;
	while($dem<=$n)
	{
		$dem++;
		$row=mysqli_fetch_assoc($result)
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
						 Lượt Views: <?php echo $row['views']; ?>
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
	for($dem=$n+1;$dem<=$maxpage;$dem++)
	{
		$row=mysqli_fetch_assoc($result);
		if($dem%2==1)
		{
?>
<table style="width:100%" >
	<tr style="width:100%" >
		<td style="width:50%" class="list">
			<a style="color:#000" href="<?php echo $row['idbv']; ?>-<?php echo rewrite($row['subject']); ?>.html">
				<table style="width:100%">
					<tr>
						<td style="width:150px">
							<img style="width:150px;height:150px" src="<?php echo $row['image_bv']; ?>"/>
						</td>
						<td>
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
							 Lượt Views: <?php echo $row['views']; ?>
							</i>
						</td>
					</tr>
				</table>
			</a>
		</td>
<?php
		}
		else
		{
?>
		<td style="width:50%" class="list">
			<a style="color:#000" href="<?php echo $row['idbv']; ?>-<?php echo rewrite($row['subject']); ?>.html">
				<table style="width:100%">
					<tr>
						<td style="width:150px">
							<img style="width:150px;height:150px" src="<?php echo $row['image_bv']; ?>"/>
						</td>
						<td>
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
							 Lượt Views: <?php echo $row['views']; ?>
							</i>
						</td>
					</tr>
				</table>
			</a>
		</td> 
	</tr>
</table>
<?php
		}
	}
}
include "homepage2.php";
?>