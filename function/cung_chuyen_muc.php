<!--bài viết cùng chuyên mục-->
<?php
$sql="SELECT * FROM baiviet WHERE idbv<>'".$_GET['idbv']."' AND parent='".$row['parent']."' ORDER BY idbv DESC LIMIT 5";
$result=mysqli_query($conn,$sql);
if(mysqli_num_rows($result)>0)
{
?>
<div class="header">Cùng Chuyên Mục</div>
<?php
	while($row=mysqli_fetch_assoc($result))
	{
	?>
	<a href="<?php echo $row['idbv']; ?>-<?php echo rewrite($row['subject']); ?>.html">
	<table class="list1">
		<tr>
			<td width="50px">
				<img style="width:50px;height:50px" src="<?php echo $row['image_bv']; ?>"/>
			</td>
			<td>
				<font style="font-size:16px"><?php echo $row['subject']; ?></font>
			</td>
		</tr>
	</table>
	</a>
	<hr/>
	<?php
	}
}
?>
<!--end bài viết cùng chuyên mục-->