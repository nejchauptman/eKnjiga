<?php require APPROOT . '/views/inc/header.php'; ?>


   
    <h1 class="display-3"> <?php echo $data['title'] ?> </h1>
    <p class="lead"><?php echo $data['description'] ?></p>

  <div class="container ">
    <div class="row ml-3">
    <?php foreach($data['products'] as $product) : ?>
      <div class="col-md-4">
          <div class="card mb-4 shadow-sm">
          <img src="data:<?php echo $product->type;?>;base64,<?php echo base64_encode($product->data);?>" width="100%" height="300">  
            <div class="card-body">
            <h2 class="card-title"><?php echo $product->title; ?></h2>
              <p class="card-text">Cena: <?php echo $product->price; ?></p>
              <div class="d-flex justify-content-md-center align-items-center">
                <div class="btn-group">
                <a href="<?php echo URLROOT; ?>/products/showProduct/<?php echo $product->productId; ?>" class="btn btn-primary mr-2"> Več </a>
                  <button type="button" class="btn btn-sm btn-outline-secondary ml-3  ">Dodaj v košarico</button>
                </div>
              </div>
            </div>
          </div>
        </div>
  <?php endforeach; ?>
  </div>
  
  

    
<?php require APPROOT . '/views/inc/footer.php'; ?>