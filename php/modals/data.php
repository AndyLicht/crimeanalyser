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
							    <span class='btn btn-default btn-file'><span class='glyphicon glyphicon-folder-open'></span><input name='filetoupload' class='form-control' id='filetoupload' type='file' accept='.txt,application/vnd.openxmlformats-officedocument.spreadsheetml.sheet'></span>
							</span>
    							<input type='text'id='filetoimport' name='filetoimport' class='form-control'>
							<span class='input-group-btn'>
							    <button type='submit' class='btn btn-default' id='upload_file'>Upload</button>
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
					<th data-field='xcoor'>X-Koor.</th>
					<th data-field='ycoor'>Y-Koor.</th>
					<th data-field='location'>Location</th>
					<th data-field='action' data-formatter='actionFormatterData'></th>
                            	    </tr>
                        	</thead>
                    	    </table>
                    	    <br>
			    <form class='createitem-formular' action='php/create.php' title='' method='post'>
				<div class='row'>
				    <div class='col-md-6'>
					<div class='form-group'>
					    <div class='input-group date' id='datadatepicker'>
						<input type='text'id='date' class='form-control myforminput' />
                				<span class='input-group-addon'>
                    				    <span class='glyphicon glyphicon-calendar'></span>
						</span>
            				    </div>
        				</div>
				    </div>
				    <div class='col-md-6'>
					<div class='form-group'>
            				    <div class='input-group date' id='datatimepicker'>
                				<input type='text' id='time' class='form-control myforminput' />
                				<span class='input-group-addon'>
                    				    <span class='glyphicon glyphicon-time'></span>
				                </span>
            				    </div>
        				</div>
				    </div>
				</div>
                        	<br>
				<input type='text' class='form-control myforminput' id='dataobject' placeholder='Objekt'>
                        	<br>
				<textarea class='form-control myforminput' rows='5'id='datadescription' placeholder='Beschreibung'></textarea>
                        	<br>
				<input class='form-control myforminput' id='datalocation' placeholder='Location'>
                        	<br>
				<div class='row'>
				    <div class='col-md-6'id='ol3map_small'></div>
				    <div class='col-md-6'>
					<input class='form-control myforminput' id='dataxcoor' placeholder='X-Koordinate' disabled>
                        		<br>
					<input class='form-control myforminput' id='dataycoor' placeholder='Y-Koordinate' disabled>
                        		<br>
				    </div>
				    <br>
				</div>
				<button type='submit' class='btn btn-default createitemsubmit'>Daten anlegen/ändern</button>
                    	    </form>
                	</div>
            	    </div>
        	</div>
    	    </div>";
?>
