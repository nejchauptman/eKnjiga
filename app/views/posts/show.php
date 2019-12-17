<?php require APPROOT . '/views/inc/header.php'; ?>

    <h1> <?php echo $data['post']->title; ?> </h1>
    <div class="bg-secondary text-white p-2 mb-3">
        Avtor:  <?php echo $data['user']->name; ?> DNE: <?php echo $data['post']->created_at; ?>
    </div>
    <p> <?php echo $data['post']->body ;?></p>

   <?php if( $_SESSION['user_id']==5) : ?>
        <hr>
        <a href="<?php echo URLROOT; ?>/posts/edit/<?php echo $data['post']->id;?>" class="btn btn-dark">Uredi</a>

        <form class=" pull-right " action="<?php echo URLROOT;?>/posts/delete/<?php echo $data['post']->id; ?>" method="post"> 
            <input type="submit" value="Izbriši" class="btn btn-danger">
        </form>
    <?php elseif($data['post']->user_id != $_SESSION['user_id']) : ?>
        <hr>
    <?php endif; ?>


<?php require APPROOT . '/views/inc/footer.php'; ?>