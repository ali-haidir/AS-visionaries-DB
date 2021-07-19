<!DOCTYPE html>
<html lang="en" dir="ltr">
<head>
  <meta charset="utf-8">
  <link  href= "https://cdn.jsdelivr.net/npm/bootstrap@5.0.1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-+0n0xVW2eSR5OomGNYDnhzAbDsOXxcvSN1TPprVMTNDbiYZCxYbOOl7+AMvyTG2x" crossorigin="anonymous">
  <title>Admin</title>


</head>
<body>


  <nav class = "navbar navbar-expand-lg bg-primary navbar-dark text-dark ">
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
              <a href="order_form.php" class="nav-link">Top Products</a>
            </li>
          </ul>
        </div>
      </div>
    </nav>



    <div class="">

      <form action = " " class="row g-3 p-5" method = "POST">

        <div class="col-md-2">
          <label for="user_name" class="form-label">User Name</label>
          <input name = "user_name" type="name" class="form-control" id="user_name" required>

        <br>  
        </div>
        <div class="col-md-2">
          <label for="password" class="form-label">Password</label>
          <input name = "password" type="password" class="form-control" id="password" required>

          </div>
          <div class="col-12">
            <button name ="submit" type="submit" class="btn btn-warning">Login</button>
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
          $user = $_POST['user_name'];
          $pass = $_POST['password'];

          $query_1=$conn->prepare("select users, password from admin where users=? AND password =?");
          $query_1->execute([$user, $pass]);

          $result = $query_1->fetchAll(PDO::FETCH_ASSOC);

          foreach ($result as $key=>$value){
            // echo $value['users'];
            // echo $value['password'];
            $c_users =  $value['users'];
            $c_pass = $value['password'];

            if ($c_users == $user and $c_pass == $pass){
                // echo "YELLLO";
                
                $query_2=$conn->prepare("select * from cust_order");
                $query_2->execute();

                $query_3=$conn->prepare("select * from products");
                $query_3->execute();

                $result_3 = $query_3->fetchAll(PDO::FETCH_ASSOC);

                $result_2 = $query_2->fetchAll(PDO::FETCH_ASSOC);
                ?>

                <h1> Inventory Managing</h1>
                <table style="width: 50%">
                <thead>
                <tr>
                <th>Product ID</th>
                <th>Product Name</th>
                <th>Quantity</th>
                </tr>
                </thead>

                <tbody>
                <?php
                    foreach ($result_3 as $key=>$value){
                    echo '<tr>
                            <td>'.$value["P_ID"].'</td>
                            <td>'.$value["PRODUCT_NAME"].'</td>
                            <td>'.$value["Quantity"].'</td>
                            </tr>';
                    }
                ?>
                </tbody>
                </table> 
                <br>

                

                <div class="col-12">

                <form action="update.php" class ="rpw g-3 p-5" method="post">
                <!-- <input type="text" name="id"> -->
                <input type="submit" value="Update Inventory">
                </form>
                

                <h1> Summary of Sales</h1>
                <table style="width: 100%">
                <thead>
                <tr>
                <th>Customer ID</th>
                <th>First Name</th>
                <th>Last Name</th>
                <th>Email</th>
                <th>Product ID</th>
                <th>Quantity</th>
                <th>Phone Number</th>
                <th>Address 1</th>
                <th>Address 2</th>
                <th>City</th>
                <th>State</th>
                <th>Zip Code</th>
                <th>Color</th>
                </tr>
                </thead>

                <tbody>
                <?php
                    foreach ($result_2 as $key=>$value){
                    echo '<tr>
                            <td>'.$value["cust_id"].'</td>
                            <td>'.$value["fname"].'</td>
                            <td>'.$value["lname"].'</td>
                            <td>'.$value["email"].'</td>
                            <td>'.$value["p_id"].'</td>
                            <td>'.$value["quantity"].'</td>
                            <td>'.$value["phone_num"].'</td>
                            <td>'.$value["addr_1"].'</td>
                            <td>'.$value["addr_2"].'</td>
                            <td>'.$value["city"].'</td>
                            <td>'.$value["state"].'</td>
                            <td>'.$value["zip"].'</td>
                            <td>'.$value["color"].'</td>
                    </tr>';
                    }
                ?>
                </tbody>
                </table> 
                <br>
                <br>
                <?php
            }
          }          
        }
        
     ?>

      </div>
      <style>
table, th, td {
  border: 1px solid black;
  border-collapse: collapse;
}
th, td {
  padding: 15px;
  text-align: left;
}
#t01 {
  width: 100%;    
  background-color: #f1f1c1;
}
</style>

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
