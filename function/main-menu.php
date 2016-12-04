<div class="main-menu">
	  		<ul>
<?php
$sql="SELECT * FROM chuyenmuc";
if($result=mysqli_query($conn,$sql))
if(mysqli_num_rows($result)>0)
{
	while($row=mysqli_fetch_assoc($result))
	{
?>
				<li>
					<a href="<?php echo $homeurl; ?>/category-<?php echo $row['id']; ?>-<?php echo rewrite($row['title']); ?>.html"><?php echo $row['title']; ?></a>
				</li>
<?php
	}
}
?>
			</ul>
		</div>