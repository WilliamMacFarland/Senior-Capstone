<!DOCTYPE html>
<html>
  <?php
include("../connectToInfoDB.inc");

function getFromInfoDB() {
  $username = $_COOKIE['GNRU_ID'];
  $query  = "SELECT friends FROM INFO WHERE username = '$username'";

  $dbConnection = connectToInfoDB();

  $result = mysqli_query($dbConnection, $query) or die('Query failed: '. mysqli_error($dbConnection));

  while ($row=mysqli_fetch_row($result))
    {
      //extract each element separated by comma and put element below
      $friendsArray = preg_split ("/\,/", $row[0]); 

      foreach ($friendsArray as &$value) {
        echo '<tr> <td> <h5 class="title is-5">'.$value.'</h5> </td> </tr>';
    }
    }

   mysqli_close($dbConnection);
}
?>
  <head>
    <meta charset="utf-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <title></title>
    <meta name="description" content="" />
    <meta name="viewport" content="width=device-width, initial-scale=1" />
    <link rel="stylesheet" href="/social/social.css" />
  </head>
  <body>
    <div class="socialBodyContent">
      <!-- list -->
      <div class="box">
        <div class="title is-1">Friend's List</div>
        <div class="friendsList">
          <table>
            <tr>
              <th><h4 class="title is-4">GNRU ID</h4></th>
            </tr>
            <?php 
            getFromInfoDB();
            ?>
          </table>
        </div>
      </div>
      <!-- search -->
      <div>
        <h1 class="title is-1">Add a Friend</h1>
        <form method="post"> 
        <div class="field is-grouped">
          <p class="control is-expanded">
              <input class="input" type="text" name="friendName" placeholder="Find Friends" />
          </p>
          <p class="control">
                <input type="submit" name="addFriendButton" class="button is-info" value="ADD"/>
          </p>
        </div>
        </form> 
      </div>
    </div>
  </body>
</html>
