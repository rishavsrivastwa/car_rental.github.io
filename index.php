<?php 
  include('components/head.inc.php');
  include('components/navbar.php');
  require_once 'session.php';

  // Check if the user is logged in
  if(isUserLoggedIn()){
      if (($_SESSION["type"]) === "customer") {
          $classNameHidden = '';
          $classNameEditBtn = 'd-none';
          $disableClassName = '';
      }else if(($_SESSION["type"]) === "agency"){
          $disableClassName = 'disabled';
          $classNameHidden = 'd-none';
          $classNameEditBtn = '';
      } else {
          $url = 'sigin.php';
          $classNameEditBtn = 'd-none';
          $disableClassName = '';
      }
  }else {
    $usertype = "";
    $classNameEditBtn = 'd-none';
    $disableClassName = '';
  }
  ?>

<script>
  // function to validate date input
    function validateDateInput() {
    const dateInput = document.getElementById("dateInput");
    const currentDate = new Date().toISOString().split("T")[0]; 
    dateInput.min = currentDate; 
  }
  document.addEventListener("DOMContentLoaded", validateDateInput);


</script>

    <header class="page-header gradient">
      <div class="container pt-3">
        <div class="row align-items-center justify-content-center">
          <div class="col-md-5">
            <h2 class="font-weight-bold">Welcome to Car Rental</h2>

            <p class="font-weight-bold">
              "Unlock Your Journey: Discover Freedom on Wheels with our Premier Car Rental Service"
            </p>

            <!-- <button type="button" class="btn btn-outline-success btn-lg">
              Read more
            </button>
            <button type="button" class="btn btn-outline-warning btn-lg">
              Play video
            </button> -->
          </div>
          <div class="col-md-5">
            <img class="w-100 mt-5 pt-4 pl-5 ml-5 rounded-pill"
              src="img/handshake.svg"
              alt="Header image"
            />
          </div>
        </div>
      </div>
      <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 1440 250">
        <path
          fill="#fff"
          fill-opacity="1"
          d="M0,128L48,117.3C96,107,192,85,288,80C384,75,480,85,576,112C672,139,768,181,864,181.3C960,181,1056,139,1152,122.7C1248,107,1344,117,1392,122.7L1440,128L1440,320L1392,320C1344,320,1248,320,1152,320C1056,320,960,320,864,320C768,320,672,320,576,320C480,320,384,320,288,320C192,320,96,320,48,320L0,320Z"
        ></path>
      </svg>
    </header>

    <section class="companies">
      <div class="container text-center">
        <div class="row g-5">
          <div class="col-md-2">
            <img
              src="img/companies/ford2.png"
              alt="Company logo"
              class="img-fluid mt-5"
            />
          </div>
          <div class="col-md-2">
            <img
              src="img/companies/mahindra.png"
              alt="Company logo"
              class="img-fluid"
            />
          </div>
          <div class="col-md-2">
            <img
              src="img/companies/hyundai.png"
              alt="Company logo"
              class="img-fluid mt-5"
            />
          </div>
          <div class="col-md-2">
            <img
              src="img/companies/audi2.png"
              alt="Company logo"
              class="img-fluid"
            />
          </div>
          <div class="col-md-2">
            <img
              src="img/companies/bmw2.webp"
              alt="Company logo"
              class="img-fluid"
            />
          </div>
          <div class="col-md-2">
            <img
              src="img/companies/mercedes.jpg"
              alt="Company logo"
              class="img-fluid"
            />
          </div>
        </div>
      </div>
    </section>

    <section class="ftco-section ftco-no-pt">
    <div class="container mt-4">
  <div class="row">
    <!-- Card -->
    <?php
      include_once('sql.php');
      $query = "SELECT id,model,vnumber,seat,rent FROM addcars";
      $stmt = $conn->prepare($query);
      $stmt->execute();
      $stmt->store_result();
      $stmt->bind_result($id,$model, $vnumber, $seat, $rent);


while($stmt->fetch())
      {
    ?>
    <div class="col-md-4 mb-5 mt-5">
      <div class="card" key=<?php echo"$id" ?>>
        <img src="img/carimg.png" class="card-img-top mt-3 mb-3" alt="Card Image">
        <div class="card-body">
          <h5 class="card-title"><?php echo($model); echo($id);?></h5>
          <ul class="list-unstyled .small">
            <li>
              Vechile Number : <?php echo($vnumber);?>
            </li>
            <li>
              Seating Capacity: <?php echo($seat);?>
            </li>
            <li>
              Rent Per Day : Rs. <?php echo($rent);?>
            </li>
          </ul>
          <div class="<?php echo $classNameEditBtn;?>"><a class="text-decoration-none"
           href="<?php echo("update.php?id=$id&model=$model&vnumber=$vnumber&seat=$seat&rent=$rent") ?>">
          <button type="button" class="btn-outline-info form-control">Edit</button></a>
          </div>
          <div class="<?php echo $classNameHidden; ?>">
          <div class="d-flex flex-row">
          <select class="form-select form-control mt-2" id="selectday" aria-label="Default select example">
            <option selected>Days</option>
            <option value="1">1</option>
            <option value="2">2</option>
            <option value="3">3</option>
            <option value="4">4</option>
            <option value="5">5</option>
            <option value="6">6</option>
            <option value="7">7</option>
            <option value="8">8</option>
            <option value="9">9</option>
            <option value="10">10</option>
            <option value="11">11</option>
            <option value="12">12</option>
            <option value="13">13</option>
            <option value="14">14</option>
            <option value="15">15</option>
            <option value="16">16</option>
            <option value="17">17</option>
            <option value="18">18</option>
            <option value="19">19</option>
            <option value="20">20</option>
            <option value="21">21</option>
            <option value="22">22</option>
            <option value="23">23</option>
            <option value="24">24</option>
            <option value="25">25</option>
            <option value="26">26</option>
            <option value="27">27</option>
            <option value="28">28</option>
            <option value="29">29</option>
            <option value="30">30</option>
          </select>
          <div class="p-2">
          <input type="date" class="form-control h-25 p-2" id="dateField">
          </div>
      </div>
          </div>
          <?php 
              $data = [$id,$model,$vnumber,$seat,$rent];
              $str = json_encode($data);
              
             ?>
          <a class="text-decoration-none" href="<?php echo $url; ?>"><button type="submit" name="rentbtn" 
          class="btn btn-outline-info btn-block rounded mt-4 <?php echo $disableClassName; ?>" onClick="rentBtnHandler(<?php echo $id;  ?>)">
          Rent Car</button></a>
        </div>
      </div>
    </div>
    <?php
                  }?>
  </div>
</div>
</section>


    <section class="services gradient">
      <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 1440 220">
        <path
          fill="#fff"
          fill-opacity="1"
          d="M0,96L34.3,106.7C68.6,117,137,139,206,122.7C274.3,107,343,53,411,53.3C480,53,549,107,617,117.3C685.7,128,754,96,823,96C891.4,96,960,128,1029,154.7C1097.1,181,1166,203,1234,202.7C1302.9,203,1371,181,1406,170.7L1440,160L1440,0L1405.7,0C1371.4,0,1303,0,1234,0C1165.7,0,1097,0,1029,0C960,0,891,0,823,0C754.3,0,686,0,617,0C548.6,0,480,0,411,0C342.9,0,274,0,206,0C137.1,0,69,0,34,0L0,0Z"
        ></path>
      </svg>
      <div class="container">
        <div class="row align-items-center justify-content-center">
          
          <div class="col-md-5"><img src="img/marketing.svg" alt="" /></div>
          <div class="col-md-5">

            <h1>We promote.</h1>

            <p>
              Lorem ipsum dolor sit amet, consectetur adipisicing elit.
              Delectus, tempore placeat corrupti enim, cumque ex? Mollitia nihil
              sint cumque omnis iure nisi.
            </p>
          </div>
          <div class="col-md-5">

            <h1>We Rent.</h1>

            <p>
              Lorem ipsum dolor sit amet, consectetur adipisicing elit.
              Delectus, tempore placeat corrupti enim, cumque ex? Mollitia nihil
              sint cumque omnis iure nisi.
            </p>
          </div>
          <div class="col-md-5"><img src="img/revenue_.svg" alt="" /></div>
        </div>
      </div>
      <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 1440 210">
        <path
          fill="#fff"
          fill-opacity="1"
          d="M0,96L34.3,106.7C68.6,117,137,139,206,122.7C274.3,107,343,53,411,53.3C480,53,549,107,617,117.3C685.7,128,754,96,823,96C891.4,96,960,128,1029,154.7C1097.1,181,1166,203,1234,202.7C1302.9,203,1371,181,1406,170.7L1440,160L1440,320L1405.7,320C1371.4,320,1303,320,1234,320C1165.7,320,1097,320,1029,320C960,320,891,320,823,320C754.3,320,686,320,617,320C548.6,320,480,320,411,320C342.9,320,274,320,206,320C137.1,320,69,320,34,320L0,320Z"
        ></path>
      </svg>
    </section>

    <section class="contact">
      <div class="container">
        <div class="row">
          <div class="col-md-5">
            <h1>Contact us:</h1>
            <div class="mb-3">
              <label for="exampleFormControlInput1" class="form-label"
                >Email address</label
              >
              <input
                type="email"
                class="form-control"
                id="exampleFormControlInput1"
                placeholder="name@example.com"
              />
            </div>
            <div class="mb-3">
              <label for="exampleFormControlTextarea1" class="form-label"
                >Example textarea</label
              >
              <textarea
                class="form-control"
                id="exampleFormControlTextarea1"
                rows="3"
              ></textarea>
            </div>
            <button type="button" class="btn btn-outline-secondary">
              Send
            </button>
          </div>
          <div class="col-md-5">
            <img src="img/handshake.svg" alt="Contact image" />
          </div>
        </div>
      </div>
    </section>

    <?php include('components/footer.php');?>  
    <script src="js/bootstrap.min.js"></script>
  </body>
</html>
