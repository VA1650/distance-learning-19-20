<?php
session_start();
include('config.php');
include(ROOT.'tpl/header.html');
include(ROOT.'tpl/menu.html');
$page= file_get_contents('index.html');

 
if (isset($_GET['naw'])){
	$link = trim($_GET['naw']);
}else $link = '';

switch($link){

	case '': $content = file_get_contents('tpl/main.html');
					 $page = str_replace('%content%',$content,$page);
					echo $page;
		break;				
	
	case 'lessons': $content = file_get_contents('tpl/lessons.html');
					$page = str_replace('%content%',$content,$page);
					echo $page;
		break;
		
	case 'subjects': $content = file_get_contents('tpl/subjects.html');
					$page = str_replace('%content%',$content,$page);
					echo $page;
		break;
		
	case 'about': $content = file_get_contents('tpl/about.html');
					$page = str_replace('%content%',$content,$page);
					echo $page;
		break;
		
	case 'contacts': $content = file_get_contents('tpl/contacts.html');
					$page = str_replace('%content%',$content,$page);
					echo $page;
		break;		
 
		
	case 'register': 
					 $content = file_get_contents('tpl/register.html'); 
					 $page = str_replace('%message%','',$page);
					if (!empty($_POST['reg'])){
						include "register.php";
					}else include "register.php";
					
					$page = str_replace('%content%',$content,$page);

					echo $page; 
					break;	
    
	case 'login' : $content =file_get_contents('index1.html'); 
					$content1= file_get_contents('tpl/main1.html'); 
					if (!empty($_POST['login'])){
						include "login.php";
					}else	include "login.php";
			      
					$content = str_replace('%content%',$content1,$content);
					$page=$content;
					echo $page; 
	break;
	case 'tests': if(isset($_GET['test'])) {
						$curr_tmpl = $_GET['test'];
						if (file_exists ("tpl/tests/" . $curr_tmpl . ".html")) // проверяем наличие индекс-файла активного шаблона
						{
							$content = file_get_contents("tpl/tests/" . $curr_tmpl . ".html"); // считываем содержимое шаблона
							//$content = str_replace('%answer%',"",$content);
							$page = str_replace('%content%',$content,$page);
							
						}
						else
						{
							//include ("error.html"); // если отсутствует файл шаблона
							die (""); // то выходим
						}
					if(isset($_SESSION['result']))	{
						$page = str_replace('%answer%','Ваш результат: '. $_SESSION['result']. '%',$page);
					} else {
						$page = str_replace('%answer%','',$page);
					}
					}
					else {
						$content = file_get_contents('tpl/tests.html');
						$page = str_replace('%content%',$content,$page);
					}
					echo $page;
	

		break;	
			case 'lections': $content = file_get_contents('tpl/lections.html');
					$page = str_replace('%content%',$content,$page);
					echo $page;
		break;	

}

include(ROOT.'tpl/footer.html');

?>
