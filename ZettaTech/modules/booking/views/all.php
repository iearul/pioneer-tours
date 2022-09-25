<script type="text/javascript">
    function getTime(){
        var tour = $( "select[name='tour']" ).val();
        var language = $( "select[name='language']" ).val();        
        $.ajax({
            type: "POST",
            url: "<?=site_url()?>booking/getTime/"+tour+"/"+language,
            success: function(data){
                var json = jQuery.parseJSON( data );
                if(json.error){
                    console.log(json.error);
                }
                else{
                    $('.ZettaTime').show();
                    $("select[name='time']").html(json.searchData);
                }
            }
        });
    };    
</script>
<link href="assets/global/plugins/datatables/datatables.min.css" rel="stylesheet" type="text/css" />
<link href="assets/global/plugins/datatables/plugins/bootstrap/datatables.bootstrap.css" rel="stylesheet" type="text/css" />
<script src="assets/global/scripts/datatable.js" type="text/javascript"></script>
<script src="assets/global/plugins/datatables/datatables.min.js" type="text/javascript"></script>
<script src="assets/global/plugins/datatables/plugins/bootstrap/datatables.bootstrap.js" type="text/javascript"></script>
        <script src="assets/pages/scripts/table-datatables-rowreorder.min.js" type="text/javascript"></script>
<div class="row">    
    <div class="col-md-12 ">
        <!-- BEGIN SAMPLE FORM PORTLET-->
        <div class="portlet light bordered">
            <div class="portlet-title">
                <div class="caption">
                    Search Bookings
                </div>
            </div>
            <div class="portlet-body form">
                <?=form_open_multipart(uri_string(), array('class' => 'form-horizontal'))?>
                <div class="form-body">                
                    <div class="form-group ">
                        <label class="control-label col-md-3">Tour</label>
                        <div class="col-md-9">
                            <?=form_dropdown($tour_name, $tour_value, $tour_selected, $dropdown_class_required)?>
                        </div>
                    </div>                     
                    <div class="form-group ">
                        <label class="control-label col-md-3">Language</label>
                        <div class="col-md-9">
                            <?=form_dropdown($language_name, $language_value, $language_selected, $dropdown_class.' onchange="getTime();"')?>
                        </div>
                    </div>                               
                    <div class="form-group ZettaTime" style="display: none;">
                        <label class="control-label col-md-3">Time</label>
                        <div class="col-md-9">
                            <?=form_dropdown($time_name, $time_value, $time_selected, $dropdown_class)?>
                        </div>
                    </div> 
                    <div class="form-group ">
                        <label class="control-label col-md-3">Date</label>
                        <div class="col-md-9">
                            <?php echo form_input($date);?>
                        </div>
                    </div>    
                </div>
                <div class="form-actions">
                    <div class="row">
                        <div class="col-md-offset-3 col-md-9">
                            <input type="submit" class="btn green" value="Submit" name="submit">
                        </div>
                    </div>
                </div>
                <?php echo form_close(); ?>
            </div>
        </div>
    </div>
</div>
<div class="row">
        <div class="col-md-12">
                <!-- BEGIN EXAMPLE TABLE PORTLET-->
                <div class="portlet light bordered">
                        <div class="portlet-title">
                                <div class="caption">
                                        All Bookings
                                </div>
                        </div>
                        <div class="portlet-body">
                                <table class="table table-striped table-bordered table-hover table-responsive" id="sample_1">
                                    <thead>
                                        <tr>
                                                <th>Client Name</th>
                                                <th>Adult</th>
                                                <th>Student</th>
                                                <th>Child</th>
                                                <th>Mobile</th>
                                                <th>Email</th>
                                                <th>Tour ID</th>
                                                <th>Language</th>
                                                <th>Time</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <?php foreach ($bookings as $booking) { ?>
                                            <tr>
                                                <td><?=$booking->full_name?></td>
                                                <td><?=$booking->adult_qty?></td>
                                                <td><?=$booking->student_qty?></td>
                                                <td><?=$booking->child_qty?></td>
                                                <td><?=$booking->phone?></td>
                                                <td><?=$booking->email?></td>
                                                <td><?=$booking->tourID?></td>
                                                <td><?=$booking->language?></td>
                                                <td><?=$booking->time?></td>
                                            </tr>
                                        <?php } ?>
                                    </tbody>
                                </table>
                        </div>
                </div>
                <!-- END EXAMPLE TABLE PORTLET-->
        </div>
</div>

