<?php

class Controller_Posts extends \Fuel\Core\Controller_Template
{
    public $template = 'posts';

    public function action_index()
    {
        $data = array('rorschach' => 'kovacs');
        $this->template->title = 'Blog Post';
        $this->template->content = View::forge('posts/index',$data);
    }
}
