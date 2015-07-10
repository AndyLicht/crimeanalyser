<?php

    $databasesettings = parse_ini_file('../databaseconnection.ini');
    $conn_string = 'host='.$databasesettings['host'].' port='.$databasesettings['port'].' dbname='.$databasesettings['database'].' user='.$databasesettings['user'].' password='.$databasesettings['password'];
    $dbconn = pg_connect($conn_string);

    $query = "UPDATE ".$_POST['project']." SET time=to_timestamp('".$_POST['time']."','YYYY-MM-DD HH24:MI:SS'),object='".$_POST['object']."',pdescription='".$_POST['description']."',location='".$_POST['location']."',the_geom= ST_GeometryFromText ( 'POINT ( ".$_POST['xcoor']." ".$_POST['ycoor'].")', 4326) where oid=".$_POST['oid'].";";

    pg_query($query);
    
    echo 'Daten erfolgreich geändert';
    
    pg_close($dbconn);
?>


