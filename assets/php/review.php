<?php 
   $servername = 'localhost';
   $username = 'root';
   $password = '';
   $database = 'crystalclear';
    session_start();
    
    
    try {
        $conn = new PDO("mysql:host=$servername;dbname=$database", $username, $password);
        // set the PDO error mode to exception
        $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
       // echo "Connected successfully";
      } catch(PDOException $e) {
        echo "Connection failed: " . $e->getMessage();
      }

   $json_review = [];

    //update the changes 
    if(isset($_POST['approvalChanges'])){
        echo "im here <br>";
       if(isset($_POST['update'])){
        //set all approval to 0s
        $sql = "UPDATE REVIEW SET approval=0";
        $stmt = $conn->prepare($sql);
        $stmt->execute();
         
        foreach($_POST['update'] as $value){
            $cid = substr($value,0 , strpos($value, ":"));
            $date = substr($value, strpos($value, ":") + 1);
            echo $cid;
            echo "<br>";
            echo $date;
            echo "<br>";
            
            $sql = "UPDATE REVIEW SET approval=1 WHERE cid=$cid AND postDate='".$date."'";
            $stmt = $conn->prepare($sql);
            $stmt->execute();
            
        }
        header('Location: /test/CrystalClearWebsite/reviewPost.php'); 
    }
    }

    $sql = "SELECT * FROM review ORDER BY postDate";
    $stmt = $conn->prepare($sql);
    $stmt->execute();
    //$result = $stmt->fetchAll();
    //var_dump($result);
    while ($row = $stmt->fetch(PDO::FETCH_ASSOC)){
        $data = array( );
        $data['cid']     = $row['cid'];
        $data['cname']   = $row['cname'];
        $data['postDate']= $row['postDate'];
        $data['stars']   = $row['stars'];
        $data['message'] = $row['message'];
        $data['approval']= $row['approval'];
        
        $encode = json_encode($data);
        array_push($json_review,$encode);

    }
   
    echo (json_encode($json_review, JSON_PRETTY_PRINT));
    $conn = null;
?>