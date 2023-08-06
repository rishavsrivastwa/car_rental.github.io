<?php include('components/head.inc.php');?>
<?php include('components/navbar.php');?> 

<?php

if (isset($_POST['submit'])) {
    session_start();
            if (isset($_POST['vmodel']) && isset($_POST['vnumber']) && isset($_POST['scapacity'])
                && isset($_POST['carrent'])){
                require_once 'sql.php';

                        $vmodel = mysqli_real_escape_string($conn, $_POST['vmodel']);
                        $vnumber = mysqli_real_escape_string($conn, $_POST['vnumber']);
                        $scapacity = mysqli_real_escape_string($conn, $_POST['scapacity']);
                        $carrent = mysqli_real_escape_string($conn, $_POST['carrent']);
                    
                        if ($carrent && $vnumber && $scapacity && $carrent) {
                            $sql = "insert into addcars(model, vnumber, seat, rent) 
                            values('$vmodel','$vnumber','$scapacity','$carrent')";
   
                            if (mysqli_query($conn, $sql)) {
                                echo "<script>
                                alert('successful!');
                                window.location.replace(\"add_cars.php\");</script>";
                                session_destroy();
                            } else {
                                echo "<script>
                                alert('Data enter by you alreay exist in Database please Sign In');
                                window.location.replace(\"add_cars.php\");</script>";
                                session_destroy();
                            }
                               
                        
                    }        
            }
        }
        ?>


    <div class="bck-image">
        <img  class="bck-img" src="img/bckgrnd.jpeg" alt="">
        <h1>Add Cars</h1>
    </div>
    <form class="col-md-5 rounded form mb-1" method="post" enctype="multipart/form-data">
        <div class="form-group mb-2">
            <label for="vmodel">Vechile Model</label>
            <input type="text" class="form-control mt-1" name="vmodel" id="vmodel" aria-describedby="nameHelp" placeholder="Enter Vechile Model">
          </div>
        <div class="form-group mb-2">
            <label for="vnumber">Vechile Number</label>
            <input type="text" class="form-control mt-1" name="vnumber" id="vnumber" aria-describedby="nameHelp" placeholder="Enter Vechile Number">
          </div>
        <div class="form-group mb-2">
          <label for="scapacity">Seating Capacity</label>
          <input type="text" class="form-control mt-1" name="scapacity" id="scapacity" aria-describedby="emailHelp" placeholder="Enter Seat Capatcity">
        </div>
        <div class="form-group mb-2">
          <label for="carrent">Rent Per Day</label>
          <input type="text" class="form-control mt-1" name="carrent" id="carrent" placeholder="Enter Car Rent">
        </div>
        
        <button type="submit" class="btn btn-outline-info btn-block rounded mt-4" name="submit">Submit</button>
      </form>
      <?php include('components/footer.php');?>
</body>
</html>