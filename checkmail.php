<?php include "header.php";?>
<table style="width:100%">
	<tr>
		<td style="vertical-align:top;width:75%">
<?php
//xử lý check mail
if(isset($_GET['confirm']))
{
	$sql="SELECT * FROM users WHERE pass='".$_GET['confirm']."'";
	$result = mysqli_query($conn,$sql);
	if(mysqli_num_rows($result)>0)
	{
		$sql="UPDATE users SET checkmail=1 WHERE pass='".$_GET['confirm']."'";
		mysqli_query($conn,$sql);
		echo "<h1>Check mail thành công!<br/>bạn có thể đăng nhập và sử dụng tài khoản!</h1>";
	}
	else
	{
		echo "<h1>link check mail error!!! Please try again!</h1>";
	}
}
else header("location:./");
//end xử lý check mail
?>			
		</td>
<?php include "footer.php";?>