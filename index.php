<?php
header("Content-Type: application/json; charset=UTF-8");
header("Access-Control-Allow-Origin: *");
header("Access-Control-Allow-Methods: GET");
header("Access-Control-Allow-Headers: Origin, X-Requested-With, Content-Type, Accept");
header("Referrer-Policy: no-referrer");

include_once "./Name.php";

$firstNames = [
    "male" =>  ["Kalle", "Mahmud", "Björn", "Jimmy", "Adam", "Bertil", "Cesar", "David", "Emil", "Dan"],
    "female" => ["Åsa", "Sara", "Maria", "Lotta", "Amanda", "Sigrun", "Annika", "Yasmin", "Ulla", "Astrid"]
];

$lastNames = ["Öberg", "Al Hakim", "Ericson", "Björk", "Berglund", "Lundqvist", "Söderberg", "Hedlund", "Lundin", "Nyström"];

$data_array = [];

if (isset($_GET['limit']) && ctype_digit($_GET['limit'])) {
    $limit = $_GET['limit'];
} else {
    $limit = 10;
}

for ($i = 0; $i < $limit; $i++) {
    $name = new Name($firstNames, $lastNames);
    array_push($data_array, $name->toArray());
}

echo json_encode($data_array);
