<!doctype html>
<html lang="en">
  <head>
    <title>Crud App</title>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
  </head>
  <body>
  <div class="container">
 
 <?php
    $servername="localhost";
    $username="root";
    $password="";
    $dbname="crud";
    $con= new mysqli($servername,$username,$password,$dbname); 
    if ($con->connect_error)
    {
        die("connection failed: " . $conn->connect_error);
    
    }
    $Movie_sql1="SELECT * FROM data";
   $result=$con->query($Movie_sql1);
    //pre_r($result);
   ?>
   
   <div class="row justify-content-center">
     <table class="table">
       <thead>
         <tr>
           <th>Movie Name</th>
           <th colspan="2">Action</th>
           </thead>
           <?php
             while ($row = $result->fetch_assoc()): ?>
               <tr>
                 <td><?php echo $row['MovieName']; ?></td>
                 <td>
                   <a href="index.php?edit=<?php echo $row['ID']; ?>"
                   class="btn btn-info">Edit</a>
                   <a href="index.php?delete=<?php echo $row['ID']; ?>"
                   class="btn btn-danger">Delete</a>
                 </td>
                 </tr>
             <?php endwhile; ?>
           </table>
           </div>
   <?php
    function pre_r( $array ){
      echo '<pre>';
      print_r($array);
      echo '</pre>';
    }
 
 ?>
  <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>
  </body>
</html>