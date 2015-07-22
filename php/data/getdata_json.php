<?php
    $databasesettings = parse_ini_file('../databaseconnection.ini');
    $conn_string = 'host='.$databasesettings['host'].' port='.$databasesettings['port'].' dbname='.$databasesettings['database'].' user='.$databasesettings['user'].' password='.$databasesettings['password'];
    $dbconn = pg_connect($conn_string);

    $json = '[';

    if(isset($_GET['project']))
    {
	$query = "SELECT oid,time,object,pdescription,ST_X(the_geom)  as xcoor , ST_y(the_geom)  as ycoor,location from ".$_GET['project'];
	$results = pg_query($query);
	$rows = pg_num_rows($results);
	$i = 0;
	while ($row = pg_fetch_row($results))
	{
	    $i++;
	    if ($rows == $i)
	    {
		$json = $json.'{ "id":'.$row[0].', "time": "'.$row[1].'", "objekt": "'.$row[2].'","description": "'.$row[3].'","xcoor":"'.$row[4].'","ycoor":"'.$row[5].'","location":"'.$row[6].'"}';
	    }
	    else
	    {
		$json = $json.'{ "id":'.$row[0].', "time": "'.$row[1].'", "objekt": "'.$row[2].'","description": "'.$row[3].'","xcoor":"'.$row[4].'","ycoor":"'.$row[5].'","location":"'.$row[6].'"},';
	    }
	}
    }
    $json = $json.']';
    echo $json;
    pg_close($dbconn);
?>

