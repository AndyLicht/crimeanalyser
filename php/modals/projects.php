<?php
$modal_projects ="<div id='modal-projects' class='modal fade'>
    <div class='modal-dialog'>
	<div class='modal-content'>
	    <div class='modal-header'>
		<button type='button' class='close' data-dismiss='modal' aria-label='Close'><span aria-hidden='true'>&times;</span></button>
		<div class='container-fluid modalheader'>
		    <h4 class='modal-title'>Projekte</h4>
		    <div class='statusmeldung'></div>
		</div>
	    </div>
	    <div class='modal-body'>
		<nav class='navbar navbar-default'>
		    <div class='modaltoolbar container-fluid'>
			<div class='btn-toolbar'>
			    <div class='btn-group'>
				<button type='button' class='btn btn-default navbar-btn newdata'><span class='glyphicon glyphicon-plus'></span></button>
				<button type='button' class='btn btn-default navbar-btn deletedata'><span class='glyphicon glyphicon-trash'></span></button>
			    </div>
			</div>
		    </div>
		</nav>
		<table id='projecttable' class='datatable' data-toggle='table' data-url='php/projects/getprojects_json.php' data-single-select='false' data-cache='false' data-height='299'>
		    <thead>
    			<tr>
			    <th data-field='state' data-checkbox='true'></th>
			    <th data-field='id'>ID</th>
			    <th data-field='name'>Name</th>
			    <th data-field='description'>Beschreibung</th>
			    <th data-field='action' data-formatter='actionFormatterProject'>Action</th>
			</tr>
		    </thead>
		</table>
		<br>
		<br>
		<div id='projectform'>
		    <input type='text' class='form-control' id='newprojectname' placeholder='Projektname'>
		    <br>
		    <textarea class='form-control' rows='5'id='newprojectdescription' placeholder='Projektbeschreibung'></textarea>
		    <br>
		    <button id='savenewproject' type='button' class='btn btn-default'>Anlegen</button>
		</div>
	    </div>
	</div>
    </div>
</div>";

?>
