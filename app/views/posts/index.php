<?php require APPROOT . '/views/inc/header.php'; ?>

<?php flash('blog_message');?>
    <div class="row mb-2">
        <div class="col-md-6">
            <h1>Objave</h1>
        </div>
        <div class="col-md-6">
            <a href="<?php echo URLROOT;?>/posts/add" class="btn btn-primary pull-right">
            <i class="fa fa-pencil"></i> Dodaj objavo</a>
        </div>
    </div>
    <?php foreach($data['posts'] as $post) : ?>
        <div class="card card-body mb-3">
        <h4 class="card-title"><?php echo $post->title; ?></h4>
        <div class="bg-secondary text-white p-2 mb-3">
            Avtor:  <?php echo $post->name; ?> DNE: <?php echo $post->postCreated; ?>
        </div>
        <a href="<?php echo URLROOT; ?>/posts/show/<?php echo $post->postId; ?>" class="btn btn-dark"> Več </a>
        </div>
    <?php endforeach; ?>

<?php require APPROOT . '/views/inc/footer.php'; ?>