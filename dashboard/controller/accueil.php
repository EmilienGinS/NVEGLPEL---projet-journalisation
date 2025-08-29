<?php
class accueil extends controller {
    public $models = ['events'];

    public Events $events;

    public function index() {
        $F = "16,17,18,19,20,21,22,23";
        $P = "3,6";

        if (isset($_GET['facility']) && $_GET['facility'] !== '') {
            $F = (int)$_GET['facility'];
        }
        if (isset($_GET['priority']) && $_GET['priority'] !== '') {
            $P = (int)$_GET['priority'];
        }

        $list = $this->events->getLast(25, $F, $P);

        $this->set([
            'events' => $list,
            'title'  => 'Accueil'
        ]);

        $this->render('index');
    }
}
