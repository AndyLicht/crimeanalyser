<?php
    $databasesettings = parse_ini_file('../databaseconnection.ini');
    $conn_string = 'host='.$databasesettings['host'].' port='.$databasesettings['port'].' dbname='.$databasesettings['database'].' user='.$databasesettings['user'].' password='.$databasesettings['password'];
    $dbconn = pg_connect($conn_string);

    $query = "INSERT INTO ".$_POST['project']." VALUES (to_timestamp('".$_POST['time']."','YYYY-MM-DD HH24:MI:SS'),'".$_POST['object']."','".$_POST['location']."',ST_GeometryFromText( 'POINT ( ".$_POST['xcoor']." ".$_POST['ycoor'].")', 4326),'".$_POST['description']."');";
    echo $query;

    pg_query($query);

    echo 'Projekt erfolgreich angelegt';

    pg_close($dbconn);
?>
