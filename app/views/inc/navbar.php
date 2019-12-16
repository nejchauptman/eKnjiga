<nav class="navbar navbar-expand-lg navbar-dark bg-dark" style="font-size: 1.2rem;">
  <a style="font-size: 1.7rem;" class="navbar-brand" href="<?php echo URLROOT; ?>"><?php echo SITENAME; ?></a>
  <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarsExampleDefault" aria-controls="navbarsExampleDefault" aria-expanded="false" aria-label="Toggle navigation">
    <span class="navbar-toggler-icon"></span>
  </button>

  <div class="collapse navbar-collapse ml-3 " id="navbarsExampleDefault">
    <ul class="navbar-nav mr-auto">
      <li class="nav-item">
        <a class="nav-link" href="<?php echo URLROOT;?>">Domov</a>
      <li class="nav-item">
        <a class="nav-link" href="<?php echo URLROOT;?>/pages/products">Shop</a>
      </li>
      <li class="nav-item">
        <a class="nav-link" href="<?php echo URLROOT;?>/posts/blog">Blog</a>
      </li>
    </ul>
    <ul class="navbar-nav ml-auto">
    <?php if(isset($_SESSION['user_id'])) : ?>
        <li class="nav-item">
            <a class="nav-link" href="">Dobrodošel <?php echo $_SESSION['user_name']; ?></a>
        </li>
        <li class="nav-item">
            <a class="nav-link" href="<?php echo URLROOT;?>/users/logout">Odjava</a>
        </li>
    <?php else : ?>
      <li class="nav-item">
        <a class="nav-link" href="<?php echo URLROOT;?>/users/register">Registracija</a>
      <li class="nav-item">
        <a class="nav-link" href="<?php echo URLROOT;?>/users/login">Prijava</a>
      </li>
    <?php endif; ?>
    </ul>
  </div>
</nav>