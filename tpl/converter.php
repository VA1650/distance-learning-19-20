<!DOCTYPE html>
<html lang="ru">
<head>
    <meta charset="utf-8">
    <title>Конвертер</title>
</head>
<body>
<?php
$converter = array(
    'Из градусов в радианы' => function($n) { return $n * pi() / 180; },
    'Из градусов Фаренгейта в Цельсия' => function($n) { return ($n - 32) * 5 / 9; }
);

$res = $units = $n = '';
if (isset($_POST['action'])) {
    $n = doubleval(htmlspecialchars(trim($_POST['n'])));
    if (!is_numeric($n)) $n = 0;
    $units = htmlspecialchars(trim($_POST['units']));
    if (isset($converter[$units])) {
        $res = $converter[$units]($n);
    }
}
?>
<form method="post">
    Величина: <input type="text" name="n" value="<?php echo $n; ?>" maxlength="10" size="10"> преобразовать: <select name="units">
        <?php
        foreach ($converter as $key => $value) {
            echo '<option value="' . $key . '"' . ($key == $units ? ' selected' : '') . '>' . $key . '</option>';
        }
        ?>
    </select>
    <input type="submit" name="action" value="Преобразовать">
</form>
<p><?php echo round($res, 2); ?></p>
</body>
</html>

