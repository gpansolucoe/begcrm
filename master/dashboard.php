<?php
set_time_limit(0);
?>
<!DOCTYPE html>
<html lang="en">

<head>
   <meta charset="UTF-8">
   <title>Gpan Sistemas - Dashboard</title>
   <meta name="viewport" content="width=device-width, initial-scale=1">
   <?php
   include_once('../imports/css-head.php');
   ?>
</head>

<body id="app-container" class="menu-sub-hidden show-spinner">
   <?php
   include_once('../imports/navbar.php');
   include_once('../imports/sidebar.php');
   ?>
   <main>
      <div class="container-fluid">
         <div class="row  ">
            <div class="col-12">
               <h1>Dashboard</h1>
               <nav class="breadcrumb-container d-none d-sm-block d-lg-inline-block" aria-label="breadcrumb">
                  <ol class="breadcrumb pt-0">
                     <li class="breadcrumb-item active" aria-current="page">Home</li>
                  </ol>
               </nav>
               <div class="separator mb-5"></div>
            </div>
    
   </main>
   <?php
   include_once('../imports/scripts-footer.php');
   ?>
</body>

</html>