<?php
    $databasesettings = null;

    if(file_exists ('php/databaseconnection.ini'))
    {
	$databasesettings = parse_ini_file('php/databaseconnection.ini');
    }
    else
    {
	$databasesettings = parse_ini_file('../databaseconnection.ini');
    }
    $conn_string = 'host='.$databasesettings['host'].' port='.$databasesettings['port'].' dbname='.$databasesettings['database'].' user='.$databasesettings['user'].' password='.$databasesettings['password'];
    $dbconn = pg_connect($conn_string);

    $query = "SELECT name,oid,machinename from crimeanalyser;";
    $results = pg_query($query);
    $projects = '';
    while ($row = pg_fetch_row($results))
    {
	$projects = $projects.'<li class="projectchange"><a class="projectchangelink" projectid="'.$row[1].'" machinename="'.$row[2].'" href="#">'.$row[0].'</a></li>';
    }
    if(isset($_POST['echo']))
    {
	if($_POST['echo']=='true')
	{
	    echo $projects;
	}
    }
    pg_close($dbconn);
?>

