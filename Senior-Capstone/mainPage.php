<!DOCTYPE html>
<html>
  <head>
    <meta charset="utf-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <title></title>
    <meta name="description" content="" />
    <meta name="viewport" content="width=device-width, initial-scale=1" />
    <link rel="stylesheet" href="mainPage.css" />
    <script type="text/javascript" src="mainPage.js"></script>
    <script type="text/javascript" src="yourChannels.js"></script>
    <script type="text/javascript" src="social.js"></script>
  </head>
    <?php
    include("connectToMatchesDB.inc");
    
        if(array_key_exists('fortnitePostButton', $_POST)) {
            
            $query  = "INSERT INTO FORTNITE(postID) VALUES('1Bar')";
            
            $dbConnection = connectToDB();
        
            $result = mysqli_query($dbConnection, $query) or die('Query failed: '. mysqli_error($dbConnection));
            
            mysqli_close($dbConnection);
        }
        
        if(array_key_exists('callofdutyPostButton', $_POST)) {
            
          $query  = "INSERT INTO COD(postID) VALUES('1Bar')";
          
          $dbConnection = connectToDB();
      
          $result = mysqli_query($dbConnection, $query) or die('Query failed: '. mysqli_error($dbConnection));
          
          mysqli_close($dbConnection);
      }

        if(array_key_exists('acceptButton', $_POST)) {
            
          $matchID = $_POST['matchID'];
          
          $query  = "DELETE FROM FORTNITE WHERE matchID = $matchID";
          
          $dbConnection = connectToDB();
      
          $result = mysqli_query($dbConnection, $query) or die('Query failed: '. mysqli_error($dbConnection));
          
          mysqli_close($dbConnection);
      }
      
    ?>
  <body class="mainPage">
    <nav class="navbar" role="navigation" aria-label="main navigation">
      <div class="navbar-brand">
        <a href="/loginPage/homePage.html">
          <img
            src="https://www.logolynx.com/images/logolynx/1a/1a3e9ec8ecfd3d55c248c25e5f557d46.jpeg"
            width="120"
            height="25"
          />
        </a>
      </div>

      <div id="navbarBasicExample" class="navbar-menu">
        <div class="GNRU">G &nbsp &nbsp N &nbsp &nbsp R &nbsp &nbsp U</div>

        <div class="navbar-end">
          <div class="navbar-item">
            <div class="buttons">
              <a
                class="button is-danger"
                href="../createAccountPage/createAccount.html"
              >
                <strong>GNRU Identity</strong>
              </a>
            </div>
          </div>
        </div>
      </div>
    </nav>
    <div class="tabs is-large">
      <ul>
        <li id="yourChannelsTab">
          <a onclick="loadYourChannels()">Your Channels</a>
        </li>
        <li id="socialTab"><a onclick="loadSocial()">Social</a></li>
      </ul>
    </div>
    <div class="pageContent"></div>
  </body>
</html>
