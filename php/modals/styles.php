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
			    <th data-field='action' data-formatter='actionFormatterStyles'>Action</th>
			</tr>
		    </thead>
		</table>
		<h4>noch ohne Style</h4>
		<table id='stylestable_default' data-toggle='table' data-url='' data-cache='false' data-height='299'>
		    <thead>
			<tr>
			    <th data-field='object'>Objekt</th>
			    <th data-field='action' data-formatter='actionFormatterStylesDefault'>Action</th>
			</tr>
		    </thead>
		</table>
		<br>
		<br>
		<div id='stylechangeform'>
			    <input type='text' id='stylestatus' class='form-control' disabled>
			    <input type='text' class='form-control' id='changestyleobject' placeholder='Objekt' disabled>
                            <br>
                            <input type='number' class='form-control' id='changestyleradius' min='1' max='20' step='1'>
                            <br>
			    <div class='input-group colorpicker-component demo demo-auto colorpicker-element'>
                        	<input id='changestylefillcolor' type='text' value='' class='form-control'>
                                <span class='input-group-addon'>
				    <i style='background-color: rgb(155, 25, 235);'>
				    </i>
				</span>
                            </div>
			    <br>
			    <div class='input-group colorpicker-component demo demo-auto colorpicker-element'>
                    		<input id='changestylestrokecolor' type='text' value='' class='form-control'>
                                <span class='input-group-addon'>
				    <i style='background-color: rgb(155, 25, 235);'>
				    </i>
				    </span>
                            </div>
                            <br>
			    <input type='number'class='form-control' id='changestylestrokewidth'  min='0' max='10' step='1'>
                            <br>
                            <button id='savechangestyles' type='button' class='btn btn-default'>ändern</button>
                        </div>
	    </div>
	</div>
    </div>
</div>";
?>
