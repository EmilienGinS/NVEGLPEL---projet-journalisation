<?php
class controller {
    /** @var array<string,mixed> */
    public $vars = [];

    public $layout = "default";
    public $layoutClean = "clean";

    public Session $Session;

    function __construct(){
        //chargement du tableau de modèles en mémoire
        if (isset($this->models)) {
            foreach ($this->models as $m) {
                $this->loadmodel($m);
            }
        }
        $this->Session = new Session();
    }

    function render($filename)
    {
        //permet de faire passer les variables dans la vue
        extract($this->vars);
        ob_start();

        //get_class($this) : retourne le nom de la classe en cours
        require (ROOT.'views/'.get_class($this).'/'.$filename.'.php');

        $content_for_layout = ob_get_clean();

        
        require (ROOT.'views/layout/'.$this->layout.'.php');
    }

    function renderClean($filename)
    {
        extract($this->vars);
        ob_start();
        
        require (ROOT.'views/'.get_class($this).'/'.$filename.'.php');

        $content_for_layout = ob_get_clean();
        
        require (ROOT.'views/layout/'.$this->layoutClean.'.php');
    }

    function set($d) {
        //fusion des données à envoyer avec les données
        //déjà présentes dans $vars
        $this->vars=array_merge($this->vars,$d);
    }

    function loadmodel($name) {
        require "models/".strtolower($name).".php";
        $this->$name = new $name();
    }
}
