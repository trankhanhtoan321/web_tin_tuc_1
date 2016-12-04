<?php
if(!isset($_GET['frame'])) include "function/home.php";
else
{
	switch($_GET['frame'])
	{
		case "vietbai": include "function/vietbai.php";break;
		case "add_chuyenmuc": include "function/add_chuyenmuc.php";break;
		case "del_chuyenmuc": include "function/del_chuyenmuc.php";break;
		case "del_baiviet": include "function/del_baiviet.php";break;
		case "edit_baiviet": include "function/edit_baiviet.php";break;
		case "menu_tren": include "function/menu_tren.php";break;
		case "edit_config": include "function/edit_config.php";break;
		case "cmt": include "function/comment.php";break;
		case "sidebar": include "function/sidebar.php";break;
		case "menu_footer": include "function/menu_footer.php";break;
		case "homepage": include "function/homepage.php";break;
		case "edit_head": include "function/edit_head.php";break;
		case "function": include "function/add_function.php";break;
		case "add_tools": include "function/add_tools.php";break;
		case "member": include "function/member.php";break;
		case "config-email": include "function/config-email.php";break;
	}
}
?>