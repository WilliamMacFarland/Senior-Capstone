<!DOCTYPE html>
<html>
  <head>
    <meta charset="utf-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <title></title>
    <meta name="description" content="" />
    <meta name="viewport" content="width=device-width, initial-scale=1" />
    <link rel="stylesheet" href="styles.css" />
  </head>
  <body>
    <div class="bodyContent">
      <article class="tile is-child notification is-info">
        <div class="GNRUGeneric">
          G &nbsp &nbsp N &nbsp &nbsp R &nbsp &nbsp U
        </div>
        <p class="subtitle">Please enter your GNRU username and password</p>
      </article>
      <div class="login">
        <form method="post">
          <div class="formInputs">
            <label for="username" class="label">GNRU Identity: </label>
            <div class="control">
              <input
                type="text"
                id="password"
                placeholder="Enter Username"
                name="username"
                required
                class="input is-focused"
              />
            </div>
          </div>

          <div class="formInputs">
            <label for="password" class="label">Password: </label>
            <div class="control">
              <input
                type="password"
                id="password"
                placeholder="Enter Password"
                name="password"
                required
                class="input is-focused"
              />
            </div>
          </div>
          <div class="signInButton">
            <a href="../mainPage.html">
              <button class="button is-info is-outlined" name="signInButton">Sign In</button>
            </a>
          </div>
        </form>

        <?php 
          include("../connectToInfoDB.inc");
        
          if(array_key_exists('signInButton', $_POST)) {  
            
            $username = $_POST['username'];
            $password = $_POST['password'];
            
            $query  = "SELECT COUNT(*) FROM INFO WHERE username = '$username' and password = '$password'";
            
            $dbConnection = connectToInfoDB();
   
            $result = mysqli_query($dbConnection, $query) or die('Query failed: '. mysqli_error($dbConnection));
            
            $row = $result->fetch_assoc();
            
            if ($row['COUNT(*)'] == 0)  {
              echo '<script type="text/javascript">',
        'const alertMessage = () => {
          
            alert("The credentials you have entered were not found in our database.");
    }; alertMessage();',
     '</script>';

            } else {
              header("Location: http://www.gnru.site/mainPage.php");
            }
            
            mysqli_close($dbConnection);
          }
        ?>

        <div>Don't have an account?</div>
        <a href="../createAccountPage/createAccount.html">
          <button class="button is-info">Create an Account</button>
        </a>
      </div>
    </div>
    <footer class="footer">
      <div class="content has-text-centered">
        <p>
          <strong>GNRU</strong> by
          <a href="https://jgthms.com">William, Eli, Ismail & Paddy</a>. The
          source code is licensed
          <a href="http://opensource.org/licenses/mit-license.php"
            >Creighton University</a
          >. The website content is licensed
          <a href="http://creativecommons.org/licenses/by-nc-sa/4.0/"
            >CC BY NC SA 4.0</a
          >.
        </p>
      </div>
    </footer>
  </body>
</html>
