<!DOCTYPE html>
<html lang="en" dir="ltr">
<head>
  <meta charset="utf-8">
  <link  href= "https://cdn.jsdelivr.net/npm/bootstrap@5.0.1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-+0n0xVW2eSR5OomGNYDnhzAbDsOXxcvSN1TPprVMTNDbiYZCxYbOOl7+AMvyTG2x" crossorigin="anonymous">
  <link rel="stylesheet" href="style.css">
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
  <title>AS Visionaries</title>
</head>
<body>


  <nav class = "navbar navbar-expand-lg bg-primary navbar-dark text-dark ">
    <div class="container">
      <div class="">
        <button class="btn"><i class="fa fa-home"></i></button>

      </div>
      <a href="#" class="navbar-brand">

        AS Visionaries </a>

        <button class="navbar-toggler" type="button" data-bs-toggle = "collapse" data-bs-target = "#navmenue">
          <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id = "navmenue">
          <ul class="navbar-nav ms-auto">

            <li class="nav-items">
              <a href="#home" class="nav-link"> Home</a>
            </li>

            <li class="nav-items">
              <a href="admin.php" class="nav-link"> Admin</a>
            </li>

            <li class="nav-items">
              <a href="order_form.php" class="nav-link">Top Products</a>
            </li>


          </ul>

        </div>
      </div>
    </nav>

    <!-- phase 1 showcase area -->

      <section
      class="bg-dark text-light p-5  text-center "
      >
      <div class="container">
        <div class="d-sm-flex align-items-center justify-content-between">
          <div>
            <h1>Our vision <span class="text-warning"> Your Future </span></h1>
            <p class="lead my-4">
              A destination for modern, simple, innovative & functional tech related products.
            </p>
            <button
            class="btn btn-info "
            data-bs-toggle="modal"
            data-bs-target="#enroll"
            >
            Home
          </button>
        </div>
        <img
        class="img-fluid  d-none d-sm-block "
        src="logo.png"
        alt=""
        style="width:300px;height:300px"

        />
      </div>
    </div>
  </section>


<!-- Newsletter -->

  <section class="bg-info text-light p-5">
       <div class="container">
         <div class="d-md-flex justify-content-between align-items-center">
           <h3 class="mb-3 mb-md-0">Sign Up For Our Newsletter</h3>

           <form action=" " method="POST"> 
           <div class="input-group news-input">
           
             <input type="email" name = "n2" class="form-control" placeholder="Enter Email" />
             <input type="hidden" name="form_submitted" value="1" /><input name = "news_email" class="btn btn-dark btn-lg" type="submit" value = "Submit"></input>
             </form>
            </div>
         </div>
       </div>
     </section>


     <p><span>
     <div class="">


     </div></span></p>


<!-- products -->
<section class="bg-dark text-light p-5">
<div class="align-items-center ">

  <h1 class="text-center">Our Top Selling Products</h1>
</div>



  <div class="d-grid gap-3 ">

      <div class="align-items-center justify-content-between text-center">
        <a href = "order_form.php"><img src="img1.png" alt="..." class="img-thumbnail rounded float-left " style="width:200px;height:200px" id="img1"></a>
        <a href = "order_form.php"><img  src="img2.png" alt="..." class="img-thumbnail rounded float-left" style="width:200px;height:200px "></a>
        <a href = "order_form.php"><img src="img3.png" alt="..." class="img-thumbnail rounded float-left" style="width:200px;height:200px"></a>
        <a href = "order_form.php"><img src="img4.png" alt="..." class="img-thumbnail rounded float-left" style="width:200px;height:200px"></a>

      </div>
  </div>


</section>

<!-- Contact & Map -->
    <section class="p-5">
      <div class="container">
        <div class="row g-4">
          <div class="col-md">
            <h2 class="text-center mb-4">Contact Info</h2>
            <ul class="list-group list-group-flush lead">
              <li class="list-group-item">
                <span class="fw-bold">Operations:</span> Providing you with the automated products 
              </li>
              <li class="list-group-item">
                <span class="fw-bold">Website:</span> asvisionaries.com
              </li>
              <li class="list-group-item">
                <span class="fw-bold">Cell Phone:</span> +9230328572
              </li>
              <li class="list-group-item">
                <span class="fw-bold"> Email:</span> asvisionaries@gmail.com
              </li>
              <li class="list-group-item">
                <span class="fw-bold">Secondary Email:</span> asvisionaries@hotmail.com
              </li>
            </ul>
          </div>
          <div class="col-md">
            <div id="map"></div>
          </div>
        </div>
      </div>
    </section>

    <?php
        // Checking for submit button
        // For getting email from news letter box
        if(isset($_POST['n2']))
        {
          // Button Clicked
          $new_email = $_POST['n2'];

          if ($new_email == "")
          {
            exit();
          }

          $username = "root"; 
          $password = ""; 

          try { 
          $conn = new PDO("mysql:host=localhost;dbname=as_visionaries", $username, $password);  // set the PDO error mode to exception 
          $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION); 
          } catch(PDOException $e) { 
          echo "Connection failed: " . $e->getMessage(); 
          }        

          $query_1=$conn->prepare("insert into emails values(?)");
          $query_1->execute([$new_email]);


        }
        
        
     ?>

<!-- Footer -->
  <footer class="p-5 bg-dark text-white text-center position-relative">
    <div class="container">
      <p class="lead"> 2021 AS visionaries</p>

      <a href="#" class="position-absolute bottom-0 end-0 p-5">
        <i class="bi bi-arrow-up-circle h1"></i>
      </a>
    </div>
  </footer>



  <script src= "https://cdn.jsdelivr.net/npm/bootstrap@5.0.1/dist/js/bootstrap.bundle.min.js" integrity="sha384-gtEjrD/SeCtmISkJkNUaaKMoLD0//ElJ19smozuHV6z3Iehds+3Ulb9Bn9Plx0x4" crossorigin="anonymous">

  </script>

</body>
</html>
