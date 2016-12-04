<?php 
include "header.php";
require("lib/phpmailer.php");
?>
<table style="width:100%">
	<tr>
		<td style="vertical-align:top;width:75%">
			<div class="header">Đăng Ký</div>
<?php
if(isset($_POST['register']))
{
	$username=$_POST['username'];
	$password=md5($_POST['password']);
	$birthday=$_POST['birthday'];
	$email=$_POST['email'];
	$gender=$_POST['gender'];
	$sql="SELECT * FROM users WHERE username='".$username."'";
	$result=mysqli_query($conn,$sql);
	if(mysqli_num_rows($result)>0)
	{
		echo "username đã có người dùng<br/>";
	}
	else
	{
		$sql="SELECT * FROM users WHERE email='".$email."'";
		$result=mysqli_query($conn,$sql);
		if(mysqli_num_rows($result)>0)
		{
			echo "email đã có người dùng<br/>";
		}
		else
		{
			if($gender=="male") $avatar="uploads/avatar/user_male.png";
			else $avatar="uploads/avatar/user_female.png";
			$sql="INSERT INTO users(username,pass,email,birthday,avatar,gender) VALUES('$username','$password','$email','$birthday','$avatar','$gender')";
			if(mysqli_query($conn,$sql))
			{
				////////////////////////////////////////////////////
				$f=fopen("admin/trankhanhtoan.jpg","r");
				$dong1=fgets($f);
				$dong2=fgets($f);
				$dong3=fgets($f);
				fclose($f);
				/////////////////////////////////////////////////////
				$body="Chào $username, <br/>Cảm ơn bạn đã đăng ký tài khoản tại $dong3<br/>Thông tin đăng ký tài khoản của bạn như sau:<br/>Username: $username<br/>Password: ".$_POST['password']."<br/>Email: $email<br/>Birthday: $birthday<br/><br/>Để xác thực việc đăng ký là có thật, bạn vui lòng confirm link bên dưới (<i>bạn có thể click vào link hoặc copy và past lên trình duyệt</i>):<br/><br/>$homeurl/checkmail.php?confirm=$password<br/><br/>friend,<br/><a href=\"$homeurl\">$dong3</a>";
				//cấu hình send mail
				$mail=new PHPMailer();
				$mail->IsSMTP();
				$mail->SMTPDebug  = 0;
				$mail->Host       = "smtp.gmail.com";
				$mail->Port       = 587;
				$mail->SMTPSecure = "tls"; 
				$mail->SMTPAuth   = true;
				$mail->Username   = $dong1; 
				$mail->Password   = $dong2;
				$mail->SetFrom($dong1, $dong3);
				$mail->AddReplyTo($dong1,$dong3);
				$mail->Subject = "Đăng ký tài khoản tại $dong3";
				$mail->AltBody = "Đăng ký tài khoản tại $dong3";
				$mail->MsgHTML($body);
				$mail->AddAddress($email,$username);
				$mail->Send();
				/////////////////////////////////////////////
				echo " Bạn đã đăng ký thành công tài khoản với user name là '".$username."'!<br/>Chúng tôi đã gởi cho bạn 1 email xác thực tới địa chỉ '".$email."'!<br/> Vui lòng check mail !<br/>";
			}
		}
	}
}
?>
			<form action="register.php" method="post">
				Username: <input type="text" name="username"/><br/><br/>
				Password: <input type="password" name="password"/><br/><br/>
				Birthday:&nbsp;&nbsp;&nbsp;&nbsp;<input type="date" name="birthday"/><br/><br/>
				Email:&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<input type="email" name="email"/><br/><br/>
				Gender:&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
				<select name="gender">
					<option value="male">Male</option>
					<option value="female">Female</option>
				</select><br/><br/>
				<input type="submit" name="register" value="Đăng Ký"/>
			</form>
		</td>
<?php include "footer.php" ?>