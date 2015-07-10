<?php
    $databasesettings = parse_ini_file('../databaseconnection.ini');
    $conn_string = 'host='.$databasesettings['host'].' port='.$databasesettings['port'].' dbname='.$databasesettings['database'].' user='.$databasesettings['user'].' password='.$databasesettings['password'];
    $dbconn = pg_connect($conn_string);

    foreach($_POST['todelete'] as $row)
    {
	$query = 'Drop table '.$row['name'].';';
	pg_query($query);
	$query = 'Delete from crimeanalyser where oid ='.$row['id'].';';
	pg_query($query);
    }
    echo 'Projekte erfolreich geloescht';
    pg_close($dbconn);
?>
