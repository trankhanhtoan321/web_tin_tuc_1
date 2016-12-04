<html>
	<head>
		<link href="../css/style.css" rel="stylesheet" type="text/css"/>
	</head>
	<body>
		<?php
		if(isset($_POST['submit']))
		{
			if($conn = mysqli_connect($_POST['servername'], $_POST['username'], $_POST['password'], $_POST['dbname']))
			{
				$f=fopen("../config.php","w");
				/////////////////////////////////////////
				$f1=fopen("header.txt","r");
				$s=fread($f1,filesize("header.txt"));
				$s.="\n";
				fclose($f1);
				fwrite($f,$s);
				$s=NULL;
				///////////////////////////////////////
				$s="\$servername = \"".$_POST['servername']."\";\n";
				$s.="\$username = \"".$_POST['username']."\";\n";
				$s.="\$password = \"".$_POST['password']."\";\n";
				$s.="\$dbname = \"".$_POST['dbname']."\";\n";
				$s.="\$home_title = \"".$_POST['home_title']."\";\n";
				$s.="\$homeurl = \"".$_POST['homeurl']."\";\n\n";
				fwrite($f,$s);
				$s=NULL;
				///////////////////////////////////////////
				$f1=fopen("config.txt","r");
				$s=fread($f1,filesize("config.txt"));
				$s.="\n";
				fclose($f1);
				fwrite($f,$s);
				$s=NULL;
				///////////////////////////////////////////
				$f1=fopen("function.txt","r");
				if(filesize("function.txt")>0)
					$s=fread($f1,filesize("function.txt"));
				$s.="\n";
				fclose($f1);
				fwrite($f,$s);
				$s=NULL;
				////////////////////////////////////////////
				$f1=fopen("footer.txt","r");
				$s=fread($f1,filesize("footer.txt"));
				$s.="\n";
				fclose($f1);
				fwrite($f,$s);
				$s=NULL;
				/////////////////////////////////////////
				fclose($f);
				/////////////cài cơ sở dữ liệu////////////////////////////			{
				mysqli_set_charset($conn,'utf8');
				date_default_timezone_set("Asia/Ho_Chi_Minh");
				$f=fopen("database.txt","r");
				while(!feof($f))
				{
					$s=fgets($f);
					mysqli_query($conn,$s);
				}
				fclose($f);
				$a=$_POST['ad_user'];
				$b=md5($_POST['ad_pass']);
				$c=$_POST['ad_email'];
				$d=$_POST['ad_birthday'];
				$s="INSERT INTO users(uid,username,pass,email,birthday,checkmail) VALUES(1,'$a','$b','$c','$d',1)";
				mysqli_query($conn,$s);
				unlink("config.txt");
				unlink("database.txt");
				unlink("footer.txt");
				unlink("header.txt");
				unlink("index.php");
				rmdir("../install");
				header("location:../admin");	
			}
			else echo "có lỗi xảy ra ngoài";
		}
		?>
		<div class="header"> cài đặt website</div>
		<form action="" method="post">
			<b>host account:</b><br/>
			servername:<input type="text" name="servername"/><br/>
			username:<input type="text" name="username"/><br/>
			password:<input type="text" name="password"/><br/>
			database name:<input type="text" name="dbname"/><br/>
			homeurl:<input type="text" name="homeurl"/><br/>
			home title:<input type="text" name="home_title"/><br/>
			<b>admin account:</b><br/>
			user:<input type="text" name="ad_user"/><br/>
			pass:<input type="text" name="ad_pass"/><br/>
			email:<input type="email" name="ad_email"/><br/>
			birthday:<input type="date" name="ad_birthday"/><br/>
			<input type="submit" name="submit" value="INSTALL"/>
		</form>
	</body>
</html>