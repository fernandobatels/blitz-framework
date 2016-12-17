<?php

/*
 * This file is part of the Blitz package.
 *
 * (c) 2016 Fernando Batels
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 */
namespace blitz\app\models;
/**
 * Description of Cliente
 *
 * @author Fernando Batels <luisfbatels@gmail.com>
 */
class Cliente extends \blitz\vendor\core\ModelDatabase{
    
    protected function nameTable() {
        return 'noticias';
    }
    public function __construct() {
        parent::__construct();
        $this->writePrivateFile('text', 'dsda',true);
    }
}
