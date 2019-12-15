
<?php

    //nalozimo config
    require_once 'config/config.php';

    //Implementiramo AutoLoad "Libraries", da koda postane bolj pregledna v primeru veliko knjižnic in ne potrebujemo toliko require funkcij
    spl_autoload_register(function($className){
        require_once 'libraries/'.$className.'.php';
    });