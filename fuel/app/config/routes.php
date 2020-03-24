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
    '/' => array('posts/index', 'name' => 'index'),
    'add-post' => array('posts/add', 'name' => 'add_post'),
    'view-post/(:id)' => array('posts/view/(:id)', 'name' => 'view_post'),
);
