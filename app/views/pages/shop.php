<?php require APPROOT . '/views/inc/header.php'; ?>


   
    <h1 class="display-3"> <?php echo $data['title'] ?> </h1>
    <p class="lead"><?php echo $data['description'] ?></p>

  <div class="container ">
    <div class="row ml-3">
    <?php foreach($data['products'] as $product) : ?>
      <div class="card mb-4 ml-3">
        <div class="card-body">
            <div class="row">
                <div class="col">
                    <h2 class="card-title"><?php echo $product->title; ?></h2>
                    <h2 class="card-title">Cena: <?php echo $product->price; ?></h2>
                    <a href="<?php echo URLROOT; ?>/products/showProduct/<?php echo $product->productId; ?>" class="btn btn-primary"> Več </a>
                </div>
            </div>
        </div>
     </div>
  <?php endforeach; ?>
  </div>
    
<?php require APPROOT . '/views/inc/footer.php'; ?>