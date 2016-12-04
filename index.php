<?php include_once "header.php"; ?>
<?php
if(empty($_REQUEST['frame'])) include "function/slideshow.php";
?>
<div class="body-content">
<table style="width:100%">
	<tr>
		<td style="vertical-align:top;width:75%">
			<?php
			if(!empty($_REQUEST['frame'])) include "function/processframe.php";
			else include "function/homepage.php";
			?>
		</td>
<?php include "footer.php"; ?>