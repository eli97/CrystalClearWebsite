<?php

    // (A) SETTINGS - CHANGE TO YOUR OWN !
    error_reporting(E_ALL & ~E_NOTICE);
    define("DB_HOST", "localhost");
    define("DB_NAME", "rystaly5_CrystClearMainDB");
    define("DB_CHARSET", "utf8");
    define("DB_USER", "rystaly5_cbearquiver");
    define("DB_PASSWORD", "SvenThePlant!");

    // (B) GET SERVICES
    function getAllServices()
    {
        // CONNECT TO DATABASE
        try {
          $pdo = new PDO(
            "mysql:host=" . DB_HOST . ";charset=" . DB_CHARSET . ";dbname=" . DB_NAME,
            DB_USER, DB_PASSWORD
          );
        } catch (Exception $ex) { exit($ex->getMessage()); }
        
        $stmt = $pdo->prepare("SELECT * FROM `SERVICE`");
        $stmt->execute();
        $services = $stmt->fetchAll(PDO::FETCH_ASSOC);
        foreach ($services as $s) {
            array_push($result, $s['price']);
            array_push($result, $s['description']);
        }

        $data = [];
        $data['price'] = $result[0];
        $data['description'] = $result[1];
        
        echo json_encode(['results' => $data]);
    }
    
    //~~~~~~~~~~~~~~~~~ GET FUNCTIONS ~~~~~~~~~~~~~~~~~
    //
    function getBasicService()
    {   
        // CONNECT TO DATABASE
        try {
          $pdo = new PDO(
            "mysql:host=" . DB_HOST . ";charset=" . DB_CHARSET . ";dbname=" . DB_NAME,
            DB_USER, DB_PASSWORD
          );
        } catch (Exception $ex) { exit($ex->getMessage()); }
        
        $result = array();
        
        $stmt = $pdo->prepare("SELECT `price`, `description` FROM `SERVICE` WHERE `serviceName` = 'Basic Service'");
        $stmt->execute();
        $services = $stmt->fetchAll(PDO::FETCH_ASSOC);
        foreach ($services as $s) {
            array_push($result, $s['price']);
            array_push($result, $s['description']);
        }
        
        $data = [];
        $data['price'] = $result[0];
        $data['description'] = $result[1];
        
        echo json_encode(['results' => $data]);
    }

    function getChemService()
    {
        // CONNECT TO DATABASE
        try {
          $pdo = new PDO(
            "mysql:host=" . DB_HOST . ";charset=" . DB_CHARSET . ";dbname=" . DB_NAME,
            DB_USER, DB_PASSWORD
          );
        } catch (Exception $ex) { exit($ex->getMessage()); }
        
        $result = array();
        
        $stmt = $pdo->prepare("SELECT `price`, `description` FROM `SERVICE` WHERE `serviceName` = 'Chemical+Baskets'");
        $stmt->execute();
        $services = $stmt->fetchAll(PDO::FETCH_ASSOC);
        foreach ($services as $s) {
            array_push($result, $s['price']);
            array_push($result, $s['description']);
        }
        
        $data = [];
        $data['price'] = $result[0];
        $data['description'] = $result[1];
        
        echo json_encode(['results' => $data]);
    }

    function getFullService()
    {
        // CONNECT TO DATABASE
        try {
          $pdo = new PDO(
            "mysql:host=" . DB_HOST . ";charset=" . DB_CHARSET . ";dbname=" . DB_NAME,
            DB_USER, DB_PASSWORD
          );
        } catch (Exception $ex) { exit($ex->getMessage()); }
        
        $result = array();
        
        $stmt = $pdo->prepare("SELECT `price`, `description` FROM `SERVICE` WHERE `serviceName` = 'Full Service'");
        $stmt->execute();
        $services = $stmt->fetchAll(PDO::FETCH_ASSOC);
        foreach ($services as $s) {
            array_push($result, $s['price']);
            array_push($result, $s['description']);
        }
        
        $data = [];
        $data['price'] = $result[0];
        $data['description'] = $result[1];
        
        echo json_encode(['results' => $data]);
    }
    
    //~~~~~~~~~~~~~~~~~ SET FUNCTIONS ~~~~~~~~~~~~~~~~~
    //
        function setBasicService()
    {   
        // CONNECT TO DATABASE
        try {
          $pdo = new PDO(
            "mysql:host=" . DB_HOST . ";charset=" . DB_CHARSET . ";dbname=" . DB_NAME,
            DB_USER, DB_PASSWORD
          );
        } catch (Exception $ex) { exit($ex->getMessage()); }
        
        $stmt = $pdo->prepare("UPDATE `SERVICE` SET `price`=:new_price, `description`=:new_description WHERE `serviceName` = 'Basic Service'");
        $stmt->bindParam(':new_price', $_POST['var2'], PDO::PARAM_STR);
        $stmt->bindParam(':new_description', $_POST['var3']);
        
        if ($stmt->execute()) {
            echo "OK";
        }
        else
            echo "NG";
    }
   
        function setChemService()
    {
        // CONNECT TO DATABASE
        try {
          $pdo = new PDO(
            "mysql:host=" . DB_HOST . ";charset=" . DB_CHARSET . ";dbname=" . DB_NAME,
            DB_USER, DB_PASSWORD
          );
        } catch (Exception $ex) { exit($ex->getMessage()); }
        
        $stmt = $pdo->prepare("UPDATE `SERVICE` SET `price`=:new_price, `description`=:new_description WHERE `serviceName` = 'Chemical+Baskets'");
        $stmt->bindParam(':new_price', $_POST['var2'], PDO::PARAM_STR);
        $stmt->bindParam(':new_description', $_POST['var3']);
        
        if ($stmt->execute()) {
            echo "OK";
        }
        else
            echo "NG";
    }

    function setFullService()
    {
        // CONNECT TO DATABASE
        try {
          $pdo = new PDO(
            "mysql:host=" . DB_HOST . ";charset=" . DB_CHARSET . ";dbname=" . DB_NAME,
            DB_USER, DB_PASSWORD
          );
        } catch (Exception $ex) { exit($ex->getMessage()); }
        
        $stmt = $pdo->prepare("UPDATE `SERVICE` SET `price`=:new_price, `description`=:new_description WHERE `serviceName` = 'Full Service'");
        $stmt->bindParam(':new_price', $_POST['var2'], PDO::PARAM_STR);
        $stmt->bindParam(':new_description', $_POST['var3']);
        
        if ($stmt->execute()) {
            echo "OK";
        }
        else
            echo "NG";
    }

    $queryCase = $_POST['var1'];

    switch ($queryCase) {
        case "all":
            getAllServices();
            break;
        
        case "getBasic":
            getBasicService();
            break;
        
        case "getChem":
            getChemService();
            break;
        
        case "getFull":
            getFullService();
            break;
        
        case "setbasic":
            setBasicService();
            break;
        
        case "setChem":
            setChemService();
            break;
        
        case "setFull":
            setFullService();
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
