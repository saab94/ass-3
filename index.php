<!doctype html>
<html lang="en">
  <head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.5.3/dist/css/bootstrap.min.css" integrity="sha384-TX8t27EcRE3e/ihU7zmQxVncDAy5uIKz4rEkgIXeMed4M0jlfIDPvg6uqKI2xXr2" crossorigin="anonymous">

    <title>Home Page</title>
  </head>
  <body>
      <div class="container"></div>
      
      <?php include 'db.php' ?>
      <div class="row">
          <div class="col">
              <ul class="nav ">
                  <li><a href="index.php" class="nav-link">Home</a></li>
                  <?php foreach($record as $menu): ?>
                  <li class="nav-item active">
                     <a href="index.php?page='<?php echo $menu['pg']; ?>'" class="nav-link"><?php echo $menu['pg']; ?></a>
                  </li>
                  <?php endforeach; ?>
                  <li><a href="create.php" class="nav-link">Create a New Record</a></li>
              </ul>
          </div>
      </div>
      
      <div class="row">
          <div class="col">
              <?php 
                
                 if(isset($_GET['page']))
                    {
                        $pg = trim($_GET['page'], "'");
                        $record = $connection->query("select * from pages where pg='$pg'") or die($connection->error());
                        $single = $record->fetch_assoc();
                        $pg = $single['pg'];
                        $h1 = $single['h1'];
                        $h2 = $single['h2'];
                        $p1 = $single['p1'];
                        $p2 = $single['p2'];
                        $id = $single['id'];
                        $update = "update.php?update=" . $id;
                        $delete = "db.php?delete=" . $id;
                        echo "
                            <div class='row'>
                                <div class='col-sm-12'>
                                <div class='card'>
                                    <div>
                                          <h4>  {$pg}</h4>
                                    </div>
                                    <div class='card-body'>
                                        <h4 class='card-title'>{$h1}</h4>
                                        <h4 class='card-title'>{$h2}</h4>
                                        <p class='card-text'>{$p1}</p>
                                        <p class='card-text'>{$p2}</p>
                                        <a href='{$update}' class='btn btn-primary'>Update</a>
                                        <a href='{$delete}' class='btn btn-dark'>Delete</a>
                                    </div>
                                </div>
                                </div>
                            <div>
                            ";
                        
                    }
                    else
                    {
                        
                        echo "
                            <nav class='navbar navbar-light bg-primary'>
                            <a class='navbar-brand rounded mx-auto d-block' href='#'>
                            <img src='LOGO0.jpg' width='100%' height='300' alt='' loading='lazy'>
                            </a>
                        </nav>
                        
                        ";
                    }
              
              ?>
          </div>
      </div>


    <!-- Optional JavaScript; choose one of the two! -->

    <!-- Option 1: jQuery and Bootstrap Bundle (includes Popper) -->
    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js" integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.5.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ho+j7jyWK8fNQe+A12Hb8AhRq26LrZ/JpcUGGOn+Y7RsweNrtN/tE3MoK7ZeZDyx" crossorigin="anonymous"></script>

    <!-- Option 2: jQuery, Popper.js, and Bootstrap JS
    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js" integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.1/dist/umd/popper.min.js" integrity="sha384-9/reFTGAW83EW2RDu2S0VKaIzap3H66lZH81PoYlFhbGU+6BZp6G7niu735Sk7lN" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.5.3/dist/js/bootstrap.min.js" integrity="sha384-w1Q4orYjBQndcko6MimVbzY0tgp4pWB4lZ7lr30WKz0vr/aWKhXdBNmNb5D92v7s" crossorigin="anonymous"></script>
    -->
  </body>
</html>