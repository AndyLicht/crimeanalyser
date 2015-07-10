<?php
$modal_projects ="<div id='modal-projects' class='modal fade'>
    <div class='modal-dialog'>
	<div class='modal-content'>
	    <div class='modal-header'>
		<button type='button' class='close' data-dismiss='modal' aria-label='Close'><span aria-hidden='true'>&times;</span></button>
    		<h4 class='modal-title'>Projekte</h4>
	    </div>
	    <div class='modal-body'>
		<table id='projecttable' data-toggle='table' data-url='php/projects/getprojects_json.php' data-single-select='false' data-cache='false' data-height='299'>
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
	    <div class='modal-footer'>
		<div id='statusmeldung'>
		</div>
		<br>
		<button type='button' id='newproject' class='btn btn-success'>New Project</button>
    		<button type='button' id='deleteproject' class='btn btn-danger'>Delete Projects</button>
	    </div>
	</div>
    </div>
</div>";

?>
