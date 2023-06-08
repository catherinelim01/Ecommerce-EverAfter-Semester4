<!-- <select name="City" required class="mt-20 City">
              <option value="" disabled selected>Town/City *</option> -->
              <option class="option">Town/City *</option>
<?php 
    $sql2="SELECT title, province_id FROM `cities` where province_id = (SELECT province_id from provinces where title = '" . session('selectedTitle') . "') ;";
    $result2= DB::select($sql2);

    if (count($result2) > 0) {
    $response2 = [];
    foreach ($result2 as $row) {
        $dt = new stdClass();
        $dt->title = $row->title;
        $dt->province_id = $row->province_id;
        $response2[] = $dt;
    }
    
    $hasil_json2=json_encode($response2);
    $data2 = json_decode($hasil_json2,true);
    for($i = 0; $i < count($data2); $i++) { ?>
        <option class="option"><?php echo $data2[$i]["title"] ?></option>
<?php }} ?>
<!-- </select> -->