<?php

namespace Fuel\Migrations;

class Posts
{

    function up()
    {
        \DBUtil::create_table('posts', array(
            'id' => array('type' => 'int', 'auto_increment' => true),
            'title' => array('type' => 'varchar', 'constraint' => 255),
            'category_id' => array('type' => 'int', 'constraint' => 10),
            'body' => array('type' => 'text'),
            'tags' => array('type' => 'varchar', 'constraint' => 255),
            'create_date' => array('type' => 'datetime', 'constraint' => 4),
        ), array('id'));
    }

    function down()
    {
        \DBUtil::drop_table('posts');
    }
}
