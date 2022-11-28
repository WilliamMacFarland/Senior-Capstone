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
    include("connectToInfoDB.inc");
    echo '<script type="text/javascript">',
        'const confirmMatch = (postID) => {
          
            confirm("You have accepted a match from " + postID + "! Please add them as a friend!");
    };',
     '</script>';

     function getFriendsFromInfoDB() {
      $query  = "SELECT friends FROM INFO WHERE username = '1Bar'";
    
      $dbConnection = connectToInfoDB();
    
      $result = mysqli_query($dbConnection, $query) or die('Query failed: '. mysqli_error($dbConnection));
    
      while ($row=mysqli_fetch_row($result))
        {
          return $row[0];
        }
       mysqli_close($dbConnection);
    }

     if(array_key_exists('addFriendButton', $_POST)) {

      $currentFriends = getFriendsFromInfoDB();

      $newFriend = $_POST['friendName'];

      $allFriends = $newFriend.', '.$currentFriends;
            
      $query  = "UPDATE INFO SET friends = '$allFriends' WHERE username = '1Bar'";
      
      $dbConnection = connectToInfoDB();
  
      $result = mysqli_query($dbConnection, $query) or die('Query failed: '. mysqli_error($dbConnection));
      
      mysqli_close($dbConnection);
  }
    
        if(array_key_exists('fortnitePostButton', $_POST)) {
            
            $query  = "INSERT INTO FORTNITE(postID) VALUES('1Bar')";
            
            $dbConnection = connectToMatchesDB();
        
            $result = mysqli_query($dbConnection, $query) or die('Query failed: '. mysqli_error($dbConnection));
            
            mysqli_close($dbConnection);
        }
        
        if(array_key_exists('callofdutyPostButton', $_POST)) {
            
          $query  = "INSERT INTO COD(postID) VALUES('1Bar')";
          
          $dbConnection = connectToMatchesDB();
      
          $result = mysqli_query($dbConnection, $query) or die('Query failed: '. mysqli_error($dbConnection));
          
          mysqli_close($dbConnection);
      }

        if(array_key_exists('fortniteAcceptButton', $_POST)) {
          $postID = $_POST['postID'];
          echo '<script type="text/javascript">',
        'confirmMatch("'.$postID.'");',
     '</script>';
          
          deleteFromDB('FORTNITE');
      }

        if(array_key_exists('codAcceptButton', $_POST)) {
          $postID = $_POST['postID'];
          echo '<script type="text/javascript">',
        'confirmMatch("'.$postID.'");',
     '</script>';
          deleteFromDB('COD');
      }

      function deleteFromDB($channel) {
        $matchID = $_POST['matchID'];
        
        $query  = "DELETE FROM $channel WHERE matchID = $matchID";
        
        $dbConnection = connectToMatchesDB();
    
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
