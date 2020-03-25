<?php

class Controller_Categories extends \Fuel\Core\Controller_Template
{
    public $template = 'categories';

    public function action_index()
    {
        $categories = Model_Category::find('all');
        $data = ['categories' => $categories];
        $this->template->title = 'Category_Post';
        $this->template->content = View::forge('categories/index', $data, false);
    }


    public function action_view()
    {
        $id = $this->param('id');
        $category = Model_Category::find($id);
        $data = ['category' => $category];
        $this->template->title = 'Category_Post';
        $this->template->content = View::forge('categories/view', $data, false);
    }

    public function action_add()
    {
        if (Input::method() == 'POST') {
            if (!\Security::check_token()) {
                Session::set_flash('error', 'Token is not valid');
                Response::redirect(\Fuel\Core\Router::get('index'));
            } else {
                $val = $this->beforeValidate();

                if ($val->run()) {
                    $category = Model_Category::forge(array(
                        'name' => Input::post('name'),
                    ));
                    $category->save();
                    Session::set_flash('success', e('Added category #' . $category->name . '.'));
                    Response::redirect(\Fuel\Core\Router::get('categories'));

                } else {
                    Session::set_flash('errors', $val->error());
                    Session::set_flash('oldRequest', $val->validated());
                }
            }
        }
        $this->template->title = 'Category_Post';
        $this->template->content = View::forge('categories/add');
    }

    private function beforeValidate()
    {
        $val = Validation::forge();
        $val->add_field('name', 'Name', 'required|min_length[3]');
        return $val;
    }


}
