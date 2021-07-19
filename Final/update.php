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
              <a href="top_products.html" class="nav-link">Top Products</a>
            </li>
          </ul>
        </div>
      </div>
    </nav>



    <div class="col-12">

<form action = " " class="row g-3 p-5" method = "POST">

<div class="col-md-1">
    <label for="Product_id" class="form-label">Product ID</label>
    <input name = "p_id" type="name" class="form-control" id="p_name" required>

<br>  
</div>
<div class="col-md-1">
    <label for="N_quantity" class="form-label">New Quantity</label>
    <input name = "n_quantity" type="number" class="form-control" id="n_quantity" required>

    </div>
    <div class="col-12">
    <button name ="update" type="submit" class="btn btn-warning">Update</button>
    </div>
    <?php

    // Button Clicked


    $username = "root"; 
    $password = ""; 

    try { 
    $conn = new PDO("mysql:host=localhost;dbname=as_visionaries", $username, $password);  // set the PDO error mode to exception 
    $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION); 
    } catch(PDOException $e) { 
    echo "Connection failed: " . $e->getMessage(); 
    } 

    if(isset($_POST['update']))
    {
        // Button Clicked
        // echo "lelllelele";
        // exit();
        
        $p_id = $_POST['p_id'];
        $new_quantity = $_POST['n_quantity'];

        $query_4=$conn->prepare("update products set quantity = ? where p_id = ?");
        $query_4->execute([$new_quantity, $p_id]);

        // $result_4 = $query_3->fetchAll(PDO::FETCH_ASSOC);



    }
?>
</form>
