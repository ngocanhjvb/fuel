<?php

namespace Fuel\Migrations;

class Posts
{

    function up()
    {
        \DBUtil::create_table('posts', array(
            'id' => array('type' => 'int', 'auto_increment' => true),
            'title' => array('type' => 'varchar', 'constraint' => 255),
            'category' => array('type' => 'varchar', 'constraint' => 255),
            'body' => array('type' => 'text'),
            'tags' => array('type' => 'varchar', 'constraint' => 255),
            'create_date' => array('type' => 'datetime', 'constraint' => 6),
        ), array('id'));
    }

    function down()
    {
        \DBUtil::drop_table('posts');
    }
}
