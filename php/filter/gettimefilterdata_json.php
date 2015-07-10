<?php
    $databasesettings = parse_ini_file('../databaseconnection.ini');
    $conn_string = 'host='.$databasesettings['host'].' port='.$databasesettings['port'].' dbname='.$databasesettings['database'].' user='.$databasesettings['user'].' password='.$databasesettings['password'];
    $dbconn = pg_connect($conn_string);
    if($_GET['filterart']=='time')
    {
	$query = "SELECT distinct(time) from ".$_GET['project']." order by time;";
    }
    elseif($_GET['filterart'] == 'week')
    {
	$query = "SELECT distinct(to_char(time,'ww')) as week from ".$_GET['project']." order by week;";
    }
    else
    {	
	//$query = '';
	echo 'sonstige';
    }

    $results = pg_query($query);
    $json = '[';
    $rows = pg_num_rows($results);
    $i = 0;
    while ($row = pg_fetch_row($results))
    {
	$i++;
	if ($rows == $i)
	{
	    $json = $json.'{ "time":"'.$row[0].'"}';
	}
	else
	{
	    $json = $json.'{ "time":"'.$row[0].'"},';
	}
    }
    $json = $json.']';
    echo $json;
    pg_close($dbconn);
?>

