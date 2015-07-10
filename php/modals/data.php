<?php

$modal_data = "<div id='modal-data' class='modal fade'>
            <div class='modal-dialog'>
                <div class='modal-content'>
                    <div class='modal-header'>
			<button type='button' class='close' data-dismiss='modal' aria-label='Close'><span aria-hidden='true'>&times;</span></button>
                        <h4 class='modal-title'>Falldaten</h4>
                    </div>
                    <div class='modal-body'>
			<div class='customtoolbar col-lg-10'>
				<form id='uploadForm' method='post' enctype='multipart/form-data'>
				    <div class='customtoolbaritems col-lg-3'>
					<div class='input-group'>
            				    <span class='input-group-btn'>
                				<span class='btn btn-default btn-file'><span class='glyphicon glyphicon-folder-open'></span><input name='filetoupload' id='filetoupload' type='file' accept='.txt'></span>
            				    </span>
            				    <input type='text'id='filetoimport' name='filetoimport' class='form-control'>
        				</div>
				    </div>
				    <div class='customtoolbaritems col-lg-3'>
					<div class='btn-group'>
					    <button type='submit' id='startimport' class='btn btn-default'>Import</button>
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
				    </div>
			    </form>
			    <div class='customtoolbaritems col-lg-3'>
				<form method='get' action='files/template.xlsx'>
				    <button type='submit' class='btn btn-default' id='download_template'><span class='glyphicon glyphicon-download-alt'></span></button>
				</form>
			    </div>
			</div>
                        <table id='datatable' data-toggle='table' data-search='true' data-url='' data-single-select='false' data-cache='false' data-height='299'>
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
                    <div class='modal-footer'>
                        <div id='data-statusmeldung'>
                        </div>
                        <br>
                        <button type='button' id='newdata' class='btn btn-success'>New Data</button>
                        <button type='button' id='deletedata' class='btn btn-danger'>Delete Data</button>
                    </div>
                </div>
            </div>
        </div>";
?>
