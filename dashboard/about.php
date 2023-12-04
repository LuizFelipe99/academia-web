<!doctype html>
<html lang="en">

<head>
  <title>Sidebar 01</title>

  <meta charset="utf-8">

  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">



  <link href="https://fonts.googleapis.com/css?family=Poppins:300,400,500,600,700,800,900" rel="stylesheet">



  <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">

  <link rel="stylesheet" href="css/style.css">

</head>

<body>



  <div class="wrapper d-flex align-items-stretch">

    <nav id="sidebar">

      <div class="p-4 pt-5">

        <?php

        include('menu.php');

        ?>



      </div>

    </nav>



    <div id="content" class="p-4 p-md-5">



      <!-- Page Content  -->

      <?php

      include('nav_interno.php');

      ?>

      <h2 class="mb-4">ABOUT</h2>

      <!-- aqui coloco o que quiser -->

      <!-- Default dropright button -->



    </div>

  </div>



  <script src="js/jquery.min.js"></script>

  <script src="js/popper.js"></script>

  <script src="js/bootstrap.min.js"></script>

  <script src="js/main.js"></script>

</body>

</html>