<?php

namespace blitz\app\controllers;


\blitz\vendor\core\Model::import('Post');
use \blitz\app\models\Post as Post;

/**
 * @author Fernando Batels <luisfbatels@gmail.com>
 */
class Index extends \blitz\vendor\core\Controller {

    public function actionIndex() {
        $this->outputPage('index::default');
    }

    public function actionPosts() {
        $post = new Post();

        $this->outputPage('index::posts', [
            'list' => $post->list()
        ]);
    }


    public function actionPost($id) {
        $post = new Post();
        
        $post->id = $id;

        $this->outputPage('index::post', [
            'infos' => $post->infos()
        ]);
    }



}
