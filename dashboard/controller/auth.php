<?php
class auth extends controller {  // charge le modèle

    public function index() {
        $this->set([
            'title'  => 'Connexion'
        ]);
        $this->renderClean('login');    // => views/accueil/index.php + layout "default"
    }
}
?>