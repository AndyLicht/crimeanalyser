<?php

$databasesettings = parse_ini_file('../databaseconnection.ini');
$conn_string = 'host='.$databasesettings['host'].' port='.$databasesettings['port'].' dbname='.$databasesettings['database'].' user='.$databasesettings['user'].' password='.$databasesettings['password'];
$dbconn = pg_connect($conn_string);

/*
if($_POST['option']=='2')
{
    $status =  'ersetzen';
    $query = 'Delete from '.$_POST['project'].';';
    pg_query($query);
}*/

error_reporting(E_ALL);
ini_set('display_errors', TRUE);
ini_set('display_startup_errors', TRUE);

define('EOL',(PHP_SAPI == 'cli') ? PHP_EOL : '<br />');
date_default_timezone_set('Europe/Berlin');

/** Include PHPExcel_IOFactory */
require_once dirname(__FILE__) . '/../Excelphp/Classes/PHPExcel/IOFactory.php';
$callStartTime = microtime(true);

//$objPHPExcel = PHPExcel_IOFactory::load('/../Excelphp/Examples/template.xlsx');
$path = $_FILES['filetoupload']['tmp_name'];
$objPHPExcel = PHPExcel_IOFactory::load($path);
$sheet = $objPHPExcel->getSheet(0);
$highestRow = $sheet->getHighestRow();
$highestColumn = $sheet->getHighestColumn();

$index = [];
$index['time'] = null;
$index['objekt'] = null;
$index['location'] = null;
$index['xcoor'] = null;
$index['ycoor'] = null;
$index['pdescription'] = null;
$index['datum'] = null;
$index['uhrzeit'] = null;

$errorreport = 'folgende Zeilen konnten nicht eingefügt werden: ';

for ($row = 1; $row <= $highestRow; $row++)
{
    if($row == 1)
    {
	$rowData = $sheet->rangeToArray('A' . $row . ':' . $highestColumn . $row,NULL,TRUE,FALSE);
	foreach ($rowData as $key)
	{
	    for($i = 0; $i<sizeof($key);$i++)
	    {
		foreach($index as $indexkey => $val)
		{
		    if($indexkey == $key[$i])
		    {
			$index[$indexkey] = $i;
		    }
		}
	    }
	}
    }
    else
    {
	$rowData = $sheet->rangeToArray('A' . $row . ':' . $highestColumn . $row,NULL,TRUE,FALSE);
	foreach ($rowData as $key)
	{
	    $check = TRUE;
	    foreach($key as $keyvalue)
	    {
		if(empty($keyvalue))
		{
		    $check = FALSE;
		}
	    }
	    if($check == TRUE)
	    {
		$query = "INSERT INTO ".$_POST['project']. "  VALUES (to_timestamp('".$key[$index['time']]."','YYYY-MM-DD HH24:MI:SS'),'".$key[$index['objekt']]."','".$key[$index['location']]."',ST_GeometryFromText( 'POINT ( ".$key[$index['xcoor']]." ".$key[$index['ycoor']].")', 4326),'".$key[$index['pdescription']]."');";
		pg_query($query);
	    }
	    else
	    {
		$errorreport = $errorreport.$row.',';
	    }
	}
    }
}
echo 'Daten erfolgreich verarbeitet.<br>';
echo $errorreport;
?>