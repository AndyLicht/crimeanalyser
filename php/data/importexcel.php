<?php
$query = '';
if($_POST['option']=='1')
{
    $status =  'hinzufügen';
}
if($_POST['option']=='2')
{
    $status =  'ersetzen';
    $query = 'Delete from '.$_POST['project'].';';
}

$path = $_FILES['filetoupload']['tmp_name'];
$txt = file($path);
$fields = [];
foreach($txt as $row)
{
    $rowfields=explode("\t",$row); 
    array_push($fields,$rowfields);
}
//var_dump($fields[0]);
//var_dump($fields[2]);
    $query = arraytoquery($fields,$query);
    //connect
    $databasesettings = parse_ini_file('../databaseconnection.ini');
    $conn_string = 'host='.$databasesettings['host'].' port='.$databasesettings['port'].' dbname='.$databasesettings['database'].' user='.$databasesettings['user'].' password='.$databasesettings['password'];
    $dbconn = pg_connect($conn_string);
    //query
    pg_query($query);
    //close
    pg_close($dbconn);
    echo 'Daten erfolgreich '.$status;
//Funtkion um aus dem Array ein string für den datenbank import zu machen





function arraytoquery($inputarray,$query)
{
    $time= 0;
    $object = 3;
    $location = 5;
    $pdescription = 4;
    $xcoor = 6;
    $ycoor = 7;

    for($n = 1; $n < count($inputarray);$n++)
    {
	$l=0;
	foreach ($inputarray[$n] as $eintrag)
	{
	    //echo $eintrag;
	    $inputarray[$n][$l] = str_replace("\"",'',$eintrag);
	    $l++;
	}
	
	$query = $query."INSERT INTO ".$_POST['project']." VALUES (to_timestamp('".$inputarray[$n][$time]."','YYYY-MM-DD HH24:MI:SS'),'".$inputarray[$n][$object]."','".$inputarray[$n][$location]."',ST_GeometryFromText( 'POINT ( ".$inputarray[$n][$xcoor]." ".$inputarray[$n][$ycoor].")', 4326),'".$inputarray[$n][$pdescription]."');";
	//echo $query;
	if($n==30)
	{	
	    //echo var_dump(null);
	    //echo $query;
	    //echo '  Proj.: '.$_POST['project'];
	    //echo '  Time: '.$inputarray[$n][$time];
	    //echo '  Object: '.$inputarray[$n][$object];
	    //echo '  Description: '.$inputarray[$n][$pdescription];
	    //echo '  XCoor: '.$inputarray[$n][$xcoor];
	    //echo '  YCoor: '.$inputarray[$n][$ycoor];
	    //echo '  Location: '.$inputarray[$n][$location];
	}
    }
    return $query;
}
?>
