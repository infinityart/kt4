<?php
include_once "classe/user.php";
$dataArray = array_map('str_getcsv', file('database/db.csv'));
unset($dataArray[0]);
var_dump($dataArray);
$user =  new User();
$user->save($dataArray);


echo var_dump($user);


die;
$error = [];
$dataArray = array_map('str_getcsv', file('database/db.csv'));
unset($dataArray[0]);
$i = 0;
var_dump($dataArray);
echo "<hr>";
foreach($dataArray as $dataKey => $dataValue){
    $search = $dataValue[2];
    unset($dataArray[$dataKey]);
    $pls = in_array($search, $dataValue);
var_dump($pls);



    if(strlen($dataValue[2]) !== 10){
        $mobileValue = $dataValue[2];
        $error[$i]["mobiel"] = $mobileValue;
        $i++;
    }
    $replace = str_replace("06", "00316", $dataValue[2]);
    $gg = array_replace($dataValue,[2 => $replace]);
}
//var_dump($error);

//var_dump($dataArray);
// De file inlezen

// Elke regel 1 voor 1 lezen


//TODO input nakijken

    //TODO geen dubbel ganger

    //  mobiel moet 10 cijfers bevatten & 00316 bij zetten

    //TODO vaste nummer 011 vervangen door 003111

    //TODO de fouten(dubbel gangers,..) in bestand zetten

