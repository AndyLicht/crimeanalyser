<?php
    $databasesettings = parse_ini_file('databaseconnection.ini');
    $conn_string = 'host='.$databasesettings['host'].' port='.$databasesettings['port'].' dbname='.$databasesettings['database'].' user='.$databasesettings['user'].' password='.$databasesettings['password'];
    $dbconn = pg_connect($conn_string);
    var_dump($_POST);
    if($_POST['modal'] == 'modal-projects')
    {
	$machinename =  strtolower($_POST['projectname']);
	$query = "SELECT name from crimeanalyser where machinename = '".$machinename."';";
	$results = pg_query($query);
	if(pg_num_rows($results) > 0 )
	{
	    echo '<br><div class="alert alert-danger" role="alert">bereits vorhanden bitte waehlen Sie einen alternativen Namen<div>';
	}
	else
	{
	    $query = "INSERT INTO crimeanalyser VALUES('".$_POST['projectname']."','".$machinename."','".$_POST['projectbeschreibung']."')";
	    pg_query($query);
	    $query = 'CREATE TABLE '.$machinename.'
	    (
		"time" timestamp with time zone,
		object text,
		location text,
		the_geom geometry(Point,4326),
		pdescription text
	    )
	    WITH
	    (
		OIDS=TRUE
	    );
	    ALTER TABLE '.$machinename.' OWNER TO postgres;';
	    pg_query($query);
	    echo '<br><div class="alert alert-success" role="alert">Projekt erfolgreich angelegt</div>';
	}
    };
    if($_POST['modal'] == 'modal-data')
    {
	echo '<br><div class="alert alert-success" role="alert">Daten erfolgreich angelegt</div>';
    };
    if($_POST['modal'] == 'modal-styles')
    {
	echo '<br><div class="alert alert-success" role="alert">Styles angelegt</div>';
    };
    pg_close($dbconn);
?>
