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
		<form class='createitem-formular'action='php/create.php' title='' method='post'>
		    <input type='text' class='form-control myforminput' id='projectname' placeholder='Projektname'>
		    <br>
		    <textarea class='form-control myforminput' rows='5' id='projectbeschreibung' placeholder='Projektbeschreibung'></textarea>
		    <br>
		    <button type='submit' class='btn btn-default createitemsubmit'>Projekt anlegen</button>
		</form>
	    </div>
	</div>
    </div>
</div>";

?>
