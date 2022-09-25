<option value=""><?=$this->lang->line('tour_detail_select_time')?></option>
<?php
$times = json_decode($tour->tour_time, TRUE);
if(!empty($times[$language])){
    foreach ($times[$language] as $time){  
?>
        <option value="<?=$time?>"><?=$time?></option>
<?php } } ?>

