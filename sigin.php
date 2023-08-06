<?php include('components/head.inc.php');?>
<?php include('components/navbar.php');?> 

<?php
        if (isset($_POST['login'])) {
            if (isset($_POST['usertype']) && isset($_POST['email']) && isset($_POST['pass'])) {
                require_once 'sql.php';
                // Start a new or resume an existing session
                require_once 'session.php';
                $type = mysqli_real_escape_string($conn, $_POST['usertype']);
                $email = mysqli_real_escape_string($conn, $_POST['email']);
                $password = mysqli_real_escape_string($conn, $_POST['pass']);
                // $password = crypt($password, 'rakeshmariyaplarrakesh');
                $sql = "select email,password from " . $type . " where email='{$email}'";
                $res =   mysqli_query($conn, $sql);
                if ($res == true) {
                    global $dbmail, $dbpw;
                    while ($row = mysqli_fetch_array($res)) {
                        $dbpw = $row['password'];
                        $dbmail = $row['email'];
                        $_SESSION["type"] = $type;
                    }
                    if ($dbpw === $password) {
                        $_SESSION['logged_in'] = true;
                        if ($type === 'customer') {
                            header("location:index.php");
                        } elseif ($type === 'agency') {
                            header("Location:add_cars.php");
                        }
                    } elseif ($dbpw !== $password && $dbmail === $email) {
                        echo "<script>alert('password is mismatch');</script>";
                    } elseif ($dbpw !== $password && $dbmail !== $email) {
                        echo "<script>alert('credentials not found!, Please SingUp');</script>";
                    }
                }
            }
        }
        ?>

    <div class="bck-image">
        <img  class="bck-img" src="img/bckgrnd.jpeg" alt="">
        <h1>Login</h1>
    </div>
    <form class="col-md-5 rounded form mb-1" method="post">
        <div class="seluser form-group mb-3">
            <input class="form-check-input" type="radio" name="usertype" value="customer" required>&nbsp;CUSTOMER
            <input class="form-check-input ml-2"type="radio" name="usertype" value="agency" required>&nbsp;AGENCY
        </div>
        <div class="form-group mb-2">
          <label for="email">Email</label>
          <input type="email" class="form-control mt-1" name="email" id="email" aria-describedby="emailHelp" placeholder="Enter Email">
        </div>
        <div class="form-group mb-2">
          <label for="mobile">Password</label>
          <input type="password" class="form-control mt-1" name="pass" id="mobile" placeholder="Enter Password">
        </div>
        <button type="submit" name="login" class="btn btn-outline-info btn-block rounded mt-4">SignIn</button>

        <div class="form-group">
        <div id="emailHelp" class="form-text text-muted mt-4">Account?</div>
        <a class="text-decoration-none" href="signup.php"><button type="button" href="signup.php" 
        class="btn btn-outline-info  rounded">Create Account</button></a>
        </div>
        
      </form>
      <?php include('components/footer.php');?>
</body>
</html>