<!doctype html>
<html lang="en">
  <head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.5.3/dist/css/bootstrap.min.css" integrity="sha384-TX8t27EcRE3e/ihU7zmQxVncDAy5uIKz4rEkgIXeMed4M0jlfIDPvg6uqKI2xXr2" crossorigin="anonymous">

    <!-- <link rel="stylesheet" href='Css/calc.css'> -->

    <title><?= $title; ?></title>
  </head>
  <body>
    <h1 class="text-center">Test work</h1>

<div class="row">
  <div class="col">
    <div class="menu_header m-2">
      <?php include '_menuHeader.php'; ?>
    </div>
  </div>
</div>
   <hr> 
      

    <?php echo $content; ?>




    <!-- Optional JavaScript; choose one of the two! -->

   
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.5.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ho+j7jyWK8fNQe+A12Hb8AhRq26LrZ/JpcUGGOn+Y7RsweNrtN/tE3MoK7ZeZDyx" crossorigin="anonymous"></script>
    <script src="js/form.js"></script>
    <script src="js/calcone.js"></script>
    
  </body>
</html>