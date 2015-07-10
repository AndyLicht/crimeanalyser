<?php
    $databasesettings = parse_ini_file('../databaseconnection.ini');
    $conn_string = 'host='.$databasesettings['host'].' port='.$databasesettings['port'].' dbname='.$databasesettings['database'].' user='.$databasesettings['user'].' password='.$databasesettings['password'];
    $dbconn = pg_connect($conn_string);

    $json = '[';
    if(isset($_GET['projectid']) && isset($_GET['default']) && isset($_GET['project']))
    {
	$query = "SELECT distinct(object) from ".$_GET['project']." WHERE object NOT IN (SELECT object FROM styles WHERE projectoid=".$_GET['projectid'].");";
	$results = pg_query($query);
	$rows = pg_num_rows($results);
	$i = 0;
	while ($row = pg_fetch_row($results))
	{
	    $i++;
	    if ($rows == $i)
	    {
		$json = $json.'{"object":'.'"'.$row[0].'"}';
	    }
	    else
	    {
		$json = $json.'{"object":'.'"'.$row[0].'"},';
	    }
	}
    }
    else
    {
	$query = "SELECT oid,object,radius,fillcolor,strokecolor,strokewidth from styles where projectoid= ".$_GET['projectid'];
	$results = pg_query($query);
	$rows = pg_num_rows($results);
	$i = 0;
	while ($row = pg_fetch_row($results))
	{
	    $i++;
	    if ($rows == $i)
	    {
		$json = $json.'{"oid":'.$row[0].',"object":"'.$row[1].'","radius":'.$row[2].',"fillcolor":"'.$row[3].'","strokecolor":"'.$row[4].'","strokewidth":'.$row[5].'}';
	    }
	    else
	    {
		$json = $json.'{"oid":'.$row[0].',"object":"'.$row[1].'","radius":'.$row[2].',"fillcolor":"'.$row[3].'","strokecolor":"'.$row[4].'","strokewidth":'.$row[5].'},';
	    }
	}
    }
    $json = $json.']';
    echo $json;
    pg_close($dbconn);
?>

