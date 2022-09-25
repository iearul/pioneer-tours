<?php
        /**
         * 
         * @copyright	Copyright (c) 2017 Zettabyte Technologies.
         * @Created     19/03/2017
         * @version 	1.0.0
         * @link	http://zettatech.io/
         * 
	 */
?>    
<script type="text/javascript" src="assets/redactor/fontsize.js"></script>
<script type="text/javascript" src="assets/redactor/fontfamily.js"></script>
<script type="text/javascript" src="assets/redactor/fullscreen.js"></script>
<script type="text/javascript" src="assets/redactor/fontcolor.js"></script>

<script type="text/javascript" src="assets/redactor/redactor.min.js"></script>
<link rel="stylesheet" href="assets/redactor/css/redactor.css" />
<script type="text/javascript">
	$(document).ready(function(){
            $('#redactor_content_english').redactor({
                    plugins: ['fontsize', 'fontfamily', 'fontcolor'],
                    imageUpload : '<?=site_url()?>fileupdown/image_upload'
            });		
            $('#redactor_content_italian').redactor({
                    plugins: ['fontsize', 'fontfamily', 'fontcolor'],
                    imageUpload : '<?=site_url()?>fileupdown/image_upload'
            });		
            $('#redactor_content_spanish').redactor({
                    plugins: ['fontsize', 'fontfamily', 'fontcolor'],
                    imageUpload : '<?=site_url()?>fileupdown/image_upload'
            });		
            $('#redactor_content_german').redactor({
                    plugins: ['fontsize', 'fontfamily', 'fontcolor'],
                    imageUpload : '<?=site_url()?>fileupdown/image_upload'
            });		
            $('#redactor_content_french').redactor({
                    plugins: ['fontsize', 'fontfamily', 'fontcolor'],
                    imageUpload : '<?=site_url()?>fileupdown/image_upload'
            });		
            $('#redactor_content_russian').redactor({
                    plugins: ['fontsize', 'fontfamily', 'fontcolor'],
                    imageUpload : '<?=site_url()?>fileupdown/image_upload'
            });		
        });
</script>


<div class="row">

    <div class="col-md-12 ">
        <div class="portlet light bordered">
            <div class="portlet-title">
                <div class="caption">
                    Terms and Conditions
                </div>
            </div>
            <div class="portlet-body form">
                
                <ul class="nav nav-tabs">
                    <li class="<?=($Language == 'english' ? 'active' : '')?>">
                        <a href="#tab_english" data-toggle="tab"> English </a>
                    </li>
                    <li class="<?=($Language == 'italian' ? 'active' : '')?>">
                        <a href="#tab_italian" data-toggle="tab"> Italian </a>
                    </li>
                    <li class="<?=($Language == 'spanish' ? 'active' : '')?>">
                        <a href="#tab_spanish" data-toggle="tab"> Spanish </a>
                    </li>
                    <li class="<?=($Language == 'german' ? 'active' : '')?>">
                        <a href="#tab_german" data-toggle="tab"> German </a>
                    </li>
                    <li class="<?=($Language == 'french' ? 'active' : '')?>">
                        <a href="#tab_french" data-toggle="tab"> French </a>
                    </li>
                    <li class="<?=($Language == 'russian' ? 'active' : '')?>">
                        <a href="#tab_russian" data-toggle="tab"> Russian </a>
                    </li>
                </ul>
                <div class="tab-content">
                    <div class="tab-pane fade <?=($Language == 'english' ? 'active in' : '')?>" id="tab_english">
                        <?=form_open_multipart('terms_and_conditions/edit/english', array('class' => 'form-horizontal'))?>
                            <div class="form-body">
                                <div class="form-group">
                                        <div class="col-md-12">
                                            <textarea name="terms_and_conditions_english"  id="redactor_content_english" class="form-control"><?=$terms_and_conditions['english']?></textarea>
                                        </div>
                                </div>
                            </div>
                            <div class="form-actions">
                                <div class="row">
                                    <div class="col-md-offset-3 col-md-9">
                                        <button type="submit" name="submit" value="avatar" class="btn blue">Confirm</button>
                                        <button type="reset" class="btn default">Cancel</button>
                                    </div>
                                </div>
                            </div>
                        <?=form_close()?>
                    </div>
                    <div class="tab-pane fade <?=($Language == 'italian' ? 'active in' : '')?>" id="tab_italian">
                        <?=form_open_multipart('terms_and_conditions/edit/italian', array('class' => 'form-horizontal'))?>
                            <div class="form-body">
                                <div class="form-group">
                                        <div class="col-md-12">
                                            <textarea name="terms_and_conditions_italian"  id="redactor_content_italian" class="form-control"><?=$terms_and_conditions['italian']?></textarea>
                                        </div>
                                </div>
                            </div>
                            <div class="form-actions">
                                <div class="row">
                                    <div class="col-md-offset-3 col-md-9">
                                        <button type="submit" name="submit" value="avatar" class="btn blue">Confirm</button>
                                        <button type="reset" class="btn default">Cancel</button>
                                    </div>
                                </div>
                            </div>
                        <?=form_close()?>
                    </div>
                    <div class="tab-pane fade <?=($Language == 'spanish' ? 'active in' : '')?>" id="tab_spanish">
                        <?=form_open_multipart('terms_and_conditions/edit/spanish', array('class' => 'form-horizontal'))?>
                            <div class="form-body">
                                <div class="form-group">
                                        <div class="col-md-12">
                                            <textarea name="terms_and_conditions_spanish"  id="redactor_content_spanish" class="form-control"><?=$terms_and_conditions['spanish']?></textarea>
                                        </div>
                                </div>
                            </div>
                            <div class="form-actions">
                                <div class="row">
                                    <div class="col-md-offset-3 col-md-9">
                                        <button type="submit" name="submit" value="avatar" class="btn blue">Confirm</button>
                                        <button type="reset" class="btn default">Cancel</button>
                                    </div>
                                </div>
                            </div>
                        <?=form_close()?>
                    </div>
                    <div class="tab-pane fade <?=($Language == 'german' ? 'active in' : '')?>" id="tab_german">
                        <?=form_open_multipart('terms_and_conditions/edit/german', array('class' => 'form-horizontal'))?>
                            <div class="form-body">
                                <div class="form-group">
                                        <div class="col-md-12">
                                            <textarea name="terms_and_conditions_german"  id="redactor_content_german" class="form-control"><?=$terms_and_conditions['german']?></textarea>
                                        </div>
                                </div>
                            </div>
                            <div class="form-actions">
                                <div class="row">
                                    <div class="col-md-offset-3 col-md-9">
                                        <button type="submit" name="submit" value="avatar" class="btn blue">Confirm</button>
                                        <button type="reset" class="btn default">Cancel</button>
                                    </div>
                                </div>
                            </div>
                        <?=form_close()?>
                    </div>
                    <div class="tab-pane fade <?=($Language == 'french' ? 'active in' : '')?>" id="tab_french">
                        <?=form_open_multipart('terms_and_conditions/edit/french', array('class' => 'form-horizontal'))?>
                            <div class="form-body">
                                <div class="form-group">
                                        <div class="col-md-12">
                                            <textarea name="terms_and_conditions_french"  id="redactor_content_french" class="form-control"><?=$terms_and_conditions['french']?></textarea>
                                        </div>
                                </div>
                            </div>
                            <div class="form-actions">
                                <div class="row">
                                    <div class="col-md-offset-3 col-md-9">
                                        <button type="submit" name="submit" value="avatar" class="btn blue">Confirm</button>
                                        <button type="reset" class="btn default">Cancel</button>
                                    </div>
                                </div>
                            </div>
                        <?=form_close()?>
                    </div>
                    <div class="tab-pane fade <?=($Language == 'russian' ? 'active in' : '')?>" id="tab_russian">
                        <?=form_open_multipart('terms_and_conditions/edit/russian', array('class' => 'form-horizontal'))?>
                            <div class="form-body">
                                <div class="form-group">
                                        <div class="col-md-12">
                                            <textarea name="terms_and_conditions_russian"  id="redactor_content_russian" class="form-control"><?=$terms_and_conditions['russian']?></textarea>
                                        </div>
                                </div>
                            </div>
                            <div class="form-actions">
                                <div class="row">
                                    <div class="col-md-offset-3 col-md-9">
                                        <button type="submit" name="submit" value="avatar" class="btn blue">Confirm</button>
                                        <button type="reset" class="btn default">Cancel</button>
                                    </div>
                                </div>
                            </div>
                        <?=form_close()?>
                    </div>
                </div>
                
            </div>
        </div>
    </div>
</div>
<script type="text/javascript" src="assets/global/plugins/bootstrap-fileinput/bootstrap-fileinput.js"></script>