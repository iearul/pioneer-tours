<option value="">Select Time</option>
<?php
$times = json_decode($tour->tour_time, TRUE);
if(!empty($times[$language])){
    foreach ($times[$language] as $time){  
?>
        <option value="<?=$time?>"><?=$time?></option>
<?php } } ?>