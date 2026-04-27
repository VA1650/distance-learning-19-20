<?php 

$a = array('1' => array('1' => 'Миллиметр', '2' => 'Сантиметр', '3' => 'Дециметр', '4' => 'Метр', '5' => 'Километр'), '2' => array('1' => 'Квадратный миллиметр', '2' => 'Квадратный сантиметр', '3' => 'Квадратный  дециметр', '4' => 'Квадратный метр', '5' => 'Квадратный километр'), '3' => array('1' => 'Кубический миллиметр', '2' => 'Кубический сантиметр', '3' => 'Кубический  дециметр', '4' => 'Кубический  метр', '5' => 'Кубический  километр', '6' => 'Миллилитр', '7' => 'Литр'));

/*$e = isset($_POST['e']) ? $_POST['e'] : False;

switch ($e) {
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
  $page = file_get_contents('converter.html'); 
  $page = str_replace('%option%',$option,$page);
  echo $page;
      break;

    case 2:
      # code...
      break;

	case 3:
      # code...
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
  $page = file_get_contents('converter.html'); 
  $page = str_replace('%option%',$option,$page);
  echo $page;
      break;
  }
*/

if (isset($_POST['edit'])){
	$e0 = $_POST['e0'];
	$n = $_POST['n'];
	$n1 = $_POST['n1'];
  $units = $_POST['units'];
  $units1 = $_POST['units1'];

  $difference = $units - $units1;

  if ($difference > 0)
  {
    $n = $n * 10**$difference;
  }
	echo json_encode(array('res2' => $n));
  switch ($e0) {
	case 1:
      
      break;

    case 2:
      # code...
      break;

	case 3:
      # code...
      break;
    
    default:
      break;
  }
}


?>


