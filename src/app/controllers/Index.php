<?php

/*
 * This file is part of the Blitz package.
 *
 * (c) 2016 Fernando Batels
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 */

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
