<?php require APPROOT . '/views/inc/header.php'; ?>
<?php

?>
<div class="container">
    <div class="row featurette mt-5">
          <div class="col-md-7">
            <h2 class="featurette-heading m-2 "> <?php echo $data['products']->title; ?></h2>
            <p class="lead mt-3  text-justify" ><?php echo $data['products']->body ;?></p>
            <h1 class="lead"> CENA: <?php echo $data['products']->price ;?></h1>
          </div>
          <div class="col-md-5 mt-5">
             <img src="data:<?php echo $product->type;?>;base64,<?php echo base64_encode($data['products']->data);?>" width="500" height="500">  
            </div>
        </div>
    </div>

<?php require APPROOT . '/views/inc/footer.php'; ?>