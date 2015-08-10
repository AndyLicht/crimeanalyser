<?php
    $conn_string = "host=localhost port=5432 dbname=geogockel user=postgres password=#AfDfCh1965";
    $dbconn = pg_connect($conn_string);

    //Vorbereitung GeoJSON
    $geojson = '';
    if(isset($_GET['machinename']))
    {
	$results = pg_query($dbconn,"SELECT ST_Extent(the_geom) as bextent FROM ".$_GET['machinename'].";");
	$bbox = '';
	while ($row = pg_fetch_row($results))
	{
	    $bbox = $row[0];
	}
	$bbox = str_replace('BOX','',$bbox);
	$bbox = str_replace('(','',$bbox);
	$bbox = str_replace(')','',$bbox);
	$bbox = str_replace(' ',',',$bbox);

	$geojson = $geojson."{\"type\": \"FeatureCollection\",
        \"crs\": {
          \"type\": \"name\",
          \"properties\": {
            \"name\": \"EPSG:4326\",
	    \"extent\":[".$bbox."]
          }
        },\"features\": [";
	$results = pg_query($dbconn, "SELECT oid,object,time,to_char(time,'ww') as week,ST_X(the_geom),ST_Y(the_geom),location,pdescription,to_char(time,'id') as weekday,to_char(time,'mm') as month FROM ".$_GET['machinename'].";");
	$results_count = pg_num_rows($results);
	$i = 0;
	while ($row = pg_fetch_row($results))
	{
	    $i++;
	    if($i < $results_count)
	    {
		$geojson = $geojson."
			    {
				\"id\":".$row[0].",
				\"type\": \"Feature\",
				\"properties\":
				{
				    \"time\":\"".$row[2]."\",
				    \"week\":\"".$row[3]."\",
				    \"weekday\":\"".$row[8]."\",
				    \"month\":\"".$row[9]."\",
				    \"object\":\"".$row[1]."\",
				    \"location\":\"".$row[6]."\",
				    \"beschreibung\":\"".$row[7]."\"
				},
				\"geometry\": 
				{
				    \"type\": \"Point\",
				    \"coordinates\": [".$row[4].",".$row[5]."]
				}
			    },";
	    }
	    else
	    {
		$geojson = $geojson."
			    {
				\"id\":".$row[0].",
				\"type\": \"Feature\",
				\"properties\":
				{
				    \"time\":\"".$row[2]."\",
				    \"week\":\"".$row[3]."\",
				    \"weekday\":\"".$row[8]."\",
				    \"month\":\"".$row[9]."\",
				    \"object\":\"".$row[1]."\",
				    \"location\":\"".$row[6]."\",
				    \"beschreibung\":\"".$row[7]."\"
				},
				\"geometry\": 
				{
				    \"type\": \"Point\",
				    \"coordinates\": [".$row[4].",".$row[5]."]
				}
			    }]}";
	    }
	}
    }
    else
    {
	$geojson = $geojson."{\"type\": \"FeatureCollection\",
        \"crs\": {
          \"type\": \"name\",
          \"properties\": {
            \"name\": \"EPSG:4326\"
          }
        },\"features\": []}";
    };
    echo $geojson;
    pg_close($dbconn);
?>
