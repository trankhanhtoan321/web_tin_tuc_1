<?php
$sql="SELECT title FROM chuyenmuc WHERE id=".$_GET['id'];
$result=mysqli_query($conn,$sql);
$row=mysqli_fetch_assoc($result);
?>
<?php
$sql="SELECT * FROM baiviet WHERE parent=".$_GET['id']." ORDER BY idbv DESC LIMIT ".$maxpage;
$result=mysqli_query($conn,$sql);
if(mysqli_num_rows($result)>0)
{?>
	<div class="header">Chuyên Mục <?php echo $row['title']; ?></div>
<?php
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
}
?>