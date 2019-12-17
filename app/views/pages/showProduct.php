<?php require APPROOT . '/views/inc/header.php'; ?>

    <h1> <?php echo $data['products']->title; ?> </h1>
    <p> <?php echo $data['products']->price ;?></p>
    <p> <?php echo $data['products']->body ;?></p>



<?php require APPROOT . '/views/inc/footer.php'; ?>