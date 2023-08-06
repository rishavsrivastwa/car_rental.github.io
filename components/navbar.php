<?php 
  require_once 'session.php';

  // Check if the user is logged in
  if(isUserLoggedIn()){
    $loginToggle = "logout";
    $url = "#";
      if (($_SESSION["type"]) === "customer") {
          $usertype = "Customer";
          $classViewBooked= "d-none";
      } else if(($_SESSION["type"]) === "agency"){
          $usertype = "Agency";
          $classViewBooked= "";
      } 
    }else {
      $usertype = "";
      $loginToggle = "login";
      $url="sigin.php";
      $classViewBooked= "d-none";
  }
?>
<script>
  function btnHandler(){
    var xhr = new XMLHttpRequest();
    xhr.open("GET", "logout.php", true);
    xhr.onreadystatechange = function() {
    if (xhr.readyState === XMLHttpRequest.DONE && xhr.status === 200) {
      // Redirect to the login page or any other appropriate action
      window.location.href = "sigin.php";
    }
  };
  xhr.send();
  }
</script>

<nav class="navbar navbar-expand-lg navbar-light bg-light fixed-top">
  <div class="container">
    <a class="navbar-brand" href="index.php"><img src="img/logo1.png" alt="" /></a>
    <h4 class="navbar-nav mx-auto ml-5 pl-5">
      <?php echo $usertype ?>
    </h4>
    <div class="collapse navbar-collapse justify-content-end" id="navbarNav">
      <ul class="navbar-nav mr-5">
        <li class="nav-item mr-2">
          <a class="nav-link active" aria-current="page" href="index.php">Home</a>
        </li>
        <li class="nav-item mr-2">
          <a class="nav-link" href="#">Features</a>
        </li>
        <li class="nav-item mr-2">
          <a class="nav-link" href="#">About Us</a>
        </li>
        <li class="nav-item mr-2">
          <a class="nav-link login-logo">Contact Us</a>
        </li>
        <li class="nav-item mr-2 <?php echo"$classViewBooked" ?>">
          <a class="nav-link login-logo" href="view_booked.php">Booked Cars</a>
        </li>
      </ul>
      <button  onclick="btnHandler()" type="button" 
      class="btn btn-outline-dark"><?php echo $loginToggle;?></button>
    </div>
  </div>
</nav>