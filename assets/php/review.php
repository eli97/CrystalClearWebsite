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
    //write review
    
    if(isset($_POST['writtenReview'])){
        if(isset($_POST['rating']) && isset($_POST['message']) != null && isset($_POST['clientReview'])){
            $value = $_POST['rating'];
            
            $review = $_POST['message'];
            $date = date("Y-m-d");
            echo "Today is";
            echo $date; 
            echo "<br>";

            echo "Stars:";
            echo $value; 
            echo "<br>";

            echo "review:";
            echo $review; 
            echo "<br>";
            
            $person = $_POST['clientReview'];
            $name = substr($person,0 , strpos($person, ":"));
            $cid = substr($person, strpos($person, ":") + 1);
            echo "name:";
            echo $name; 
            echo "<br>";

            echo "cid:";
            echo $cid; 
            echo "<br>";
            $sql = "INSERT INTO review (cid, cname, postDate, stars, message, approval)
                    VALUES (?,?,?,?,?,?)";
            $stmt = $conn->prepare($sql);
            $stmt->execute([$cid, $name, $date, $value, $review, 0]);
            header('Location: /CrystalClearWebsite/review.html');
        
        }
    }
    //Delete Review
    if(isset($_GET['delete'])){
        $value = $_GET['delete'];
        $cid = substr($value,0 , strpos($value, ":"));
        $date = substr($value, strpos($value, ":") + 1);
        echo $cid;
        echo "<br>";
        echo $date;
        echo "<br>";
        
        $sql = "DELETE FROM review WHERE cid=$cid AND approval=0 AND postDate='".$date."'";
        $stmt = $conn->prepare($sql);
        $stmt->execute();
        header('Location: /CrystalClearWebsite/reviewPost.html'); 
    }
    //update the changes 
    if(isset($_POST['approvalChanges'])){
        if(isset($_POST['update'])){
            //set all approval to 0s
            $sql = "UPDATE review SET approval=0";
            $stmt = $conn->prepare($sql);
            $stmt->execute();
         
            foreach($_POST['update'] as $value){
                $cid = substr($value,0 , strpos($value, ":"));
                $date = substr($value, strpos($value, ":") + 1);
                echo $cid;
                echo "<br>";
                echo $date;
                echo "<br>";
            
                $sql = "UPDATE review SET approval=1 WHERE cid=$cid AND postDate='".$date."'";
                $stmt = $conn->prepare($sql);
                $stmt->execute();
                
            }
    
        header('Location: /CrystalClearWebsite/reviewPost.html'); 
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