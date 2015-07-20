<?php
    $databasesettings = parse_ini_file('databaseconnection.ini');
    $conn_string = 'host='.$databasesettings['host'].' port='.$databasesettings['port'].' dbname='.$databasesettings['database'].' user='.$databasesettings['user'].' password='.$databasesettings['password'];
    $dbconn = pg_connect($conn_string);
    if($_POST['modal'] == 'modal-projects')
    {
	foreach($_POST['todelete'] as $row)
	{
	    $id = $row['id'];
	    $query = 'Select machinename from crimeanalyser where oid = '.$id.';';
	    echo $query;
	    $result = pg_query($query);
	    while ($row = pg_fetch_row($result)) 
	    {
		$query = 'Drop table '.$row[0].';';
		pg_query($query);
	    };
	    $query = 'Delete from crimeanalyser where oid ='.$id.';';
	    echo $query;
	    pg_query($query);
	}
	echo '<br><div class="alert alert-success" role="alert">Projekt(e) erfolgreich gelöscht</div>';

    };
    if($_POST['modal'] == 'modal-data')
    {
	foreach($_POST['todelete'] as $row)
	{
	    $query = 'Delete from '.$_POST['project'].' where oid ='.$row['id'].';';
	    pg_query($query);
	}
	echo '<br><div class="alert alert-success" role="alert">Daten erfolgreich gelöscht</div>';
    };
    if($_POST['modal'] == 'modal-styles')
    {
	foreach($_POST['todelete'] as $row)
	{
	    $query = 'Delete from styles where oid ='.$row['oid'].';';
	    echo $query;
	    pg_query($query);
	}
	echo '<br><div class="alert alert-success" role="alert">Styles erfolgreich auf default Werte gesetzt</div>';
    };
    pg_close($dbconn);
?>
