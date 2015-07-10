<?php
    $databasesettings = parse_ini_file('../databaseconnection.ini');
    $conn_string = 'host='.$databasesettings['host'].' port='.$databasesettings['port'].' dbname='.$databasesettings['database'].' user='.$databasesettings['user'].' password='.$databasesettings['password'];
    $dbconn = pg_connect($conn_string);

    $machinename =  strtolower($_POST['projectname']);
	

    $query = "SELECT name from crimeanalyser where machinename = '".$machinename."';";
    $results = pg_query($query);
    if(pg_num_rows($results) > 0 )
    {
	echo 'bereits vorhanden bitte waehlen Sie einen alternativen Namen';
    }
    else
    {
	$query = "INSERT INTO crimeanalyser VALUES('".$_POST['projectname']."','".$machinename."','".$_POST['projectdescription']."')";
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
	echo 'Projekt erfolgreich angelegt';
    }
    pg_close($dbconn);
?>
