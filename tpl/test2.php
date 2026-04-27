<?php 
$answers = array("0.04", "120", "1/86400", "200", "0.63", "6.28", "3.14");

$a = $_POST['a'];
$counter = 0;
for ($i=0; $i < count($a)-1; $i++) { 
			if ($a[$i] == $answers[$i])
				$counter++;
		}
$counter = $counter * 100 / (count($a)-1);
echo "<script>alert('Тест пройден на $counter%')</script>";		

unset($a);
header('location:../index.php?naw=tests');

<script>Notification.requestPermission(function(permission){
console.log('Результат запроса прав:', permission);
});
var notification = new Notification('Результат:',
{ body: 'Тест пройден на  $counter%', dir: 'auto'}
);
?>