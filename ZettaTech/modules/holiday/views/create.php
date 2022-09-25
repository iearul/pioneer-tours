<link rel="stylesheet" type="text/css" href="assets/global/plugins/bootstrap-fileinput/bootstrap-fileinput.css"/>
<script type="text/javascript" src="assets/global/plugins/bootstrap-fileinput/bootstrap-fileinput.js"></script>
<div class="row">    
    <div class="col-md-12 ">
        <!-- BEGIN SAMPLE FORM PORTLET-->
        <div class="portlet light bordered">
            <div class="portlet-title">
                <div class="caption">
                    Add Holiday
                </div>
            </div>
            <div class="portlet-body form">
                <?= form_open_multipart(uri_string(), array('class' => 'form-horizontal')) ?>
                <div class="form-body">
                    <div class="form-group ">
                        <label class="control-label col-md-3">Title</label>
                        <div class="col-md-9">
                                <?php echo form_input($title);?>
                        </div>
                    </div>
                </div>
                <div class="form-body">
                    <div class="form-group ">
                        <label class="control-label col-md-3">Date</label>
                        <div class="col-md-9">
                                <?php echo form_input($date);?>
                        </div>
                    </div>
                </div>
                <div class="form-body">
                    <div class="form-group ">
                        <label class="control-label col-md-3">Repeat</label>
                        <div class="col-md-9">
                                <?=form_dropdown($repeat_name, $repeat_value, $repeat_selected, $dropdown_class)?>
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


