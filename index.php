<?php
include_once "constant/constant.php";
include_once "classes/CSVParser.php";
include_once "classes/UserController.php";
include_once "classes/user.php";
include_once "classes/Error.php";
include_once "classes/Logger.php";

$csvParser =  new CSVParser();
$logger =  new Logger();
$error = new Error();

$fileUri = "database/db.csv";
$loggerUri = "log/log";

// functie maken die fout in bestand set write2errorfile(dataArray)
// controler vast tel nummer toevoegen

$csvParser->setFileUri($fileUri);

// Kijkt dat file bestaat
if($csvParser->checkIfFileExist()){
    // Lees regel CSV bestand
    $row = 1;
    $dataArray = [];
    if (($csvParser->setHandle($csvParser->openFile("r"))) !== FALSE) {
        // Controleert of data is gevonden

        while (($data = $csvParser->lineCSV($csvParser->getHandle())) !== FALSE) {
            if($row == 1){
                $row++;
                continue;
            }
            $num = count($data);
            // Zet regel op het scherm
            echo "<p> $num velden in lijn $row: <br /></p>\n";
            $user = new UserController( new User);
            $user->setFirstName($data[DATA_POS_FN]);
            $user->setLastName($data[DATA_POS_LN]);
            $user->setMobile($data[DATA_POS_MOB]);
            $user->setTelephone($data[DATA_POS_TEL]);

            echo $user->getFirstName()."<br/>";
            echo $user->getLastName()."<br/>";
            echo $user->getMobile()."<br/>";
            echo $user->getTelephone()."<br/>";


            // Check lengte en start met 0
                // check mobile nummers
            if((strlen($data[DATA_POS_MOB]) != MOB_LENGTH) || (substr($data[DATA_POS_MOB], 0, 1) != "0")){
                // Als er een fout is schrijf naar foutbestand
                if(!$logger->checkInFile($data)){
                    $logger->writeInFile($loggerUri, $data);
                    echo "Deze row bevat een fout";
                }
                continue;
            }
                // check tel nummer
            if((strlen($data[DATA_POS_TEL]) != TEL_LENGTH) || (substr($data[DATA_POS_TEL], 0, 1) != "0")){
                if(!$logger->checkInFile($data)){
                    $logger->writeInFile($loggerUri, $data);
                    echo "Deze row bevat een fout";
                }
                continue;
            }
            // Zet nationaal om naar internationaal
            $data[DATA_POS_MOB] = str_replace("0", "0031", $data[DATA_POS_MOB]);

            // Zet in DB
                // Controleert op dubbele informatie
                // Als fout gevonden dan naar foutbestand
            // Controleert op data correcct is
            // zet in fout bestand
            $row++;
        }
        $csvParser->closeFile($csvParser->getHandle());
    }
}else{
    echo "No data found in file!";
}


//if($csvParser->checkIfFileExist($fileUri)){
//
//    $dataArray = $csvParser->csvToArray($fileUri);
//
//    foreach($dataArray as $dataKey => $dataValue){
//        $user =  new User();
//        $error = false;
//        $user->setFirstName($dataValue[0]);
//        $user->setLastName($dataValue[1]);
//        $user->setMobile($dataValue[2]);
//        $user->setTelNumber($dataValue[3]);
//
//        echo  $user->g
//        var_dump($user);
//        if(!$mobileModified = $validator->mobileValidator($user->getMobile())){
//          $error = true;
//        }
//        $user->setMobile($mobileModified);
//       var_dump($user);
//    }
//    var_dump($users->userList);
//}else {
//
//}






// 2. Lees(volgende) regel van CSV

// 3. Data gevonden ja->ga door, nee-> zet info op scherm

// 4. Zet regel op scherm

// 5. Check de lengte met van telefoon nummers en dat ze beginnen met 0

// 6. Data correct ja->ga door, nee->zet in error bestand->herhaal vanaf stap 2

// 7. vervang 0 bij nummers met 0031

// 8. zet in database

// 9. Fout gevonden? nee->herhaal vanaf stap 2, ja->stap 10

// 10. Dubbele gegevens?nee->zet in error bestand->herhaal vanaf stap 2, ja->herhaal vanaf stap 2


