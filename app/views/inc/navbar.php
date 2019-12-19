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
        <a class="nav-link" href="<?php echo URLROOT;?>/pages/shop">Shop</a>
      </li>
      <li class="nav-item">
        <a class="nav-link" href="<?php echo URLROOT;?>/posts/blog">Blog</a>
      </li>
    </ul>
    <ul class="navbar-nav ml-auto">
    <?php if(isset($_SESSION['user_id']) && !($_SESSION['user_id']==5)) : ?>
        <li class="nav-item">
            <a class="nav-link" href="">Dobrodošel  <?php echo $_SESSION['user_name']; ?></a>
        </li>
        <li class="nav-item">
          <a class="nav-link" href="<?php echo URLROOT;?>/pages/cart"> <i class="fa fa-shopping-cart"></i> </a>
        </li>
        <li class="nav-item">
            <a class="nav-link" href="<?php echo URLROOT;?>/users/logout">Odjava</a>
        </li>
        <?php elseif(isset($_SESSION['user_id']) && ($_SESSION['user_id']==5)) : ?>
          <li class="nav-item mr-5">
            <div class="dropdown">
              <button class="btn btn-secondary dropdown-toggle" type="button" id="dropdownMenuButton" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
               <?php echo $_SESSION['user_name']; ?>
              </button>
              <div class="dropdown-menu" aria-labelledby="dropdownMenuButton">
                <a href="<?php echo URLROOT;?>/posts/add" class="nav-link text-dark">
                   <i class="fa fa-pencil"></i> Dodaj blog
                </a>
                <a href="<?php echo URLROOT;?>/posts/addProduct" class="nav-link text-dark">
                   Dodaj izdelek
                </a>
                <a href="<?php echo URLROOT;?>/posts/allProducts"  class="nav-link text-dark"> Vsi produkti
                </a>
                 <a class="nav-link text-dark" href="<?php echo URLROOT;?>/users/logout">Odjava</a>
              </div>
          </div>
        </li>
    <?php else : ?>
      <li class="nav-item">
        <a class="nav-link" href="<?php echo URLROOT;?>/pages/cart"> <i class="fa fa-shopping-cart"></i> </a>
      </li>
      <li class="nav-item">
        <a class="nav-link" href="<?php echo URLROOT;?>/users/register">Registracija</a>
      </li>
      <li class="nav-item">
        <a class="nav-link" href="<?php echo URLROOT;?>/users/login">Prijava</a>
      </li>
    <?php endif; ?>
    </ul>
  </div>
</nav>