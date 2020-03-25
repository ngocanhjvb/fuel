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
        $allTags = Model_Tag::find('all');
        $post = Model_Post::find($this->param('id'));
        $currentTags = $post->tags;
        $tags = array_diff_key($allTags, $currentTags);

        $data = [
            'post' => $post,
            'tags' => $tags,
            'currentTags' => $currentTags
        ];
        $this->template->title = 'Blog Post';
        $this->template->content = View::forge('posts/view', $data, false);
    }

    public function action_add()
    {
        $categories = Model_Category::find('all');
        $data = ['categories' => $categories];
        if (Input::method() == 'POST') {
            $val = $this->beforeValidate();

            if ($val->run()) {
                $post = Model_Post::forge(array(
                    'title' => Input::post('title'),
                    'category_id' => Input::post('category_id'),
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
        $this->template->content = View::forge('posts/add', $data);
    }


    public function action_addTag()
    {
        $post = Model_Post::find($this->param('post'));
        $post->tags[] = Model_Tag::find($this->param('tag'));
        $post->save();
        Session::set_flash('success', e('Added tag'));
        \Fuel\Core\Response::redirect_back();
    }

    public function action_removeTag()
    {
        $post = Model_Post::find($this->param('post'));
        unset($post->tags[$this->param('tag')]);
        $post->save();
        Session::set_flash('success', e('Removed tag'));
        \Fuel\Core\Response::redirect_back();
    }


    private function beforeValidate()
    {
        $val = Validation::forge();
        $val->add_field('title', 'Title', 'required|min_length[3]');
        $val->add_field('category_id', 'Category', 'required');
        $val->add_field('body', 'Body', 'required|min_length[8]');
        $val->add_field('tags', 'Tag', 'required|min_length[3]');
        return $val;
    }


}
