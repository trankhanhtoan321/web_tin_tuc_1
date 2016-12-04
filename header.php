<?php 
require("config.php"); 
if(!session_id()) session_start();

?>
<html>
	<head>
		<meta http-equiv="Content-Type" content="text/html; charset=utf-8"/>
		<link href="css/style.css" rel="stylesheet" type="text/css"/>
		<?php include "function/meta-header.php"; ?>
		<!--sile show-->
		<link rel="stylesheet" href="js/slide/orbit-1.2.3.css" />
		<script type="text/javascript" src="js/slide/jquery-1.5.1.min.js"></script>
		<script type="text/javascript" src="js/slide/jquery.orbit-1.2.3.min.js"></script>
		<script type="text/javascript">
			$(window).load(function() {
				$('#featured').orbit();
			});
		</script>
		<!--end slide show-->	
		<script language="javascript" src="js/ckeditor/ckeditor.js"></script>
		<!--title and description-->
		<title><?php echo get_title(); ?></title>
		<meta name="description" content="<?php echo get_des(); ?>"/>
	</head>
	<body>
		<?php include "function/menu_tren.php"; ?>
		<?php include "function/logo-header.php"; ?>
		<?php include "function/main-menu.php"; ?>