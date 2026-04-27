<?php
session_start(); // стартуем сессию
if (!isset($_SESSION['adm']))
	$_SESSION['adm'] = '';
if (!$_SESSION['adm']) // проверяем наличие переменной сессии для идентификации админа
{
	require('enter.php'); exit; // если отсутствует - выводим форму логина и завершаем сценарий
}
?>
<style type="text/css">

td {
	font-family: Arial, Helvetica, sans-serif;
	font-size: 12px;
}
h1 {
	font-family: Arial, Helvetica, sans-serif;
	font-size: 15px;
}

</style>

<table width="800" border="0" align="center" cellpadding="4" cellspacing="4">
  <tr>
    <td bgcolor="#D4D0C8"><strong>ПАНЕЛЬ АДМИНИСТРАТОРА</strong> </td>
  </tr>
  <tr>
    <td bgcolor="#FAFAFA"><a href="index.php">Старт</a> | <a href="index.php?tp=add">Добавить статью</a> | <a href="index.php?tp=menu">Редактировать меню</a> | <a href="index.php?tp=settings">Редактировать настройки</a> | <a href="index.php?tp=logout">Выход</a></td>
  </tr>
  <tr>
    <td><?php
if (!isset($_GET['tp']))
	$_GET['tp'] = '';
	switch($_GET['tp']) // используем switch для подключения нужных сценариев в зависимости от значения переменной tp
	{
	case(''):
	include('admin_main.php');
	break;
	case('edit'):
	include('admin_edit.php');
	break;
	case('add'):
	include('admin_new.php');
	break;
	case('menu'):
	include('admin_menu.php');
	break;
	case('settings'):
	include('admin_settings.php');
	break;
	case('delete'):
	include('admin_delete.php');
	break;
                   case('logout'):
	include('logout.php');
	break;
	}
	?></td>
  </tr>
  </table>
