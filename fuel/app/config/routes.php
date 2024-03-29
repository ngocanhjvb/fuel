<?php
/**
 * Fuel is a fast, lightweight, community driven PHP 5.4+ framework.
 *
 * @package    Fuel
 * @version    1.9-dev
 * @author     Fuel Development Team
 * @license    MIT License
 * @copyright  2010 - 2019 Fuel Development Team
 * @link       https://fuelphp.com
 */

return array(
    /**
     * -------------------------------------------------------------------------
     *  Default route
     * -------------------------------------------------------------------------
     *
     */

    '_root_' => 'posts/index',

    /**
     * -------------------------------------------------------------------------
     *  Page not found
     * -------------------------------------------------------------------------
     *
     */

    '_404_' => 'welcome/404',

    /**
     * -------------------------------------------------------------------------
     *  Example for Presenter
     * -------------------------------------------------------------------------
     *
     *  A route for showing page using Presenter
     *
     */

    'hello(/:name)?' => array('welcome/hello', 'name' => 'hello'),
    // Post
    '/' => array('posts/index', 'name' => 'index'),
    'add-post' => array('posts/add', 'name' => 'add_post'),
    'edit-post/(:id)' => array('posts/edit/(:id)', 'name' => 'edit_post'),
    'view-post/(:id)' => array('posts/view/(:id)', 'name' => 'view_post'),
    'set-tags/(:post)/(:tag)' => array('posts/addTag/(:post)/(:tag)', 'name' => 'set_tags'),
    'detach-tags/(:post)/(:tag)' => array('posts/removeTag/(:post)/(:tag)', 'name' => 'detach_tags'),

    // Category
    '/categories' => array('categories/index', 'name' => 'categories'),
    'add-category' => array('categories/add', 'name' => 'add_category'),
    'edit-category/(:id)' => array('categories/edit/(:id)', 'name' => 'edit_category'),
    'view-category/(:id)' => array('categories/view/(:id)', 'name' => 'view_category'),

    // Mail
    'send-mail' => array('posts/sendMail', 'name' => 'send_mail'),
);
