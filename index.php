<?php
include_once "Source/constant.php";
include_once "Source/CSVParser.php";
include_once "Source/Controllers/UserController.php";
include_once "Source/Models/DbUser.php";
include_once "Source/Models/Logger.php";
include_once "Source/Database/Database.php";

$csvParser =  new CSVParser();
$logger =  new Logger();

$fileUri = "db.csv";
$loggerUri = "Log/Log";

// functie maken die fout in bestand set write2errorfile(dataArray)
// controler vast tel nummer toevoegen

$csvParser->setFileUri($fileUri);

// Kijkt dat file bestaat
if($csvParser->checkIfFileExist()){
    // Lees regel CSV bestand
    $row = 0;
    $dataArray = [];
    if (($csvParser->setHandle($csvParser->openFile("r"))) !== FALSE) {
        // Controleert of data is gevonden

        while (($data = $csvParser->lineCSV($csvParser->getHandle())) !== FALSE) {
            if($row == 0){
                $row++;
                continue;
            }
            $num = count($data);
            // Zet regel op het scherm
            echo "<p> $num velden in lijn $row: <br /></p>\n";
            $user = new UserController( new DbUser( new Database()));
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
                // Als er een fout is schrijf naar foutbestand negeert het als het er al instaat
                if($logger->checkInFile($loggerUri, $data) == false){
                    $logger->writeInFile($loggerUri, $data);
                }else{
                    echo "Deze row staat al in het foutbestand.<br />";
                }
                echo "Deze row bevat een fout.";

                continue;
            }
                // check tel nummer
            if((strlen($data[DATA_POS_TEL]) != TEL_LENGTH) || (substr($data[DATA_POS_TEL], 0, 1) != "0")){
                // Als er een fout is schrijf naar foutbestand negeert het als het er al instaat
                if($logger->checkInFile($loggerUri, $data) == false){
                    $logger->writeInFile($loggerUri, $data);
                }else{
                    echo "Deze row staat al in het foutbestand.<br />";
                }
                echo "Deze row bevat een fout.";

                continue;
            }
            // Zet nationaal om naar internationaal van mobiel
            $data[DATA_POS_MOB] = str_replace("0", "0031", $data[DATA_POS_MOB]);
            // Zet nationaal om naar internationaal van mobiel
            $data[DATA_POS_TEL] = str_replace("0", "0031", $data[DATA_POS_TEL]);
            var_dump($data);

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


// 2. Lees(volgende) regel van CSV

// 3. Data gevonden ja->ga door, nee-> zet info op scherm

// 4. Zet regel op scherm

// 5. Check de lengte met van telefoon nummers en dat ze beginnen met 0

// 6. Data correct ja->ga door, nee->zet in error bestand->herhaal vanaf stap 2

// 7. vervang 0 bij nummers met 0031

// 8. zet in Models

// 9. Fout gevonden? nee->herhaal vanaf stap 2, ja->stap 10

// 10. Dubbele gegevens?nee->zet in error bestand->herhaal vanaf stap 2, ja->herhaal vanaf stap 2


