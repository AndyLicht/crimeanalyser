<?php
    $databasesettings = parse_ini_file('../databaseconnection.ini');
    $conn_string = 'host='.$databasesettings['host'].' port='.$databasesettings['port'].' dbname='.$databasesettings['database'].' user='.$databasesettings['user'].' password='.$databasesettings['password'];
    $dbconn = pg_connect($conn_string);
    var_dump($_POST);
    if($_POST['status']=='new')
    {
	$query = "INSERT INTO styles values('".$_POST['object']."',".$_POST['projectid'].",".$_POST['radius'].",'".$_POST['fillcolor']."',".$_POST['strokewidth'].",'".$_POST['strokecolor']."');";
	pg_query($query);
    }
    else
    {
	$query = "UPDATE styles set object='".$_POST['object']."',projectid=".$_POST['projectid'].",radius=".$_POST['radius'].",fillcolor='".$_POST['fillcolor']."',strokewidt=".$_POST['strokewidth'].",'strokecolor=".$_POST['strokecolor']."' where oid=".$_POST['styleoid'].";";
	pg_query($query);
    };
    echo 'Style erfolgreich geändert';

    pg_close($dbconn);
?>
