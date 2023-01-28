<?php
function getTag(){
    $url = 'http://localhost/WebApp_User/food-api/API/tag/getArchiveTag.php';

    $json_data = file_get_contents($url);

    $decode_data = json_decode($json_data, $assoc = true);
    $tag_data = $decode_data;
    if(!empty($tag_data)){
        $tag_arr = array();

        foreach ($tag_data as $tag) {
            $tag_record = array(
                'id' => $tag['id'],
                'name' => $tag['name'],
            );
            array_push($tag_arr, $tag_record);
        }
    
        return $tag_arr;
    }else{
        return -1; 
    }

}
?>