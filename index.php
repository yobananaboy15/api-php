<?php 
   header("Content-Type: application/json; charset=UTF-8");
   header("Access-Control-Allow-Origin: *");
   header("Access-Control-Allow-Methods: GET");
   header("Access-Control-Allow-Headers: Origin, X-Requested-With, Content-Type, Accept");
   header("Referrer-Policy: no-referrer");

    
    $data = file_get_contents("https://api.namnapi.se/v2/names.json");
    $data_array = json_decode($data, true);

    foreach($data_array['names'] as $key => $value){
        $nameSubStr = strtolower(substr($value['firstname'], 0, 2) . substr($value['surname'], 0,3));

        $data_array['names'][$key]['email'] = $nameSubStr . '@example.com';
        $data_array['names'][$key]['age'] = rand(1,100);
        
    }

    // print_r(json_encode($data_array));
    echo json_encode($data_array)

?>


