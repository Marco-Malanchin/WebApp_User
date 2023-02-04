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
function getProductsTag($data)
{
    $url = 'http://localhost/WebApp_User/food-api/API/product/getArchiveProductsLikeWithTag.php?id=' . $data;

    $json_data = file_get_contents($url);
    if ($json_data != false) {
        $decode_data = json_decode($json_data, $assoc = true);
        $prod_data = $decode_data;
        $prod_arr = array();
        if (!empty($prod_data)) {
            foreach ($prod_data as $prod) {
                $prod_record = array(
                    'ID' => $prod['ID'],
                    'name' => $prod['Nome prodotto'],
                    'Price' => $prod['Prezzo'],
                );
                array_push($prod_arr, $prod_record);
            }
            return $prod_arr;
        } else {
            return -1;
        }
    } else {
        return -1;
    }
}

?>