<html>
  <style>
    .callofdutyHeader {
      padding-left: 2.5%;
      background-color: azure;
      margin-bottom: 10px;
      box-shadow: 5px 10px black;
      display: flex;
      flex-direction: row;
      height: 70px;
      align-items: center;
    }
    .callofdutyContent {
      margin-bottom: 3%;
    }

    .callofdutyImg {
      width: 150px;
      height: 45px;
    }
  </style>
  <body>
    <div class="callofdutyContent">
      <div class="callofdutyHeader">
        <img
          src="https://logos-download.com/wp-content/uploads/2018/03/Call_of_Duty_logo_black.png"
          class="callofdutyImg"
        />
        <!-- Call of Duty -->
        <div class="postButton">
            <form method="post">
                <input type="submit" name="callofdutyPostButton" class="button is-info" value="POST A MATCH"/>
            </form>
        </div>
      </div>
      <div class="container is-fluid">
        <div class="notification is-info">
          <div class="matchRequests">
            <?php
            
            function getFromDB() {
                
                $query  = "SELECT * FROM FORTNITE";

                $dbConnection = connectToDB();
        
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
                        <input type="submit" name="acceptButton" class="button is-info" value="ACCEPT"/>
                        </form>
                        </div>';
                 }
                } else {
                    echo "No Call of Duty matches are currently available, post a match! ";
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
  <script src="callofdutyChannel.js"></script>
</html>
