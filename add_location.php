   <div class="row-fluid">
                        <!-- block -->
                        <div class="block">
                            <div class="navbar navbar-inner block-header">
                                <div class="muted pull-left"> <i class="icon-plus-sign icon-large"> Add Location</i></div>
                            </div>
                            <div class="block-content collapse in">
                                <div class="span12">
								<form method="post">
										<div class="control-group">
                                          <div class="controls">
                                            <input name="stdev_location_name" class="input focused" id="focusedInput" type="text" placeholder = "location Name" required>
                                          </div>
                                        </div>
										
										<div id="hide">
										<div class="control-group">
                                          <div class="controls">
                                            <input name="thumbnails" class="input focused" >
                                          </div>
                                        </div>
									    </div>
										 
											<div class="control-group">
											<div class="controls">
												<button name="save" class="btn btn-info" id="save" data-placement="right" title="Click to Add"><i class="icon-plus-sign icon-large"> Add</i></button>
                                                <script type="text/javascript">
	                                            $(document).ready(function(){
	                                            $('#save').tooltip('show');
	                                            $('#save').tooltip('hide');
	                                            });
	                                            </script>
                                          </div>                                          
                                        </div>
                                </form>
								</div>
                            </div>
                        </div>
                        <!-- /block -->
                    </div><?php
if (isset($_POST['save'])){
$stdev_location_name = $_POST['stdev_location_name'];
$thumbnails = $_POST['thumbnails'];

$query = mysql_query("select * from stlocation where stdev_location_name  =  '$stdev_location_name' ")or die(mysql_error());
$count = mysql_num_rows($query);

if ($count > 0){ ?>
<script>
alert('Location Name Already Exist');
</script>
<?php
}else{
mysql_query("insert into stlocation (stdev_location_name,thumbnails) values('$stdev_location_name','images/thumbnails.jpg')")or die(mysql_error());

mysql_query("insert into activity_log (date,username,action) values(NOW(),'$admin_username','Add location $stdev_location_name')")or die(mysql_error());
?>
<script>
$.jGrowl("Location Successfully added", { header: 'Location add' });
window.location = "location.php";
</script>
<?php
}
}
?>