<?php 
switch ($_REQUEST['frame']){
case "chuyenmuc": include "function/chuyenmuc.php";break;
case "baiviet": include "function/baiviet.php";break;
}
?>