<?php

include('config.php');
include(ROOT.'tpl/header1.html');
include(ROOT.'tpl/menu1.html');
$page= file_get_contents('index1.html');

 
if (isset($_GET['naw'])){
	$link = trim($_GET['naw']);
}else $link = '';

switch($link){

	case '': $content = file_get_contents('tpl/main1.html');
					 $page = str_replace('%content%',$content,$page);
					 $page = str_replace('%message%','',$page);
					 
					echo $page;
					
		break;				
	
	case 'rega': $content = file_get_contents('tpl/rega.html'); 
					$page = str_replace('%content%',$content,$page);
                    $page = str_replace('%message%','',$page);
					echo $page;
		break;	
	case 'pract': $content = file_get_contents('tpl/pract.html'); 
				  $content = htmlspecialchars($content, ENT_QUOTES); 
					$page = str_replace('%content%',$content,$page);
                    $page = str_replace('%message%','',$page);
					echo $page;
		break;		

		
	
	case 'international': $content = file_get_contents('tpl/international.html'); 
					$page = str_replace('%content%',$content,$page);
					$page = str_replace('%message%','',$page);

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
	
	
	

 
		
		
		
																																	
}

include(ROOT.'tpl/footer1.html');

?>