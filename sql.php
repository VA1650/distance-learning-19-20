<?php
$link = mysqli_connect("localhost", "root", "", "project");

if (!$link) {
    printf("Connect failed: %s\n", mysqli_connect_error());
    exit();
}
mysqli_query($link, "SET NAMES utf8");


function select_all($link, $sql)
{
	$result = mysqli_query($link, $sql);
	$data = array();
	$i=0;
	while ($row = mysqli_fetch_assoc($result)) {
		$data[$i] = $row;
		$i++;
	}
	if ($data) 
		return $data;
	else
		return false;
}

function select_row($link, $sql)
{
	$result = mysqli_query($link, $sql);
	$data = array();
	$i=0;
	$data[] = mysqli_fetch_assoc($result);
	if ($data) 
		return $data;
	else
		return false;
}

function query($link, $sql) 
{
	$result = mysqli_query($link, $sql);
	var_dump($result);
	if ($result)
		return true;
	else
	{
		echo "false";
		return false;
	}
}


mysqli_close($link);
?>