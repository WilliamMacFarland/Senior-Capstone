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
      $username = $_COOKIE['GNRU_ID'];
      $query  = "SELECT friends FROM INFO WHERE username = '$username'";
    
      $dbConnection = connectToInfoDB();
    
      $result = mysqli_query($dbConnection, $query) or die('Query failed: '. mysqli_error($dbConnection));
    
      while ($row=mysqli_fetch_row($result))
        {
          return $row[0];
        }
       mysqli_close($dbConnection);
    }

    function checkFriendExists($newFriend) {
      $query  = "SELECT COUNT(*) FROM INFO WHERE username = '$newFriend'";
            
            $dbConnection = connectToInfoDB();
   
            $result = mysqli_query($dbConnection, $query) or die('Query failed: '. mysqli_error($dbConnection));
            
            $row = $result->fetch_assoc();
            
            if ($row['COUNT(*)'] == 0)  {
              echo '<script type="text/javascript">',
        'const alertMessage = () => {
          
            alert("The GNRU Identity you have entered was not found in our database.");
    }; alertMessage();',
     '</script>';
     return false;

            } else {
              return true;
            }
            
            mysqli_close($dbConnection);
    }

     if(array_key_exists('addFriendButton', $_POST)) {

      $currentFriends = getFriendsFromInfoDB();

      $newFriend = $_POST['friendName'];

      if (checkFriendExists($newFriend)) {
        $allFriends = $newFriend.', '.$currentFriends;
        $username = $_COOKIE['GNRU_ID'];
            
      $query2  = "UPDATE INFO SET friends = '$allFriends' WHERE username = '$username'";
      
      $dbConnection = connectToInfoDB();
  
      $result = mysqli_query($dbConnection, $query2) or die('Query failed: '. mysqli_error($dbConnection));
      
      }

      mysqli_close($dbConnection);

  }
    
        if(array_key_exists('fortnitePostButton', $_POST)) {

          $username = $_COOKIE['GNRU_ID'];
            
            $query  = "INSERT INTO FORTNITE(postID) VALUES('$username')";
            
            $dbConnection = connectToMatchesDB();
        
            $result = mysqli_query($dbConnection, $query) or die('Query failed: '. mysqli_error($dbConnection));
            
            mysqli_close($dbConnection);
        }
        
        if(array_key_exists('callofdutyPostButton', $_POST)) {
          $username = $_COOKIE['GNRU_ID'];
            
          $query  = "INSERT INTO COD(postID) VALUES('$username')";
          
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
              >
                <strong><?php echo "Welcome back, ".$_COOKIE['GNRU_ID']."!"?></strong>
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
