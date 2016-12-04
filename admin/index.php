<?php 
require("../config.php");
session_start();
?>
<html>
	<head>
		<meta http-equiv="Content-Type" content="text/html; charset=utf-8"/>
		<link href="css/style.css" rel="stylesheet" type="text/css"/>
		<link rel="icon" href="../css/images/icon.png" type="image/png" sizes="16x16">	
		<script language="javascript" src="js/ckeditor/ckeditor.js"></script>
		<!--syntax highlighter-->
		<script language="javascript" src="../js/syntaxhighlighter/scripts/shCore.js"></script>
		<script language="javascript" src="../js/syntaxhighlighter/scripts/shBrushCpp.js"></script>
		<script language="javascript" src="../js/syntaxhighlighter/scripts/shBrushCSharp.js"></script>
		<script language="javascript" src="../js/syntaxhighlighter/scripts/shBrushCss.js"></script>
		<script language="javascript" src="../js/syntaxhighlighter/scripts/shBrushJava.js"></script>
		<script language="javascript" src="../js/syntaxhighlighter/scripts/shBrushJScript.js"></script>
		<script language="javascript" src="../js/syntaxhighlighter/scripts/shBrushPhp.js"></script>
		<script language="javascript" src="../js/syntaxhighlighter/scripts/shBrushSql.js"></script>
		<script language="javascript" src="../js/syntaxhighlighter/scripts/shBrushXml.js"></script>
		<link href="../js/syntaxhighlighter/styles/shCoreDefault.css" rel="stylesheet" type="text/css"/>
		<!--end syntax highlighter-->	
		<title>Lập trình 321</title>
	</head>
	<body>
		<table width="100%">
			<tr>
				<td style="width:15%;vertical-align:top">
					<?php include "function/menu.php"; ?>
				</td>
				<td style="width:85%;vertical-align:top"> 
					<?php
						if(isset($_SESSION['uid']))
						{
							if($_SESSION['uid']==1)
							{
								include "function/processframe.php";
							}
							else header("location:login.php");
						}
						else header("location:login.php");
					?>
				</td>
			</tr>
		</table>
		<script type="text/javascript">SyntaxHighlighter.all();</script>
	</body>
</html>
<?php mysqli_close($conn);?>