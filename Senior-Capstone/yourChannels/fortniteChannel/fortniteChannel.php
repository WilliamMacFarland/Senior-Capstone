<html>
  <?php
include("../../connectToMatchesDB.inc");
?>
  <style>
    .fortniteHeader {
      padding-left: 2.5%;
      background-color: azure;
      margin-bottom: 10px;
      box-shadow: 5px 10px black;
      display: flex;
      flex-direction: row;
      height: 70px;
      align-items: center;
    }
    .fortniteContent {
      margin-bottom: 3%;
    }

    .fortniteImg {
      width: 150px;
      height: 45px;
    }
  </style>
  <body>
    <div class="fortniteContent">
      <div class="fortniteHeader">
        <img
          src="https://famfonts.com/wp-content/uploads/fortnite-wide.png"
          class="fortniteImg"
        />
        <div class="postButton">
            <form method="post">
                <input type="submit" name="fortnitePostButton" class="button is-info" value="POST A MATCH"/>
            </form>
        </div>
      </div>
      <div class="container is-fluid">
        <div class="notification is-info">
          <div class="matchRequests">
            <?php
            
            function getFromDB() {
                
                $query  = "SELECT * FROM FORTNITE";

                $dbConnection = connectToMatchesDB();
        
                $result = mysqli_query($dbConnection, $query) or die('Query failed: '. mysqli_error($dbConnection));
                
                if ($result->num_rows > 0) {
                  while($row = $result->fetch_assoc()) {
                    echo '<div
                        class="box"
                        id="box"
                        onmouseover="mouseOver(this)"
                        onmouseleave="mouseLeave(this)">' .
                        $row['postID'] . ' <form method="post">
                        <input type="hidden" value="' .
                        $row['matchID'] . '" name="matchID"/>
                        <input type="hidden" value="' .
                        $row['postID'] . '" name="postID"/>
                        <input type="submit" name="fortniteAcceptButton" class="button is-info" value="ACCEPT"/>
                        </form>
                        </div>';
                 }
                } else {
                    echo "No Fornite matches are currently available, post a match! ";
                }
                 mysqli_close($dbConnection);
            }
            getFromDB();
          ?>
          </div>
        </div>
      </div>
    </div>
  </body>
  <script src="fortniteChannel.js"></script>
</html>