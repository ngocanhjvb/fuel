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
            $images = $this->uploadImage();
            $imagesErr = Upload::get_errors();
            if ($val->run() && empty($imagesErr)) {
                $post = Model_Post::forge(array(
                    'title' => Input::post('title'),
                    'category_id' => Input::post('category_id'),
                    'body' => Input::post('body'),
                    'images' => $images[0]['saved_as'],
                ));
                $post->save();
                Session::set_flash('success', e('Added post #' . $post->id . '.'));
                Response::redirect(\Fuel\Core\Router::get('index'));

            } else {
                $errors = $val->error();
                if (!empty($imagesErr)) {
                    $errors['images'] = $imagesErr[0]['errors'][0]['message'];
                }
                Session::set_flash('errors', $errors);
                Session::set_flash('oldRequest', $val->validated());
            }
        }
        $this->template->title = 'Blog Post';
        $this->template->content = View::forge('posts/add', $data);
    }


    public function action_edit()
    {
        $post = Model_Post::find($this->param('id'));
        $categories = Model_Category::find('all');
        $data = [
            'categories' => $categories,
            'post' => $post
        ];
        if (Input::method() == 'POST') {
            $val = $this->beforeValidate();
            $images = $this->uploadImage();
            $imagesErr = Upload::get_errors();
            if ($val->run() && empty($imagesErr)) {
                $post->title = Input::post('title');
                $post->category_id = Input::post('category_id');
                $post->body = Input::post('body');
                $post->saved_as = $images[0]['saved_as'];
                $post->save();
                Session::set_flash('success', e('Edit post #' . $post->name . '.'));
                Response::redirect(\Fuel\Core\Router::get('index'));

            } else {
                $errors = $val->error();
                if (!empty($imagesErr)) {
                    $errors['images'] = $imagesErr[0]['errors'][0]['message'];
                }
                Session::set_flash('errors', $errors);
                Session::set_flash('oldRequest', $val->validated());
            }
        }
        $this->template->title = 'Blog Post';
        $this->template->content = View::forge('posts/edit', $data);
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


    public function action_sendMail()
    {
        if (Input::method() == 'POST') {
            $val = $this->beforeValidateMail();
            if ($val->run()) {
                try {
                    $content['content'] = Input::post('body');
                    $body = View::forge('mails/template', $content);
                    \Package::load('email');
                    Email::forge()
                        ->from('testmaillaravel64@gmail.com')
                        ->to(Input::post('email_address'))
                        ->subject(Input::post('title'))
                        ->html_body($body)
                        ->send();
                    Session::set_flash('success', e('Send Mail to' . Input::post('email_address')));
                    Response::redirect_back();

                } catch (EmailSendingFailedException $exc) {
                    Log::error($exc->getMessage());
                }


            } else {
                $errors = $val->error();
                Session::set_flash('errors', $errors);
                Session::set_flash('oldRequest', $val->validated());
            }
        }
        $this->template->title = 'Send Mail';
        $this->template->content = View::forge('posts/mail');
    }


    private function beforeValidate()
    {
        $val = Validation::forge();
        $val->add_field('title', 'Title', 'required|min_length[3]');
        $val->add_field('category_id', 'Category', 'required');
        $val->add_field('body', 'Body', 'required|min_length[8]');
        return $val;
    }


    private function beforeValidateMail()
    {
        $val = Validation::forge();
        $val->add_field('title', 'Title', 'required|min_length[3]');
        $val->add_field('email_address', 'Email Address', 'required|valid_email');
        $val->add_field('body', 'Body', 'required|min_length[8]');
        return $val;
    }


    private function uploadImage()
    {
        $config = array(
            'path' => DOCROOT . DS . 'assets' . DS . 'img' . DS . 'posts',
            'randomize' => true,
            'ext_whitelist' => array('png'),
        );
        Upload::process($config);
        if (Upload::is_valid()) {
            Upload::save();
            return Upload::get_files();
        }
    }


}
