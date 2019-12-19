<?php

//Naredimo Core razred
//Generira URL in naloži Core Controller
//URL FORMAT - /controller/method/params

class Core{
    protected $currentController ='Pages';
    protected $currentMethod = 'index';
    protected $param = [];


    //nastavimo, da bo naš controller pages - torej, / ali /pages bo isto
    public function __construct(){
       $url = $this->getUrl();

       //Pogledamo v controllers za prvo vrednost
       if(file_exists('../app/controllers/'.ucwords($url[0]).'.php')){
        
        //če obstaja, nastavimo kot controller -> ucword spremeni prvo črko v veliko
        $this->currentController = ucwords($url[0]);

        //unsetamo 0 index
        unset($url[0]);
      }
      
      //require-amo controller
      require_once '../app/controllers/'. $this->currentController. '.php';
   
      //inicializiramo razred controller
      $this->currentController = new $this->currentController;

      //preverimo drugi del URL
      if(isset($url[1])){
        //preverimo, če metoda obstaja v controlleru
        if(method_exists($this->currentController, $url[1])){
            $this->currentMethod = $url[1];

            //unsetamo index
            unset($url[1]);
        }
      }
      
      // GET Parametre, če so paramatri jih dodamo v array, drugače ostane prazen
      $this->param = $url ? array_values($url) : [];
      
      //Call Back funkcija parametrov
      call_user_func_array([$this->currentController,$this->currentMethod], $this->param);

    }

    public function getUrl(){
        if(isset($_GET['url'])){
            $url = rtrim($_GET['url'],'/');

            //filtriramo spremenljivke, ki jih URL ne sme imeti
            $url = filter_var($url, FILTER_SANITIZE_URL);
            $url = explode('/', $url);
            return $url;
        }
    }

}