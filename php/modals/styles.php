<?php
$modal_styles = "<div id='modal-styles' class='modal fade'>
    <div class='modal-dialog'>
	<div class='modal-content'>
	    <div class='modal-header'>
		<button type='button' class='close' data-dismiss='modal' aria-label='Close'><span aria-hidden='true'>&times;</span></button>
		<div class='container-fluid modalheader'>
		    <h4 class='modal-title'>Styles</h4>
		    <div class='statusmeldung'></div>
		</div>
	    </div>
	    <div class='modal-body'>
		<nav class='navbar navbar-default'>
		    <div class='modaltoolbar container-fluid'>
			<div class='btn-toolbar'>
			    <div class='btn-group'>
				<button type='button' class='btn btn-default navbar-btn deletedata'><span class='glyphicon glyphicon-trash'></span></button>
			    </div>
			</div>
		    </div>
		</nav>
		<table id='stylestable' class='datatable' data-toggle='table' data-url='' data-single-select='false' data-cache='false' data-height='299'>
		    <thead>
			<tr>
			    <th data-field='state' data-checkbox='true'></th>
			    <th data-field='oid'>ID</th>
			    <th data-field='object'>Objekt</th>
			    <th data-field='radius'>Radius</th>
			    <th data-field='fillcolor'>Füllfarbe</th>
			    <th data-field='strokecolor'>Rahmenfarbe</th>
			    <th data-field='strokewidth'>Rahmenstärke</th>
			    <th data-field='action' data-formatter='actionFormatterStyle'>Action</th>
			</tr>
		    </thead>
		</table>
		<h4>noch ohne Style</h4>
		<table id='stylestable_default' data-toggle='table' data-url='' data-cache='false' data-height='299'>
		    <thead>
			<tr>
			    <th data-field='object'>Objekt</th>
			    <th data-field='action' data-formatter='actionFormatterDefaultStyle'>Action</th>
			</tr>
		    </thead>
		</table>
		<br>
		<br>
		<div class='row'>
		    <div class='col-md-6'>
			<form class='createitem-formular'action='php/create.php' title='' method='post'>
			    <input type='text' id='stylestatus' class='form-control myforminput' disabled>
			    <input type='text' id='styleoid' class='form-control myforminput' disabled>
			    <br>
			    <input type='text' class='form-control myforminput' id='styleobject' placeholder='Objekt' disabled>
                	    <br>
                	    <input type='number' class='form-control myforminput' id='styleradius' min='1' max='20' step='1' value='8'>
                	    <br>
			    <div id='fillpicker' class='input-group mycolorpicker'>
				<input id='fillcolorpicker' type='text' value='rgba(43,147,242,1)' class='form-control myforminput' />
				<span class='input-group-addon'><i></i></span>
			    </div>
			    <br>
			    <div id='strokepicker' class='input-group mycolorpicker'>
				<input id='strokecolorpicker' type='text' value='rgba(28,9,245,1)' class='form-control myforminput' />
				<span class='input-group-addon'><i></i></span>
			    </div>
			    <br>
			    <input type='number'class='form-control myforminput' id='stylestrokewidth'  min='0' max='10' step='1' value='1'>
                	    <br>
			    <button type='submit' class='btn btn-default createitemsubmit'>Styles definieren</button>
			</form>
		    </div>
		    <div class='col-md-6'>
			<h4>Vorschau</h4>
		    </div>
		</div>
	    </div>
	</div>
    </div>
</div>";
?>
