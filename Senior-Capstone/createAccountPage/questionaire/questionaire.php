<!DOCTYPE html>
<?php
include("../connectToUserDB.inc");
?>
<html lang="en">
  <head>
    <meta charset="UTF-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>Document</title>
    <link rel="stylesheet" href="questionaireStyles.css" />
    <script> 
    //changes button name from start to next to finish
      function buttonChange() {
        document.getElementById("nextBtn").value = "Next";
        if (id === 12) {
          document.getElementById("nextBtn").value = "Finish";
        }
        if (id > 13) {
          document
            .getElementById("nextBtn")
            .onclick= function() {
              //php code here 
              const score = document.getElementById("total").innerHTML;
              document.cookie = "score = " + score;
              document.getElementById("submitButton").click();

              <?php 
                if (array_key_exists('enterInfo', $_POST)) {
                  header("Location: http://www.gnru.site/loginPage/login.php");
                  $score = $_COOKIE['score'];
                  $dataBase = connectToDB();
                  $username = $_COOKIE['temp_ID'];
                  $query = "UPDATE INFO SET score = '$score' WHERE username = '$username'";
                  $result = mysqli_query($dataBase, $query) or die('Query failed: ' . mysqli_error($dataBase));
                  mysql_close($dataBase);
                }
              ?>
            };
        }
      }
    </script>
  </head>
  <body>
    <div class="container">
      <div class="question-container" id="question"><p>Welcome to the GnRU community! Before you go any further we ask that you complete this questionaire. This questionaire is put in place to help find suggested friends through our website. We will not share any of your data or scores with any third parties. Please click on the start button to begin the quiz.</p></div>
      <div class="option-container" id="slide"></div>
      <div class="navigation">
        <input class="next" type="button" id="nextBtn" onclick="buttonChange()" value="Start"/>
      </div>
    </div>
    <div id="totals">
      <p>Total:<span id="total"></span></p>
    </div>
    <script type="text/javascript" src="questioniare.js"></script>
    <form method="post"> 
          <input name="enterInfo" type="submit" id="submitButton"/>
        </form>

  </body>
</html>



