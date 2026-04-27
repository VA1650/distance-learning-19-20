<?php
$a = array('1' => array('1' => 'Миллиметр', '2' => 'Сантиметр', '3' => 'Дециметр', '4' => 'Метр', '5' => 'Километр'), '2' => array('1' => 'Квадратный миллиметр', '2' => 'Квадратный сантиметр', '3' => 'Квадратный  дециметр', '4' => 'Квадратный метр', '5' => 'Квадратный километр'), '3' => array('1' => 'Кубический миллиметр', '2' => 'Кубический сантиметр', '3' => 'Кубический  дециметр', '4' => 'Кубический  метр', '5' => 'Кубический  километр', '6' => 'Миллилитр', '7' => 'Литр'));
if (isset($_POST['c1']) || isset($_POST['c2']) || isset($_POST['c3'])) {
  $c1 = $_POST['c1'];
  $c2 = $_POST['c2'];
  $c3 = $_POST['c3'];
  
  switch ($c1) {
	case 1:
				$option = "";
			  foreach ($a as $key => $value)
			  {
				  if ($key == 1){
				  foreach ($value as $k => $v)
					{
						$option .= "<option value='".$k."'>".$v."</option>"; 
					}
				  }
			  }
			 
				  break;

				case 2:
				  $option = "";
			  foreach ($a as $key => $value)
			  {
				  if ($key == 2){
				  foreach ($value as $k => $v)
					{
						$option .= "<option value='".$k."'>".$v."</option>"; 
					}
				  }
			  }
				  break;

				case 3:
				  $option = "";
			  foreach ($a as $key => $value)
			  {
				  if ($key == 3){
				  foreach ($value as $k => $v)
					{
						$option .= "<option value='".$k."'>".$v."</option>"; 
					}
				  }
			  }
				  break;
    
    default:
					$option = "";
				  foreach ($a as $key => $value)
				  {
					  if ($key == 1){
					  foreach ($value as $k => $v)
						{
							$option .= "<option value='".$k."'>".$v."</option>"; 
						}
					  }	
				  }
				 
					  break;
  }
  
   echo json_encode(array('res1' => $option , 'res2' => $c2 , 'res3' => $c3 ));
} else {
    echo json_encode(array('success' => 0));
}


?>