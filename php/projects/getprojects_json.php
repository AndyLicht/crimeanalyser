<?php
    $databasesettings = parse_ini_file('../databaseconnection.ini');
    $conn_string = 'host='.$databasesettings['host'].' port='.$databasesettings['port'].' dbname='.$databasesettings['database'].' user='.$databasesettings['user'].' password='.$databasesettings['password'];
    $dbconn = pg_connect($conn_string);

    $query = "SELECT oid,name,description from crimeanalyser";
    $results = pg_query($query);
    $json = '[';
    $rows = pg_num_rows($results);
    $i = 0;
    while ($row = pg_fetch_row($results))
    {
	$i++;
	if ($rows == $i)
	{
	    $json = $json.'{ "id":'.$row[0].', "name": "'.$row[1].'", "description": "'.$row[2].'"}';
	}
	else
	{
	    $json = $json.'{ "id":'.$row[0].', "name": "'.$row[1].'", "description": "'.$row[2].'"},';
	}
    }
    $json = $json.']';
    echo $json;
    pg_close($dbconn);
?>

