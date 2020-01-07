<?php require APPROOT . '/views/inc/header.php';

     //sporocilo ob nakupu (bootstrap success)
     flash('nakup_message');

?>

  <h1 class="h2-1 mt-5"> ID PLAČILA: <?php echo $data['id'] ?> </h1>
  <p class="lead"> IME PRODUKTA <?php echo $data['product'] ?></p>
       


 <?php require APPROOT . '/views/inc/footer.php';?>