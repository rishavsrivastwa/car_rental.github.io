<?php include('components/head.inc.php');?>
<?php include('components/navbar.php');?> 

<?php

if (isset($_POST['signup'])) {
    session_start();
            if (isset($_POST['usertype']) && isset($_POST['fname']) && isset($_POST['lname']) && isset($_POST['email'])
            && isset($_POST['phone']) && isset($_POST['pass']) && isset($_POST['cpass'])) {
                require_once 'sql.php';
                $type = mysqli_real_escape_string($conn, $_POST['usertype']);
                $fname = mysqli_real_escape_string($conn, $_POST['fname']);
                $lname = mysqli_real_escape_string($conn, $_POST['lname']);
                $email = mysqli_real_escape_string($conn, $_POST['email']);
                $phone = mysqli_real_escape_string($conn, $_POST['phone']);
                $pass = mysqli_real_escape_string($conn, $_POST['pass']);
                $cpass = mysqli_real_escape_string($conn, $_POST['cpass']);


                if ($pass == $cpass) {
                    // $pass = crypt($pass,'rakeshmariyaplarrakesh');
                    $sql = "insert into " .$type. "(firstname, lastname, email, phone, password) 
                    values('$fname','$lname','$email','$phone','$pass')";

                    if (mysqli_query($conn, $sql)) {
                        echo "<script>
                        alert('successful!');
                        window.location.replace(\"index.php\");</script>";
                        session_destroy();
                    } else {
                        echo "<script>
                        alert('Data enter by you alreay exist in Database please Sign In');
                        window.location.replace(\"index.php\");</script>";
                        session_destroy();
                    }
                } else {
                    echo "<script>
                        alert(' Password should be same');
                        window.location.replace(\"singin.php\");</script>";
                    session_destroy();
                }
        
            }
        }
        ?>




    <div class="bck-image">
        <img  class="bck-img" src="img/bckgrnd.jpeg" alt="">
        <h1>Registration</h1>
    </div>
    <form class="col-md-5 rounded form mb-1" method="post">
        <div class="seluser form-group mb-3">
            <input class="form-check-input" type="radio" name="usertype" value="customer" required>&nbsp;CUSTOMER
            <input class="form-check-input ml-2"type="radio" name="usertype" value="agency" required>&nbsp;AGENCY
        </div>
        <div class="form-group mb-2">
            <label for="firstname">First Name</label>
            <input type="text" class="form-control mt-1" name="fname" id="firstname" aria-describedby="nameHelp" placeholder="Enter First Name">
          </div>
        <div class="form-group mb-2">
            <label for="lastname">Last Name</label>
            <input type="text" class="form-control mt-1" name="lname" id="lastname" aria-describedby="nameHelp" placeholder="Enter Last Name">
          </div>
        <div class="form-group mb-2">
          <label for="email">Email</label>
          <input type="email" class="form-control mt-1" name="email" id="email" aria-describedby="emailHelp" placeholder="Enter Email">
          <small id="emailHelp" class="form-text text-muted">We'll never share your email with anyone else.</small>
        </div>
        <div class="form-group mb-2">
          <label for="mobile">Phone No</label>
          <input type="text" class="form-control mt-1" name="phone" id="mobile" placeholder="Enter Phone Number">
        </div>
        <div class="form-group mb-2">
          <label for="password">Password</label>
          <input type="password" class="form-control mt-1" name="pass" id="password" placeholder="Enter Password">
        </div>
        <div class="form-group mb-2">
          <label for="cpassword">Confirm Password</label>
          <input type="password" class="form-control mt-1" name="cpass" id="cpassword" placeholder="Enter Password Again">
        </div>
        <button type="submit" class="btn btn-outline-info btn-block rounded mt-4" name="signup">SignUp</button>
      </form>
      <?php include('components/footer.php');?>
</body>
</html>