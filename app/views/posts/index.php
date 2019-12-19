<?php require APPROOT . '/views/inc/header.php'; ?>
    <?php flash('blog_message');?>
    <div class="row mt-2 mb-3">
        <div class="col-md-6">
            <h1>Blog vsebine</h1>
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