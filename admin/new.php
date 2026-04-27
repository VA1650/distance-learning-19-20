<?php
if (!isset($_POST['action'])) // если форма не была послана, то выводим форму
{
?>
<h1>Добавить статью</h1>
<form action="index.php?tp=add" method="post">
<input type="hidden" name="action" value="do" />
Введите текст статьи (разрешено HTML-форматирование): <br />
<textarea cols="60" rows="10" name="text"></textarea><br />
<table>
<tr>
  <td>Название страницы (title):</td>
  <td><input name="title" type="text" size="60" /></td></tr>
<tr>
  <td>Ключевые слова (keywords):</td>
  <td><input name="keys" type="text" size="60" /></td></tr>
<tr>
  <td>Описание страницы (description):</td>
  <td><input name="descr" type="text" size="60" /></td></tr>
<tr><td>Ссылка для меню:</td><td><input name="link" type="text" size="60" /></td></tr>
</table>
<input type="submit" value="добавить" />
</form>
<?php
}
else // если форма уже послана
{
	if (!isset($_POST['text']) || !isset($_POST['title']) || !isset ($_POST['link'])) // проверяем наличие всех необходимых полей
	{
		header("Location: index.php?tp=add"); // если нет хотябы одного из полей - редирект в начало
	}
	$d = dir ("../content/"); // получаем файлы директории /content
	while (false !== ($entry = $d->read()))
	{
		if (preg_match("/[0-9].php/", $entry)) // проверяем регулярным выражением имя файла в виде числа
		{
			$nums[] = str_replace (".php", "", $entry); // добавляем в массив это число (имя файла)
		}
	}
	if (!isset($nums)) // если массив пуст (нет файлов)
	{
		$n = 1; // то имя файла будет "1" 
	}
	else // если файлы есть
	{
		sort ($nums); // то сортируем их
		$n = $nums[count($nums)-1] + 1; // находим самое большое число и присваиваем $n на еденицу больше
	}
	// формируем строку для записи в файл
	$content = "<?\r\n\$page_title = '" . $_POST['title'] . "';\r\n" .
		"\$page_descr = '" . $_POST['descr'] . "';\r\n" .
		"\$page_keyws = '" . $_POST['keys'] . "';\r\n" .
		"\$page_4menu = '" . $_POST['link'] . "';\r\n\r\n" .
		"\$content = <<< EOT\r\n" . $_POST['text'] . "\r\n" .
		"EOT;\r\n?>";
	if (!function_exists('file_put_contents')) // если отсутствует функция file_put_contents (PHP версия менее 5-й)
	{
		function file_put_contents ($filename, $content) // то описываем эту функцию
		{
			if ($fp = @fopen($filename, 'w'))
			{
				$result = fwrite($fp, $content);
				fclose ($fp);
				return $result;
			}
			else
			{
				return false;
			}
		}
	}
	if (!file_put_contents("../content/" . $n . ".php", $content)) // пытаемся записать в файл $n.php
	{
		die ("Ошибка записи");
	}
	else // если записали новый файл, то необходимо дописать новую страницу и в меню
	{
		$fs=fopen('../menu.csv', 'a'); // открываем menu.csv для добавления
		if(!fwrite($fs, $n.';'.$_POST['link']."\n"))  // если не удается записать
		die("Ошибка записи в меню. <a href='index.php'>вернуться на главную</a>"); // то сообщаем и выходим
		fclose($fs); // закрываем файл
		// если записали в меню, то сообщаем
		echo ("Успешно добавлено. <a href='index.php?tp=add'>Добавить ещё одну</a> или <a href='index.php'>вернуться на главную</a>");
	}
}
?>
