<?php

namespace blitz\app\controllers;

\blitz\vendor\core\Model::import('Post');
use \blitz\app\models\Post as Post;

/**
 * @author Fernando Batels <luisfbatels@gmail.com>
 */
class AdminPosts extends \blitz\vendor\core\Controller {

    public function actionIndex() {
        $post = new Post();


        $this->outputPage('admin::posts', [
            'list' => $post->list()
        ]);
    }

    public function actionNew() {
        $this->outputPage('admin::posts-new');
    }
    
    public function actionNewSubmit() {
    
        $this->inputStart($_POST);

        $this->inputAddValidation([
            'title' => 'required',
            'content' => 'required'
        ]);    

        $this->inputAddFilter([
            'title' => 'sanitize_string',
            'content' => 'sanitize_string'
        ]);

        $data = $this->getInputData();

        if ($data === null) {
            $this->outputPage('admin::posts-new');
        } else {
            $post = new Post();
            $post->content = $data['content'];
            $post->title = $data['title'];

            $post->save();

            $this->redirect('admin/posts');
        }
    
    
    }

}
