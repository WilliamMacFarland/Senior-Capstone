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

        <p>Thank you <?php print($_POST['username']); ?> for registering for gnru.com</p>

            <?php 
            
            function insertDataToDB(){    
                $dataBase = connectToDB();
                $q1 = "INSERT INTO info(username, password, dob, score, email, channels, friends)";
                $q2 = "VALUES('";
                $q3 = mysqli_real_escape_string($dataBase, $_POST['username'])."','";
                $q4 = mysqli_real_escape_string($dataBase, $_POST['password'])."','";
                $q5 = mysqli_real_escape_string($dataBase, $_POST['dob'])."','";
                $q6 = mysqli_real_escape_string($dataBase, $_POST['score'])."','";
                $q7 = mysqli_real_escape_string($dataBase, $_POST['email'])."','";
                $q8 = mysqli_real_escape_string($dataBase, $_POST['channels'])."','";
                $q9 = mysqli_real_escape_string($dataBase, $_POST['friends']);
                $q10 = "');";
                $query1 = $q1.$q2.$q3.$q4.$q5.$q6.$q7.$q8.$q9.$q10;
                $result1 = mysqli_query($dataBase, $query1) or die('Query failed: ' . mysqli_error($dataBase));

            mysql_close($dataBase);
            }
            insertDataToDB();
            ?>

    </body>
</html>