<div class="row">    
    <div class="col-md-12 ">
        <!-- BEGIN SAMPLE FORM PORTLET-->
        <div class="portlet light bordered">
            <div class="portlet-title">
                <div class="caption">
                    Edit FAQ
                </div>
            </div>
            <div class="portlet-body form">
                <?= form_open_multipart(uri_string(), array('class' => 'form-horizontal')) ?>
                <div class="form-body">
                    <div class="form-group">
                        <label class="col-md-3 control-label">FAQ Category</label>
                        <div class="col-md-9">
                            <?=form_dropdown($category_name, $category_value, $category_selected, $dropdown_class)?>
                        </div>
                    </div>
                    <div class="form-group ">
                        <label class="control-label col-md-3">English Question</label>
                        <div class="col-md-9">
                            <?php echo form_input($q_english);?>
                        </div>
                    </div>
                    <div class="form-group ">
                        <label class="control-label col-md-3">Italian Question</label>
                        <div class="col-md-9">
                            <?php echo form_input($q_italian);?>
                        </div>
                    </div>
                    <div class="form-group ">
                        <label class="control-label col-md-3">Spanish Question</label>
                        <div class="col-md-9">
                            <?php echo form_input($q_spanish);?>
                        </div>
                    </div>
                    <div class="form-group ">
                        <label class="control-label col-md-3">German Question</label>
                        <div class="col-md-9">
                            <?php echo form_input($q_german);?>
                        </div>
                    </div>
                    <div class="form-group ">
                        <label class="control-label col-md-3">French Question</label>
                        <div class="col-md-9">
                            <?php echo form_input($q_french);?>
                        </div>
                    </div>
                    <div class="form-group ">
                        <label class="control-label col-md-3">Russian Question</label>
                        <div class="col-md-9">
                            <?php echo form_input($q_russian);?>
                        </div>
                    </div>
                    <div class="form-group ">
                        <label class="control-label col-md-3">English Answer</label>
                        <div class="col-md-9">
                            <?php echo form_textarea($a_english);?>
                        </div>
                    </div>
                    <div class="form-group ">
                        <label class="control-label col-md-3">Italian Answer</label>
                        <div class="col-md-9">
                            <?php echo form_textarea($a_italian);?>
                        </div>
                    </div>
                    <div class="form-group ">
                        <label class="control-label col-md-3">Spanish Answer</label>
                        <div class="col-md-9">
                            <?php echo form_textarea($a_spanish);?>
                        </div>
                    </div>
                    <div class="form-group ">
                        <label class="control-label col-md-3">German Answer</label>
                        <div class="col-md-9">
                            <?php echo form_textarea($a_german);?>
                        </div>
                    </div>
                    <div class="form-group ">
                        <label class="control-label col-md-3">French Answer</label>
                        <div class="col-md-9">
                            <?php echo form_textarea($a_french);?>
                        </div>
                    </div>
                    <div class="form-group ">
                        <label class="control-label col-md-3">Russian Answer</label>
                        <div class="col-md-9">
                            <?php echo form_textarea($a_russian);?>
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


