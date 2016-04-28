<?php

namespace blitz\app\controllers;

\blitz\vendor\core\Model::import('cliente');

/**
 * @author Fernando Batels <luisfbatels@gmail.com>
 */
class Index extends \blitz\vendor\core\Controller {

    public function actionIndex() {
        new \blitz\app\models\Cliente();
        $this->outputPage('index::default');
    }

}
