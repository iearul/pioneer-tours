<?php
        /**
         * 
         * @copyright	Copyright (c) 2019 Zettabyte Technologies.
         * @Created     25/10/2019
         * @version 	1.0.0
         * @link	http://zettatech.io/
         * 
	 */
?>    


<div class="row">    
    <div class="col-md-12 ">
        <!-- BEGIN SAMPLE FORM PORTLET-->
        <div class="portlet light bordered">
            <div class="portlet-title">
                <div class="caption">
                    Edit Why Choose US
                </div>
            </div>
            <div class="portlet-body form">
                <?= form_open_multipart(uri_string(), array('class' => 'form-horizontal')) ?>
                <div class="form-body">
                    <div class="form-group ">
                        <label class="control-label col-md-3">Icon</label>
                        <div class="col-md-9">
                            <?php echo form_input($icon);?>
                        </div>
                    </div> 
                    <div class="form-group ">
                        <label class="control-label col-md-3">English Title</label>
                        <div class="col-md-9">
                            <?php echo form_input($t_english);?>
                        </div>
                    </div>
                    <div class="form-group ">
                        <label class="control-label col-md-3">Italian Title</label>
                        <div class="col-md-9">
                            <?php echo form_input($t_italian);?>
                        </div>
                    </div>
                    <div class="form-group ">
                        <label class="control-label col-md-3">Spanish Title</label>
                        <div class="col-md-9">
                            <?php echo form_input($t_spanish);?>
                        </div>
                    </div>
                    <div class="form-group ">
                        <label class="control-label col-md-3">German Title</label>
                        <div class="col-md-9">
                            <?php echo form_input($t_german);?>
                        </div>
                    </div>
                    <div class="form-group ">
                        <label class="control-label col-md-3">French Title</label>
                        <div class="col-md-9">
                            <?php echo form_input($t_french);?>
                        </div>
                    </div>
                    <div class="form-group ">
                        <label class="control-label col-md-3">Russian Title</label>
                        <div class="col-md-9">
                            <?php echo form_input($t_russian);?>
                        </div>
                    </div>
                    <div class="form-group ">
                        <label class="control-label col-md-3">English Description</label>
                        <div class="col-md-9">
                            <?php echo form_textarea($d_english);?>
                        </div>
                    </div>
                    <div class="form-group ">
                        <label class="control-label col-md-3">Italian Description</label>
                        <div class="col-md-9">
                            <?php echo form_textarea($d_italian);?>
                        </div>
                    </div>
                    <div class="form-group ">
                        <label class="control-label col-md-3">Spanish Description</label>
                        <div class="col-md-9">
                            <?php echo form_textarea($d_spanish);?>
                        </div>
                    </div>
                    <div class="form-group ">
                        <label class="control-label col-md-3">German Description</label>
                        <div class="col-md-9">
                            <?php echo form_textarea($d_german);?>
                        </div>
                    </div>
                    <div class="form-group ">
                        <label class="control-label col-md-3">French Description</label>
                        <div class="col-md-9">
                            <?php echo form_textarea($d_french);?>
                        </div>
                    </div>
                    <div class="form-group ">
                        <label class="control-label col-md-3">Russian Description</label>
                        <div class="col-md-9">
                            <?php echo form_textarea($d_russian);?>
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


