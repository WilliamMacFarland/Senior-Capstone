<!DOCTYPE html>
<?php
include("connectToDB.inc");
?>
<html>
   <head>
      <meta charset="utf-8">
      <title>Thank you for registering!</title>
   </head>

   <body>

        <p>Thank you <?php print($_POST['firstName']); ?> for registering for gnru.com</p>

            <?php 
            
            function insertDataToDB(){    
                $dataBase = connectToDB();
                $q1 = "INSERT INTO userInfo(FirstName,LastName,Age,Username,Password)";
                $q2 = "VALUES('";
                $q3 = mysqli_real_escape_string($dataBase, $_POST['FirstName'])."','";
                $q4 = mysqli_real_escape_string($dataBase, $_POST['LastName'])."','";
                $q5 = mysqli_real_escape_string($dataBase, $_POST['Age'])."','";
                $q6 = mysqli_real_escape_string($dataBase, $_POST['Username']);
                $q7 = mysqli_real_escape_string($dataBase, $_POST['Password']);
                $q8 = "');";
                $query1 = $q1.$q2.$q3.$q4.$q5.$q6.$q7.$q8;
                $result1 = mysqli_query($dataBase, $query1) or die('Query failed: ' . mysqli_error($dataBase));

            mysql_close($dataBase);
            }
            insertDataToDB();
            ?>

    </body>
</html>