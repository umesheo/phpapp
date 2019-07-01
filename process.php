<?php

   session_start();
   
   $servername="localhost";
   $username="root";
   $password="";
   $dbname="crud";
   
   $con= new mysqli($servername,$username,$password,$dbname); 
   if ($con->connect_error)
   {
       die("connection failed: " . $conn->connect_error);
   
   }
   $MovieName = '';
   $update = false;
   $ID = 0;
  

    if (isset($_POST['save'])){
        $MovieName = $_POST['MovieName'];
        $Movie_sql="INSERT INTO data (MovieName) VALUES ('$MovieName')";
        $result_movie=$con->query($Movie_sql);

        $_SESSION['message'] = " Movie Record has been saved!";
        $_SESSION['msg_type'] = "success";

        header("location: index.php");
    }

   if (isset($_GET['delete'])){
       $ID = $_GET['delete'];
       $DelMovie_sql="DELETE FROM data WHERE ID=$ID";
        $del_movie=$con->query($DelMovie_sql);

        $_SESSION['message'] = " Movie Record has been deleted";
        $_SESSION['msg_type'] = "danger";

        header("location: index.php");

   }

   if (isset($_GET['edit'])){
       $ID = $_GET['edit'];
       $update = true;
       $EDITMovie_sql="SELECT * FROM data WHERE ID=$ID";
        $result=$con->query($EDITMovie_sql);
        if (count($result)==1){
            $row =$result->fetch_array();
            $MovieName = $row ['MovieName'];
        }

   }

   if (isset($_POST['update'])){
       $ID = $_POST['ID'];
       $MovieName = $_POST['MovieName'];
       $updateMovie_sql="UPDATE data SET MovieName='$MovieName' WHERE ID=$ID";
        $result=$con->query($updateMovie_sql);


   }