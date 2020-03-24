<?php

class Controller_Posts extends \Fuel\Core\Controller_Template
{
    public $template = 'posts';

    public function action_index()
    {
        $posts = Model_Post::find('all');
        $data = ['posts' => $posts];
        $this->template->title = 'Blog Post';
        $this->template->content = View::forge('posts/index', $data, false);
    }


    public function action_view()
    {
        $id = $this->param('id');
        $post = Model_Post::find($id);
        $data = ['post' => $post];
        $this->template->title = 'Blog Post';
        $this->template->content = View::forge('posts/view', $data, false);
    }

    public function action_add()
    {
        if (Input::method() == 'POST') {
            $val = $this->beforeValidate();

            if ($val->run()) {
                $post = Model_Post::forge(array(
                    'title' => Input::post('title'),
                    'category' => Input::post('category'),
                    'body' => Input::post('body'),
                    'tags' => Input::post('tags'),
                ));
                $post->save();
                Session::set_flash('success', e('Added post #' . $post->id . '.'));
                Response::redirect(\Fuel\Core\Router::get('index'));

            } else {
                Session::set_flash('errors', $val->error());
                Session::set_flash('oldRequest', $val->validated());
            }
        }
        $this->template->title = 'Blog Post';
        $this->template->content = View::forge('posts/add');
    }

    private function beforeValidate()
    {
        $val = Validation::forge();
        $val->add_field('title', 'Title', 'required|min_length[3]');
        $val->add_field('category', 'Category', 'required|min_length[3]');
        $val->add_field('body', 'Body', 'required|min_length[8]');
        $val->add_field('tags', 'Tag', 'required|min_length[3]');
        return $val;
    }


}
