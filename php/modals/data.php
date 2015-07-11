<?php
$modal_data = "<div id='modal-data' class='modal fade'>
        	    <div class='modal-dialog'>
            		<div class='modal-content'>
                	    <div class='modal-header'>
				<button type='button' class='close' data-dismiss='modal' aria-label='Close'><span aria-hidden='true'>&times;</span></button>
				<div class='container-fluid modalheader'>
				    <h4 class='modal-title'>Falldaten</h4>
				    <div id='statusmeldungen' class='statusmeldung'></div>
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
					    <div class='btn-group'>
						<form method='get' class='navbar-form' action='files/template.xlsx'>
						    <button type='submit' class='btn btn-default' id='download_template'><span class='glyphicon glyphicon-download'></span></button>
						</form>
					    </div>
					    <div class='btn-group'>
						<form id='uploadForm' class='navbar-form' method='post' enctype='multipart/form-data'>
						    <div class='input-group'>
    							<span class='input-group-btn'>
							    <span class='btn btn-default btn-file'><span class='glyphicon glyphicon-folder-open'></span><input name='filetoupload' class='form-control' id='filetoupload' type='file' accept='.txt'></span>
    							</span>
    							<input type='text'id='filetoimport' name='filetoimport' class='form-control'>
							<span class='input-group-btn'>
						    	    <span id='startimport' class='btn btn-default'>Import</span>
							</span>
						    </div>
						    <div class='btn-group'>
							<button data-toggle='dropdown' class='btn btn-default dropdown-toggle'>Daten <span data-label-placement=''>hinzufügen</span> <span class='caret'></span></button>
							<ul class='dropdown-menu'>
							    <li>
								<input type='radio' id='ex4_1' name='option' value='1' checked=''>
								<label for='ex4_1'>hinzufügen</label>
							    </li>
							    <li>
								<input type='radio' id='ex4_2' name='option' value='2'>
								<label for='ex4_2'>ersetzen</label>
							    </li>
							</ul>
						    </div>
						</form>
					    </div>
					</div>
				    </div>
				</nav>
                    	    <table class='datatable' id='datatable' data-toggle='table' data-search='false' data-url='' data-single-select='false' data-cache='false' data-height='299'>
                        	<thead>
                            	    <tr>
                                	<th data-field='state' data-checkbox='true'></th>
                                        <th data-field='id'>ID</th>
                                        <th data-field='time'>Zeit</th>
                            		<th data-field='objekt'>Objekt</th>
					<th data-field='description'>Beschreibung</th>
					<th data-field='geom'>Geometry</th>
					<th data-field='location'>Location</th>
					<th data-field='action' data-formatter='actionFormatterData'>Action</th>
                            	    </tr>
                        	</thead>
                    	    </table>
                    	    <br>
                    	    <div id='dataaddform'>
                        	<input type='text' class='form-control' id='newdatatime' placeholder='Zeit'>
                        	<br>
				<input type='text' class='form-control' id='newdataobject' placeholder='Objekt'>
                        	<br>
				<textarea class='form-control' rows='5'id='newdatadescription' placeholder='Beschreibung'></textarea>
                        	<br>
				<input class='form-control' id='newdatalocation' placeholder='Location'>
                        	<br>
				<input class='form-control' id='newdataxcoor' placeholder='X-Koordinate'>
                        	<br>
				<input class='form-control' id='newdataycoor' placeholder='Y-Koordinate'>
                        	<br>
                        	<button id='savenewdata' type='button' class='btn btn-default'>Anlegen</button>
                    	    </div>
			    <div id='datachangeform'>
				<p type='text' id='changedataoid'><p>
                        	<br>
                        	<input type='text' class='form-control' id='changedatatime' placeholder='Zeit'>
                        	<br>
				<input type='text' class='form-control' id='changedataobject' placeholder='Objekt'>
                        	<br>
				<textarea class='form-control' rows='5'id='changedatadescription' placeholder='Beschreibung'></textarea>
                        	<br>
				<input class='form-control' id='changedatalocation' placeholder='Location'>
                		<br>
				<input class='form-control' id='changedataxcoor' placeholder='X-Koordinate'>
                        	<br>
				<input class='form-control' id='changedataycoor' placeholder='Y-Koordinate'>
                        	<br>
                        	<button id='savechangedata' type='button' class='btn btn-default'>Aendern</button>
                    	    </div>
		    	    <br>
                	</div>
            	    </div>
        	</div>
    	    </div>";
?>
