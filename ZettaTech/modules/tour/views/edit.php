<?php
        /**
         * 
         * @copyright	Copyright (c) 2019 Zettabyte Technologies.
         * @Created     14/09/2019
         * @version 	1.0.0
         * @link	http://zettatech.io/
         * 
	 */
?>    

<link rel="stylesheet" type="text/css" href="assets/global/plugins/bootstrap-fileinput/bootstrap-fileinput.css"/>
<script type="text/javascript" src="assets/global/plugins/bootstrap-fileinput/bootstrap-fileinput.js"></script>
<script type="text/javascript" src="assets/redactor/fontsize.js"></script>
<script type="text/javascript" src="assets/redactor/fontfamily.js"></script>
<script type="text/javascript" src="assets/redactor/fullscreen.js"></script>
<script type="text/javascript" src="assets/redactor/fontcolor.js"></script>

<script type="text/javascript" src="assets/redactor/redactor.min.js"></script>
<link rel="stylesheet" href="assets/redactor/css/redactor.css" />
<script type="text/javascript">
	$(document).ready(function(){
            $('#redactor_description_english').redactor({
                    plugins: ['fontsize', 'fontfamily', 'fontcolor'],
                    imageUpload : '<?=site_url()?>fileupdown/image_upload'
            });		
            $('#redactor_description_italian').redactor({
                    plugins: ['fontsize', 'fontfamily', 'fontcolor'],
                    imageUpload : '<?=site_url()?>fileupdown/image_upload'
            });		
            $('#redactor_description_spanish').redactor({
                    plugins: ['fontsize', 'fontfamily', 'fontcolor'],
                    imageUpload : '<?=site_url()?>fileupdown/image_upload'
            });		
            $('#redactor_description_german').redactor({
                    plugins: ['fontsize', 'fontfamily', 'fontcolor'],
                    imageUpload : '<?=site_url()?>fileupdown/image_upload'
            });		
            $('#redactor_description_french').redactor({
                    plugins: ['fontsize', 'fontfamily', 'fontcolor'],
                    imageUpload : '<?=site_url()?>fileupdown/image_upload'
            });		
            $('#redactor_description_russian').redactor({
                    plugins: ['fontsize', 'fontfamily', 'fontcolor'],
                    imageUpload : '<?=site_url()?>fileupdown/image_upload'
            });		
        });
        jQuery(document).ready(function() {
            $("#add_image").click(function(){
                $( "#main_image" ).clone().appendTo("#zettaImage");
            });
            tourType('<?=$tour->type?>');
        });
        function add_time(language){
            $( "#main_time_"+language ).clone().appendTo("#zettaTime_"+language);
        }
        function tourType(tour_type){
            if(tour_type == 'Ticket'){
                $('.hideTourTime').hide();
            }else{
                $('.hideTourTime').show();
            }
        }
</script>

<div style="display: none;">
    
    <div id="main_time_english">
        <div class="row">
            <div class="col-md-12">
                <div class="form-group">
                    <label class="col-md-3">Tour Time</label>
                    <div class="col-md-3">
                                <?php echo form_input($tour_time_english);?>
                    </div>
                </div>
            </div>
        </div>
        <hr>
    </div>
    <div id="main_time_italian">
        <div class="row">
            <div class="col-md-12">
                <div class="form-group">
                    <label class="col-md-3">Tour Time</label>
                    <div class="col-md-3">
                                <?php echo form_input($tour_time_italian);?>
                    </div>
                </div>
            </div>
        </div>
        <hr>
    </div>
    <div id="main_time_spanish">
        <div class="row">
            <div class="col-md-12">
                <div class="form-group">
                    <label class="col-md-3">Tour Time</label>
                    <div class="col-md-3">
                                <?php echo form_input($tour_time_spanish);?>
                    </div>
                </div>
            </div>
        </div>
        <hr>
    </div>
    <div id="main_time_german">
        <div class="row">
            <div class="col-md-12">
                <div class="form-group">
                    <label class="col-md-3">Tour Time</label>
                    <div class="col-md-3">
                                <?php echo form_input($tour_time_german);?>
                    </div>
                </div>
            </div>
        </div>
        <hr>
    </div>
    <div id="main_time_french">
        <div class="row">
            <div class="col-md-12">
                <div class="form-group">
                    <label class="col-md-3">Tour Time</label>
                    <div class="col-md-3">
                                <?php echo form_input($tour_time_french);?>
                    </div>
                </div>
            </div>
        </div>
        <hr>
    </div>
    <div id="main_time_russian">
        <div class="row">
            <div class="col-md-12">
                <div class="form-group">
                    <label class="col-md-3">Tour Time</label>
                    <div class="col-md-3">
                                <?php echo form_input($tour_time_russian);?>
                    </div>
                </div>
            </div>
        </div>
        <hr>
    </div>
    <div id="main_image">
        <div class="row">
            <div class="col-md-12">
                <div class="form-group ">
                    <label class="control-label col-md-3">Tour Image</label>
                    <div class="col-md-9">
                        <div class="fileinput fileinput-new" data-provides="fileinput">
                            <div class="fileinput-new thumbnail" style="width: 200px; height: 200px;">
                                <img src="uploads/extra/logo/200x200.png" alt=""/>
                            </div>
                            <div class="fileinput-preview fileinput-exists thumbnail" data-trigger="fileinput" style="width: 200px; height: 200px;">

                            </div>
                            <div>
                                <span class="btn default btn-file">
                                <span class="fileinput-new">
                                Select image </span>
                                <span class="fileinput-exists">
                                Change </span>
                                <input type="file" name="tour_image[]">
                                </span>
                                <a href="#" class="btn red fileinput-exists" data-dismiss="fileinput">
                                Remove </a>
                            </div>
                        </div>
                        <div class="clearfix margin-top-10">
                            <span class="label label-danger">
                                NOTE! 
                            </span>
                             &nbsp; Please Upload JPG or PNG files only. Maximum file size is 1MB or 1024KB. Upload 200px x 200px image for better view.
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <hr>
    </div>
</div>

<div class="row">    
    <div class="col-md-12 ">
        <!-- BEGIN SAMPLE FORM PORTLET-->
        <div class="portlet light bordered">
            <div class="portlet-title">
                <div class="caption">
                    Edit Tour
                </div>
            </div>
            <div class="portlet-body form">
                <?= form_open_multipart(uri_string(), array('class' => 'form-horizontal')) ?>
                <div class="form-body">
                    <div class="form-group ">
                        <label class="control-label col-md-3">Tour Type</label>
                        <div class="col-md-9">
                            <?=form_dropdown($type_name, $type_value, $type_selected, $dropdown_class.' onchange="tourType($(this).val());"')?>
                        </div>
                    </div>  
                    <div class="form-group ">
                        <label class="control-label col-md-3">English Tour Title</label>
                        <div class="col-md-9">
                            <?php echo form_input($t_english);?>
                        </div>
                    </div>
                    <div class="form-group ">
                        <label class="control-label col-md-3">Italian Tour Title</label>
                        <div class="col-md-9">
                            <?php echo form_input($t_italian);?>
                        </div>
                    </div>
                    <div class="form-group ">
                        <label class="control-label col-md-3">Spanish Tour Title</label>
                        <div class="col-md-9">
                            <?php echo form_input($t_spanish);?>
                        </div>
                    </div>
                    <div class="form-group ">
                        <label class="control-label col-md-3">German Tour Title</label>
                        <div class="col-md-9">
                            <?php echo form_input($t_german);?>
                        </div>
                    </div>
                    <div class="form-group ">
                        <label class="control-label col-md-3">French Tour Title</label>
                        <div class="col-md-9">
                            <?php echo form_input($t_french);?>
                        </div>
                    </div>
                    <div class="form-group ">
                        <label class="control-label col-md-3">Russian Tour Title</label>
                        <div class="col-md-9">
                            <?php echo form_input($t_russian);?>
                        </div>
                    </div>
                    <div class="form-group ">
                        <label class="control-label col-md-3">English Tour Description</label>
                        <div class="col-md-9">
                            <?php echo form_textarea($d_english);?>
                        </div>
                    </div>
                    <div class="form-group ">
                        <label class="control-label col-md-3">Italian Tour Description</label>
                        <div class="col-md-9">
                            <?php echo form_textarea($d_italian);?>
                        </div>
                    </div>
                    <div class="form-group ">
                        <label class="control-label col-md-3">Spanish Tour Description</label>
                        <div class="col-md-9">
                            <?php echo form_textarea($d_spanish);?>
                        </div>
                    </div>
                    <div class="form-group ">
                        <label class="control-label col-md-3">German Tour Description</label>
                        <div class="col-md-9">
                            <?php echo form_textarea($d_german);?>
                        </div>
                    </div>
                    <div class="form-group ">
                        <label class="control-label col-md-3">French Tour Description</label>
                        <div class="col-md-9">
                            <?php echo form_textarea($d_french);?>
                        </div>
                    </div>
                    <div class="form-group ">
                        <label class="control-label col-md-3">Russian Tour Description</label>
                        <div class="col-md-9">
                            <?php echo form_textarea($d_russian);?>
                        </div>
                    </div>                  
                    <div class="form-group">
                            <label class="col-md-3 control-label">Featured</label>
                            <div class="col-md-9">
                                    <?=form_dropdown($featured_name, $featured_value, $featured_selected, $dropdown_class)?>
                            </div>
                    </div>
                    
                    <div class="form-group ">
                        <label class="control-label col-md-3">English Tour Duration</label>
                        <div class="col-md-9">
                            <?php echo form_input($duration_english);?>
                        </div>
                    </div>                    
                    <div class="form-group ">
                        <label class="control-label col-md-3">Italian Tour Duration</label>
                        <div class="col-md-9">
                            <?php echo form_input($duration_italian);?>
                        </div>
                    </div>                    
                    <div class="form-group ">
                        <label class="control-label col-md-3">Spanish Tour Duration</label>
                        <div class="col-md-9">
                            <?php echo form_input($duration_spanish);?>
                        </div>
                    </div>                    
                    <div class="form-group ">
                        <label class="control-label col-md-3">German Tour Duration</label>
                        <div class="col-md-9">
                            <?php echo form_input($duration_german);?>
                        </div>
                    </div>                    
                    <div class="form-group ">
                        <label class="control-label col-md-3">French Tour Duration</label>
                        <div class="col-md-9">
                            <?php echo form_input($duration_french);?>
                        </div>
                    </div>                    
                    <div class="form-group ">
                        <label class="control-label col-md-3">Russian Tour Duration</label>
                        <div class="col-md-9">
                            <?php echo form_input($duration_russian);?>
                        </div>
                    </div>
                    <div class="form-group ">
                        <label class="control-label col-md-3">Tour Capacity</label>
                        <div class="col-md-9">
                            <?php echo form_input($capacity);?>
                        </div>
                    </div>
                    <div class="form-group ">
                        <label class="control-label col-md-3">Price Adult</label>
                        <div class="col-md-9">
                            <?php echo form_input($price_adult);?>
                        </div>
                    </div>
                    <div class="form-group ">
                        <label class="control-label col-md-3">Price Student</label>
                        <div class="col-md-9">
                            <?php echo form_input($price_student);?>
                        </div>
                    </div>
                    <div class="form-group ">
                        <label class="control-label col-md-3">Price Children</label>
                        <div class="col-md-9">
                            <?php echo form_input($price_child);?>
                        </div>
                    </div>
                    
                    <div class="clearfix"></div>
                    
                    
                    <h3 class="font-green"><span class="hideTourTime">English</span> Tour Time</h3>                    
                    <div class="clearfix"></div>
                    <hr>
                    <div id="zettaTime_english">
                        <?php
                            $times = json_decode($tour->tour_time, TRUE);
                            if(!empty($times['english'])){
                                foreach ($times['english'] as $time){                                
                                    $tour_time['name'] = 'tour_time[english][]';
                                    $tour_time['value'] = $time;
                                ?>
                                <div class="row">
                                    <div class="col-md-12">
                                        <div class="form-group">
                                            <label class="col-md-3">Tour Time</label>
                                            <div class="col-md-3">
                                                        <?php echo form_input($tour_time);?>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <hr>
                                <?php
                                }
                            }
                        ?>
                    </div>
                    <div class="form-group">
                        <label class="col-md-3 control-label"></label>
                        <div class="col-md-6">
                            <button onclick="add_time('english');" type="button" class="btn btn-block green">Add <span class="hideTourTime">English</span> Time</button>
                        </div>
                    </div>
                    <div class="clearfix"></div>
                    <div  class="hideTourTime">
                    <h3 class="font-green">Italian Tour Time</h3>                    
                    <div class="clearfix"></div>
                    <hr>
                    <div id="zettaTime_italian">
                        <?php
                            if(!empty($times['italian'])){
                                foreach ($times['italian'] as $time){                                
                                    $tour_time['name'] = 'tour_time[italian][]';
                                    $tour_time['value'] = $time;
                                ?>
                                <div class="row">
                                    <div class="col-md-12">
                                        <div class="form-group">
                                            <label class="col-md-3">Tour Time</label>
                                            <div class="col-md-3">
                                                        <?php echo form_input($tour_time);?>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <hr>
                                <?php
                                }
                            }
                        ?>
                    </div>
                    <div class="form-group">
                        <label class="col-md-3 control-label"></label>
                        <div class="col-md-6">
                            <button onclick="add_time('italian');" type="button" class="btn btn-block green">Add Italian Time</button>
                        </div>
                    </div>
                    <div class="clearfix"></div>
                    <h3 class="font-green">Spanish Tour Time</h3>                    
                    <div class="clearfix"></div>
                    <hr>
                    <div id="zettaTime_spanish">
                        <?php
                            if(!empty($times['spanish'])){
                                foreach ($times['spanish'] as $time){                                
                                    $tour_time['name'] = 'tour_time[spanish][]';
                                    $tour_time['value'] = $time;
                                ?>
                                <div class="row">
                                    <div class="col-md-12">
                                        <div class="form-group">
                                            <label class="col-md-3">Tour Time</label>
                                            <div class="col-md-3">
                                                        <?php echo form_input($tour_time);?>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <hr>
                                <?php
                                }
                            }
                        ?>                    
                    </div>
                    <div class="form-group">
                        <label class="col-md-3 control-label"></label>
                        <div class="col-md-6">
                            <button onclick="add_time('spanish');" type="button" class="btn btn-block green">Add Spanish Time</button>
                        </div>
                    </div>
                    <div class="clearfix"></div>
                    <h3 class="font-green">German Tour Time</h3>                    
                    <div class="clearfix"></div>
                    <hr>
                    <div id="zettaTime_german">
                        <?php
                            if(!empty($times['german'])){
                                foreach ($times['german'] as $time){                                
                                    $tour_time['name'] = 'tour_time[german][]';
                                    $tour_time['value'] = $time;
                                ?>
                                <div class="row">
                                    <div class="col-md-12">
                                        <div class="form-group">
                                            <label class="col-md-3">Tour Time</label>
                                            <div class="col-md-3">
                                                        <?php echo form_input($tour_time);?>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <hr>
                                <?php
                                }
                            }
                        ?>                    
                    </div>
                    <div class="form-group">
                        <label class="col-md-3 control-label"></label>
                        <div class="col-md-6">
                            <button onclick="add_time('german');" type="button" class="btn btn-block green">Add German Time</button>
                        </div>
                    </div>
                    <div class="clearfix"></div>
                    <h3 class="font-green">French Tour Time</h3>                    
                    <div class="clearfix"></div>
                    <hr>
                    <div id="zettaTime_french">
                        <?php
                            if(!empty($times['french'])){
                                foreach ($times['french'] as $time){                                
                                    $tour_time['name'] = 'tour_time[french][]';
                                    $tour_time['value'] = $time;
                                ?>
                                <div class="row">
                                    <div class="col-md-12">
                                        <div class="form-group">
                                            <label class="col-md-3">Tour Time</label>
                                            <div class="col-md-3">
                                                        <?php echo form_input($tour_time);?>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <hr>
                                <?php
                                }
                            }
                        ?>
                    
                    </div>
                    <div class="form-group">
                        <label class="col-md-3 control-label"></label>
                        <div class="col-md-6">
                            <button onclick="add_time('french');" type="button" class="btn btn-block green">Add French Time</button>
                        </div>
                    </div>
                    <div class="clearfix"></div>
                    <h3 class="font-green">Russian Tour Time</h3>                    
                    <div class="clearfix"></div>
                    <hr>
                    <div id="zettaTime_russian">
                        <?php
                            if(!empty($times['russian'])){
                                foreach ($times['russian'] as $time){                                
                                    $tour_time['name'] = 'tour_time[russian][]';
                                    $tour_time['value'] = $time;
                                ?>
                                <div class="row">
                                    <div class="col-md-12">
                                        <div class="form-group">
                                            <label class="col-md-3">Tour Time</label>
                                            <div class="col-md-3">
                                                        <?php echo form_input($tour_time);?>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <hr>
                                <?php
                                }
                            }
                        ?>                    
                    </div>
                    <div class="form-group">
                        <label class="col-md-3 control-label"></label>
                        <div class="col-md-6">
                            <button onclick="add_time('russian');" type="button" class="btn btn-block green">Add Russian Time</button>
                        </div>
                    </div>
                    </div>
                    <div class="clearfix"></div>                    
                    <div class="form-group">
                        <div class="col-md-offset-3 col-md-9">
                            <table class="table table-striped table-bordered table-hover">
                                <thead>
                                    <tr>
                                        <th colspan="2" style="text-align: center;">Tour Images</th>
                                    </tr>
                                    <tr>
                                        <th>Image</th>
                                        <th>Action</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <?php foreach ($tour_images as $image) { ?>
                                        <tr>
                                            <td>
                                                <img alt="" style="max-height: 100px;max-width: 100px;" src="uploads/contents/<?=$image->image?>">
                                            </td>
                                            <td><?= anchor("tour/deleteImage/" . $image->url, 'Delete', array('onclick' => 'if(confirm(\'Are you sure to Delete This Image.\'))return true; return false;', 'class' => 'btn red', 'title' => 'Delete Image')) ?></td>
                                        </tr>
                                    <?php } ?>
                                </tbody>
                            </table>
                        </div>
                    </div>
                    <hr>
                    <div id="zettaImage">
                    
                    </div>
                    <div class="form-group">
                        <label class="col-md-3 control-label"></label>
                        <div class="col-md-6">
                            <button id="add_image" type="button" class="btn btn-block green">Add Image</button>
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


