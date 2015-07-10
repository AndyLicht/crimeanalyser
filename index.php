<?php
    include('php/projects/getprojects_dropdown.php');
    include('php/modals/impressum.php');
    include('php/modals/styles.php');
    include('php/modals/data.php');
    include('php/modals/help.php');
    include('php/modals/projects.php');
    include('php/filter/time.php');
?>
<!DOCTYPE html>
<html lang="en">
    <head>
	<meta charset="utf-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<title>CrimeAnalyser</title>
	<link href="css/libraries/bootstrap.min.css" rel="stylesheet">
	<link href="js/libraries/bootstrap-table/src/bootstrap-table.css" rel="stylesheet">
	<link href="js/libraries/bootstrap-colorpicker/dist/css/bootstrap-colorpicker.min.css" rel="stylesheet">
	<link href="js/libraries/bootstrap_dropdowns_enhancement/dist/css/dropdowns-enhancement.css" rel="stylesheet">
	<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/ol3/3.6.0/ol.css" type="text/css">
	<link href="css/overrides.css" rel="stylesheet">
	<link href="css/map_overrides.css" rel="stylesheet">
    </head>
    <body>
	<nav class="navbar navbar-inverse">
    	    <div class="container-fluid">
    		<div class="navbar-header">
        	    <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#navbar" aria-expanded="false" aria-controls="navbar">
        		<span class="sr-only">Toggle navigation</span>
        		<span class="icon-bar"></span>
        		<span class="icon-bar"></span>
        		<span class="icon-bar"></span>
        	    </button>
        	    <a class="navbar-brand" href="#">CrimeAnalyser</a>
    		</div>
    		<div id="navbar" class="navbar-collapse collapse">
		    <ul class="nav navbar-nav">
    			<li class="dropdown">
        		    <a href="#" class="dropdown-toggle" id="currentproject" projectid="" machinename="" data-toggle="dropdown" role="button" aria-expanded="false">Projekt <span class="caret"></span></a>
        		    <ul id="projectselection" class="dropdown-menu" role="menu">
				<?php
				    echo $projects;
				?>
        		    </ul>
    			</li>
			<li class="dropdown" id="timefiltersettings">
			    <a href="#" class="dropdown-toggle" id="currenttimefilter" role="button" aria-expanded="false">Zeitfilter <span class="caret"></span>
			    <ul  class="dropdown-menu" role="menu">
			    <?php
				echo $timefilter;
			    ?>
			    </ul>
			</li>
			<li class="recorder" id="time-play"><a href="#"><span class="glyphicon glyphicon-play" aria-hidden="true"></span> Play <span class="sr-only">(current)</span></a></li>
			<li class="recorder" id="time-reset"><a href="#"><span class="glyphicon glyphicon-refresh" aria-hidden="true"></span> Reset </a></li>
			<li class="recorder" id="time-backward"><a href="#"><span class="glyphicon glyphicon-step-backward" aria-hidden="true"></span> Zurück </a></li>
			<li class="recorder" id="time-forward"><a href="#"><span class="glyphicon glyphicon-step-forward" aria-hidden="true"></span> Vor </a></li>
    		    </ul>
		    <form class="navbar-form navbar-left" role="search">
    			<div class="form-group has-feedback">
			    <input id="clock"  type="text" class="form-control" placeholder="Zeitfilter" />
			    <i class="glyphicon glyphicon-time form-control-feedback"></i>
    			</div>
    		    </form>
    		    <ul class="nav navbar-nav navbar-right">
			<li id='osmbutton' class="active"><a href="#">OSM <span class="sr-only">(current)</span></a></li>
			<li id='satbutton' ><a href="#">Satellit <span class="sr-only">(current)</span></a></li>
			<li class="dropdown">
			    <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-expanded="false"> <span class="glyphicon glyphicon-cog"></span></a>
			    <ul class="dropdown-menu" role="menu">
				<li><a href="#" data-toggle="modal" data-target="#modal-projects">Projects</a></li>
				<li><a href="#" data-toggle="modal" data-target="#modal-data">Daten</a></li>
				<li><a href="#" data-toggle="modal" data-target="#modal-styles">Styles</a></li>
			    </ul>
			</li>
			<li><a href="#" data-toggle="modal" data-target="#modal-impressum"><span class="glyphicon glyphicon-info-sign"></a></li>
			<li><a href="#" data-toggle="modal" data-target="#modal-help"><span class="glyphicon glyphicon-question-sign"></a></li>
    		    </ul>
		</div>
    	    </div>
	</nav>
<!-- Body für die Karte und für das Informationspanel -->
	<div class="row">
	    <div class="col-md-10 map" id='ol3map'></div>
	    <div class="col-md-2">
	        <div id="infofield"></div>
		<div id="legend" class="img-responsive" alt="Platz für eine Legende"></div>
		    <div class="sidebar-module sidebar-module-inset">
			<h4>Koordinaten:</h4>
			<div id="epsg3857">
			    <h5>EPSG:3857<h5>
			    <div id="mouse-position-3857"></div>
			</div>
			<div id="epsg4326">
			    <h5>EPSG:4326</h5>
			    <div id="mouse-position-4326"></div>
			</div>
			<br>
			<br>
			<div id="scaleline">
			</div>
		    </div>
		</div>
	    </div>
	</div>

<?php
    echo $modal_data;
    echo $modal_styles;
    echo $modal_impressum;
    echo $modal_help;
    echo $modal_projects;
?>


	<script src="js/libraries/jquery-1.11.3.min.js"></script>
	<script src="js/libraries/bootstrap.min.js"></script>
	<script src="js/libraries/bootstrap-table/src/bootstrap-table.js"></script>
	<script src="js/libraries/bootstrap-colorpicker/dist/js/bootstrap-colorpicker.js"></script>
	<script src="js/libraries/bootstrap_dropdowns_enhancement/dist/js/dropdowns-enhancement.js"></script>
	<script src="js/libraries/ol3/build/ol.js" type="text/javascript"></script>
	<script src="js/variables.js"></script>
	<script src="js/mapcontrols.js"></script>
	<script src="js/vectorlayer.js"></script>
	<script src="js/rasterlayer.js"></script>
	<script src="js/map.js"></script>
	<script src="js/layerswitcher.js"></script>
	<script src="js/edititems.js"></script>
	<script src="js/manageprojects.js"></script>
	<script src="js/changeproject.js"></script>
	<script src="js/managedata.js"></script>
	<script src="js/managestyles.js"></script>
	<script src="js/mycolorpicker.js"></script>
	<script src="js/importexcel.js"></script>
	<script src="js/timefunction.js"></script>
    </body>
</html>
