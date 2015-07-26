<?php
    $databasesettings = parse_ini_file('databaseconnection.ini');
    $conn_string = 'host='.$databasesettings['host'].' port='.$databasesettings['port'].' dbname='.$databasesettings['database'].' user='.$databasesettings['user'].' password='.$databasesettings['password'];
    $dbconn = pg_connect($conn_string);
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
	$datetime = $_POST['date'].' '.$_POST['time'];
	$query = "INSERT INTO ".$_POST['project']." VALUES (to_timestamp('".$datetime."','YYYY-MM-DD HH24:MI:SS'),'".$_POST['dataobject']."','".$_POST['datalocation']."',ST_GeometryFromText( 'POINT ( ".$_POST['dataxcoor']." ".$_POST['dataycoor'].")', 4326),'".$_POST['datadescription']."');";
	pg_query($query);
	echo '<br><div class="alert alert-success" role="alert">Daten erfolgreich angelegt</div>';
    };
    if($_POST['modal'] == 'modal-styles')
    {
	if($_POST['stylestatus']=='new')
	{
	    $query = "INSERT INTO styles values('".$_POST['styleobject']."',".$_POST['projectid'].",".$_POST['styleradius'].",'".$_POST['fillcolorpicker']."',".$_POST['stylestrokewidth'].",'".$_POST['strokecolorpicker']."');";
	    pg_query($query);
	    echo '<br><div class="alert alert-success" role="alert">Style angelegt</div>';
	}
	else
	{
	    $query = "UPDATE styles set object='".$_POST['styleobject']."',projectoid=".$_POST['projectid'].",radius=".$_POST['styleradius'].",fillcolor='".$_POST['fillcolorpicker']."',strokewidth=".$_POST['stylestrokewidth'].",strokecolor='".$_POST['strokecolorpicker']."' where oid=".$_POST['styleoid'].";";
	    pg_query($query);
	    echo '<br><div class="alert alert-success" role="alert">Style geändert</div>';
	};
    };
    pg_close($dbconn);
?>
