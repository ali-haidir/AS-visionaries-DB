<!DOCTYPE html>
<html lang="en" dir="ltr">
<head>
  <meta charset="utf-8">
  <link  href= "https://cdn.jsdelivr.net/npm/bootstrap@5.0.1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-+0n0xVW2eSR5OomGNYDnhzAbDsOXxcvSN1TPprVMTNDbiYZCxYbOOl7+AMvyTG2x" crossorigin="anonymous">
  <title>Order Form </title>


</head>
<body>


  <nav class = "navbar navbar-expand-lg bg-warning navbar-dark text-dark ">
    <div class="container">
      <div class="">
        <button class="btn"><i class="fa fa-home"></i></button>

      </div>
      <a href="as.php" class="navbar-brand">

        AS Visionaries </a>

        <button class="navbar-toggler" type="button" data-bs-toggle = "collapse" data-bs-target = "#navmenue">
          <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id = "navmenue">
          <ul class="navbar-nav ms-auto">

            <li class="nav-items">
              <a href="as.php" class="nav-link"> Home</a>
            </li>

            <li class="nav-items">
              <a href="admin.php" class="nav-link"> Admin</a>
            </li>

            <li class="nav-items">
              <a href="top_products.html" class="nav-link">Top Products</a>
            </li>


          </ul>

        </div>
      </div>
    </nav>

  <div class="d-grid gap-3 ">

    <div class="align-items-center justify-content-between text-center">
      <a href = "order_form.php"><img src="img1.png" alt="..." class="img-thumbnail rounded float-left " style="width:200px;height:200px" id="img1"></a>
      <img  src="img2.png" alt="..." class="img-thumbnail rounded float-left" style="width:200px;height:200px ">
      <img src="img3.png" alt="..." class="img-thumbnail rounded float-left" style="width:200px;height:200px">
      <img src="img4.png" alt="..." class="img-thumbnail rounded float-left" style="width:200px;height:200px">

    </div>
  </div>


    <div class="">

      <form action = " " class="row g-3 p-5" method = "POST">

        <div class="col-md-6">
          <label for="first_name" class="form-label">First Name</label>
          <input name = "f_name" type="name" class="form-control" id="first_name">

        </div>
        <div class="col-md-6">
          <label for="Last_name" class="form-label">Last Name</label>
          <input name = "l_name" type="name" class="form-control" id="Last_name">

        </div>

        <div class="col-md-6">
          <label for="Product" class="form-label">Product</label><br>
          
          <!-- <input name ="product" type="email" class="form-control" id="inputEmail4"> -->
          <select id="option" name="product">  
            <option value="p1">Automated Dustbin</option>}  
            <option value="p2">Electric Blinders</option>  
            <option value="p3">Automatic Thermostat</option>
            <option value="p4">Roomba - Cleaner</option>  
          </select>
        </div>

        <div class="col-md-6">
          <label for="input_quantity" class="form-label">Quantity</label>
          <input name = "quantity" type="number" class="form-control" id="input_quantity">
        </div>


        <div class="col-md-6">
          <label for="input_number" class="form-label">Phone number</label>
          <input name = "phone" type="Phone" class="form-control" id="input_number">
        </div>


        <div class="col-md-6">
          <label for="inputEmail4" class="form-label">Email</label>
          <input name ="email" type="email" class="form-control" id="inputEmail4">
        </div>

          <div class="col-12">
            <label for="inputAddress" class="form-label">Address</label>
            <input name = "addr_1" type="text" class="form-control" id="inputAddress" placeholder="1234 Main St">
          </div>
          <div class="col-12">
            <label for="inputAddress2" class="form-label">Address 2</label>
            <input name = "addr_2" type="text" class="form-control" id="inputAddress2" placeholder="Apartment, studio, or floor">
          </div>
          <div class="col-md-6">
            <label for="inputCity" class="form-label">City</label>
            <input name = "city" type="text" class="form-control" id="inputCity">
          </div>
          <div class="col-md-4">
            <label for="inputState" class="form-label">State</label>
            <input name = "state" type="text" class="form-control" id="inputState">

          </div>
          <div class="col-md-2">
            <label for="inputZip" class="form-label" required>Zip</label>
            <input name ="zip" type="text" class="form-control" id="inputZip">
          </div>

          <div class="">
            <label for="exampleColorInput" class="form-label">Color picker</label>
            <input name="color" type="color" class="form-control form-control-color" id="exampleColorInput" value="#563d7c" title="Choose your color">

          </div>
          <div class="col-12">
            <div class="form-check">
              <input class="form-check-input" type="checkbox" id="gridCheck">
              <label class="form-check-label" for="gridCheck">
                Confirm
              </label>
            </div>
          </div>
          <div class="col-12">
            <button name ="submit" type="submit" class="btn btn-warning">Order</button>
          </div>
        </form>

        <?php
        // Checking for submit button
        // For getting email from news letter box
        if(isset($_POST['submit']))
        {
          // Button Clicked


          $username = "root"; 
          $password = ""; 

          try { 
          $conn = new PDO("mysql:host=localhost;dbname=as_visionaries", $username, $password);  // set the PDO error mode to exception 
          $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION); 
          } catch(PDOException $e) { 
          echo "Connection failed: " . $e->getMessage(); 
          } 

          // Pre-lim checks
          $quantity = $_POST['quantity'];

          if ($quantity == ''){
            exit();
          }
          // Checking the quantity

          $product = $_POST['product'];
          $query_1=$conn->prepare("select quantity from products where p_id = ?");
          $query_1->execute([$product]);

          $result = $query_1->fetchAll(PDO::FETCH_ASSOC);


          foreach ($result as $key=>$value){
            // echo $value['quantity'];
            $limit = $value['quantity'];
          }

          // echo $limit;

          
            // Product = p1, p2 ,p3 ,p4

          
          $f_name = $_POST['f_name'];
          $l_name = $_POST['l_name'];
          $email = $_POST['email'];
          $quantity = $_POST['quantity'];
          $phone = $_POST['phone'];
          $addr_1 = $_POST['addr_1'];
          $addr_2 = $_POST['addr_2'];
          $city = $_POST['city'];
          $state = $_POST['state'];
          $zip = $_POST['zip'];
          $color = $_POST['color'];

          // Checking for quantity

          if ($quantity > $limit){
            exit();
          }

          $left = $limit - $quantity;

          $query_3=$conn->prepare("update products set quantity = ? where p_id = ?");
          $query_3->execute([$left, $product]);
          
          $query_2=$conn->prepare("insert into cust_order(fname, lname, email, p_id, quantity, phone_num ,addr_1, addr_2, city, state, zip, color) values(?,?,?,?,?,?,?,?,?,?,?,?)");
          $query_2->execute([$f_name, $l_name, $email, $product, $quantity, $phone, $addr_1, $addr_2, $city, $state, $zip, $color]);



        }
        
        
     ?>

      </div>


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
