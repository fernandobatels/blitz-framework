<?php

namespace blitz\app\models;

/**
 * Post model
 *
 * @author Fernando Batels <luisfbatels@gmail.com>
 */
class Post extends \blitz\vendor\core\ModelDatabase{

    
    public function save() {
        if ($this->id === null)
            $this->id = -1;

        return $this->saveAux('post', [
            'title' => $this->title,
            'content' => $this->content
        ]);
    }

    public function infos() {
        return $this->getConn()
            ->select('id, title, content')
            ->from('post')
            ->where('id = ?', [$this->id])
            ->execute()
            ->fetchInto($this);
    }

    public function list() {
        return $this->getConn()
            ->select('id, title')
            ->from('post')
            ->execute()
            ->fetchCollection(new Post());

    }

}
