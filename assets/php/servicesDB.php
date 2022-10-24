<?php

    //~~~~~~~~~~~~~~~~~ DATABSE SETTINGS ~~~~~~~~~~~~~~~~~
    //
    error_reporting(E_ALL & ~E_NOTICE);
    define("DB_HOST", "localhost");
    define("DB_NAME", "rystaly5_CrystClearMainDB");
    define("DB_CHARSET", "utf8");
    define("DB_USER", "rystaly5_cbearquiver");
    define("DB_PASSWORD", "SvenThePlant!");

    //~~~~~~~~~~~~~~~~~ GET FUNCTIONS ~~~~~~~~~~~~~~~~~
    //
    function getAllServices()
    {
        // CONNECT TO DATABASE
        try {
          $pdo = new PDO(
            "mysql:host=" . DB_HOST . ";charset=" . DB_CHARSET . ";dbname=" . DB_NAME,
            DB_USER, DB_PASSWORD
          );
        } catch (Exception $ex) { exit($ex->getMessage()); }
        
        $data = [];
        $dataCtr = 0;

        $stmt = $pdo->prepare("SELECT * FROM `SERVICE`");
        $stmt->execute();
        $services = $stmt->fetchAll(PDO::FETCH_ASSOC);
        foreach ($services as $service) {

            $result = array();

            $result += array('serviceName' => $service['serviceName']);
            $result += array('servicePrice' => $service['price']);
            $result += array('serviceDescription' => $service['description']);
            $result += array('SERVICE_ID' => $service['SERVICE_ID']);

            $data['Service' . $dataCtr] = $result;
            $dataCtr++;
        }
        $data['length'] = $dataCtr;

        echo json_encode(['results' => $data]);
    }
    
    //~~~~~~~~~~~~~~~~~ SET FUNCTIONS ~~~~~~~~~~~~~~~~~
    //
    function setServiceByID()
    {
        // CONNECT TO DATABASE
        try {
          $pdo = new PDO(
            "mysql:host=" . DB_HOST . ";charset=" . DB_CHARSET . ";dbname=" . DB_NAME,
            DB_USER, DB_PASSWORD
          );
        } catch (Exception $ex) { exit($ex->getMessage()); }
        
        $stmt = $pdo->prepare("UPDATE `SERVICE` SET `price`=:new_price, `description`=:new_description, `serviceName`=:new_name WHERE `SERVICE_ID` =:ID");
        $stmt->bindParam(':new_price', $_POST['var2'], PDO::PARAM_STR);
        $stmt->bindParam(':new_description', $_POST['var3']);
        $stmt->bindParam(':new_name', $_POST['var4']);
        $stmt->bindParam(':ID', $_POST['var5'], PDO::PARAM_STR);
        
        if ($stmt->execute()) {
            echo "OK";
        }
        else
            echo "NG";
    }

    function addNewService()
    {
      // CONNECT TO DATABASE
      try {
        $pdo = new PDO(
          "mysql:host=" . DB_HOST . ";charset=" . DB_CHARSET . ";dbname=" . DB_NAME,
          DB_USER, DB_PASSWORD
        );
      } catch (Exception $ex) { exit($ex->getMessage()); }

      $stmt = $pdo->prepare("INSERT INTO `SERVICE` (`price`, `description`, `serviceName`) VALUES ('', '', '')");
      if ($stmt->execute()) {
          echo "OK";
      }
      else
          echo "NG";
    }

    $queryCase = $_POST['var1'];

    switch ($queryCase) {

        case "getAllServices":
          getAllServices();
          break;

        case "setServiceByID":
          setServiceByID();
          break;

        case "addNewService":
          addNewService();
          break;  
        
        default:
            echo "None selected.";
    }
    
    
    // (C) CLOSE DATABASE CONNECTION
    $pdo = null;
    $stmt = null;

//DEFAULTS
//BASIC: 100 At $100, your pool will have all of the chemicals it needs. We check for chlorine levels, PH, salinity (for salt pools), total alkalinity, and calcium hardness. Additionally, we clean out your skimmer basket, pump basket, and pool sweep bags if you have them. Add a filter wash at any time for $40.
//CHEM: 115 At $115, the basic service includes everything from chemical + baskets and adds some additional cleaning services. We will brush the walls and steps of your pool and spa, and throw in a free filter wash as well.
//FULL: 135 Starting at $135, this service includes everything from the Basic Service as well as Chemical + Baskets Service, 3 free filter washes, vacuuming, and debris removal. Please contact me for an estimate regarding full service.

?>
