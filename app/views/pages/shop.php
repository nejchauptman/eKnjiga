<?php require APPROOT . '/views/inc/header.php'; ?>


    <h1 class="display-3"> <?php echo $data['title'] ?> </h1>
    <p class="lead"><?php echo $data['description'] ?></p>

    <div class="container ">
        <form method="POST" action="cart" >
        <div class="row ml-3">
        <?php foreach($data['products'] as $product) : ?>

        <div class="col-md-4">
                <div class="card mb-4 shadow-sm">
                    <img src="data:<?php echo $product->type;?>;base64,<?php echo base64_encode($product->data);?>" width="100%" height="300">
                    <div class="card-body">
                        <h2 name="title" class="card-title"> <?php echo $product->title; ?></h2>
                        <p name="price" class="card-text">Cena: <?php echo $product->price; ?></p>
                        <div class="d-flex justify-content-md-center align-items-center">
                            <div class="btn-group">
                                <a href="<?php echo URLROOT; ?>/products/showProduct/<?php echo $product->productId; ?>" class="btn btn-primary mr-2"> Več </a>
                                <?php if (isset($_SESSION['user_id'])):?>
                                    <a href="<?php echo URLROOT; ?>/products/sessionProduct/<?php echo $product->productId; ?>" class="btn btn-primary mr-2">Dodaj v košarico </a>
                                <?php endif; ?>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        <?php endforeach; ?>
        </div>
        </form>



<?php require APPROOT . '/views/inc/footer.php'; ?>