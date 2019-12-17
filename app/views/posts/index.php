<?php require APPROOT . '/views/inc/header.php'; ?>
    <?php flash('blog_message');?>
    <div class="row mt-2 mb-3">
        <div class="col-md-6">
            <h1>Blog vsebine</h1>
        </div>
        <?php if( $_SESSION['user_id']==5) : ?>
            <div class="col-md-2">
                <a href="<?php echo URLROOT;?>/posts/add" class="btn btn-primary pull-right m-2">
                <i class="fa fa-pencil"></i> Dodaj objavo</a>
            </div>
            <div class="col-md-2">
                <a href="<?php echo URLROOT;?>/posts/addProduct" class="btn btn-primary pull-right m-2">
                <i class="fa fa-pencil"></i> Dodaj izdelek</a>
            </div>
            <div class="col-md-2">
                <a href="<?php echo URLROOT;?>/posts/allProducts" class="btn btn-primary pull-right m-2">
                <i class="fa fa-pencil"></i> Vsi produkti</a>
            </div>
        <?php endif;?>
    </div>
<div class="container ">
    <div class="row ml-3">
    <?php foreach($data['posts'] as $post) : ?>
      <div class="card mb-4 ml-3">
        <div class="card-body">
            <div class="row">
                <div class="col">
                    <h2 class="card-title"><?php echo $post->title; ?></h2>
                    <p class="card-text"> Avtor:  <?php echo $post->name; ?> </p>
                    <p class="card-text"> DNE: <?php echo $post->postCreated; ?> </p>
                    <a href="<?php echo URLROOT; ?>/posts/show/<?php echo $post->postId; ?>" class="btn btn-primary"> Več </a>
                </div>
            </div>
        </div>
        <div class="card-footer text-muted">
        <p class="card-text"> Avtor:  <?php echo $post->name; ?> DNE: <?php echo $post->postCreated; ?> </p>
        </div>
     </div>
  <?php endforeach; ?>
  </div>


     
<?php require APPROOT . '/views/inc/footer.php'; ?>