<div class="menu_tren">
	<ul>
	<?php
	$sql="SELECT * FROM menu_tren";
	if($result = mysqli_query($conn,$sql))
	if(mysqli_num_rows($result)>0)
	{
		while($row=mysqli_fetch_assoc($result))
		{
			?>
				<li><a href="<?php echo $row['link']; ?>"><?php echo $row['title']; ?></a></li>
			<?php
		}
	}
	if(isset($_SESSION['uid']))
	{
?>
		<li><a href="<?php echo $homeurl; ?>/datcauhoi.php">Đặt Câu Hỏi</a></li>
		<li><a href="<?php echo $homeurl; ?>/thong_bao.php">Thông Báo(<?php echo thong_bao($_SESSION['uid']); ?>)</a></li>
		<li><a href="<?php echo $homeurl; ?>/profile.php">Profile</a></li>
		<li><a href="<?php echo $homeurl; ?>/logout.php">Đăng Xuất</a></li>
<?php
	}
	else
	{
?>
		<li><a href="<?php echo $homeurl; ?>/login.php">Đăng Nhập</a></li>
		<li><a href="<?php echo $homeurl; ?>/register.php">Đăng Ký</a></li>
<?php
	}
	?>
</ul>
</div>