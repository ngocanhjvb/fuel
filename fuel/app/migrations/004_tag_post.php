<?php

namespace Fuel\Migrations;

class Tag_Post
{

    function up()
    {
        \DBUtil::create_table('tag_post', array(
            'id' => array('type' => 'int', 'auto_increment' => true),
            'post_id' => array('type' => 'int', 'constraint' => 10),
            'tag_id' => array('type' => 'int', 'constraint' => 10),
        ), array('id'));
    }

    function down()
    {
        \DBUtil::drop_table('tag_post');
    }
}
