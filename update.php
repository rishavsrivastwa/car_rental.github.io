<?php 
      include('components/head.inc.php');
    //   include('components/navbar.php'); 

      $id = $_GET['id'];
      $vmodel = $_GET['model'];
      $vnumber = $_GET['vnumber'];
      $scapacity = $_GET['seat'];
      $carrent = $_GET['rent'];


if (isset($_POST['submit'])) {
            if (isset($_POST['vmodel']) && isset($_POST['vnumber']) && isset($_POST['scapacity'])
                && isset($_POST['carrent'])){
                require_once 'sql.php';

                        $vmodel = mysqli_real_escape_string($conn, $_POST['vmodel']);
                        $vnumber = mysqli_real_escape_string($conn, $_POST['vnumber']);
                        $scapacity = mysqli_real_escape_string($conn, $_POST['scapacity']);
                        $carrent = mysqli_real_escape_string($conn, $_POST['carrent']);
                    
                        if ($carrent && $vnumber && $scapacity && $carrent) {
                            $sql ="UPDATE addcars SET model='$vmodel',vnumber='$vnumber',seat='$scapacity',rent='$carrent' WHERE id = '$id';";
   
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
        <h1>Update Cars</h1>
    </div>
    <form class="col-md-5 rounded form mb-1" method="post" enctype="multipart/form-data">
        <div class="form-group mb-2">
            <label for="vmodel">Vechile Model</label>
            <input type="text" class="form-control mt-1" value="<?php echo"$vmodel" ?>" name="vmodel" id="vmodel" aria-describedby="nameHelp">
          </div>
        <div class="form-group mb-2">
            <label for="vnumber">Vechile Number</label>
            <input type="text" class="form-control mt-1" value="<?php echo"$vnumber" ?>" name="vnumber" id="vnumber" aria-describedby="nameHelp">
          </div>
        <div class="form-group mb-2">
          <label for="scapacity">Seating Capacity</label>
          <input type="text" class="form-control mt-1" value="<?php echo"$scapacity" ?>" name="scapacity" id="scapacity" aria-describedby="emailHelp">
        </div>
        <div class="form-group mb-2">
          <label for="carrent">Rent Per Day</label>
          <input type="text" class="form-control mt-1" value="<?php echo"$carrent" ?>" name="carrent" id="carrent">
        </div>
        
        <button type="submit" class="btn btn-outline-info btn-block rounded mt-4" name="submit">Update</button>
      </form>
      <?php include('components/footer.php');?>
</body>
</html>