<?php

namespace Fuel\Migrations;

class Categories
{

    function up()
    {
        \DBUtil::create_table('categories', array(
            'id' => array('type' => 'int', 'auto_increment' => true),
            'name' => array('type' => 'varchar', 'constraint' => 255),
            'create_date' => array('type' => 'datetime', 'constraint' => 4),
        ), array('id'));
    }

    function down()
    {
        \DBUtil::drop_table('categories');
    }
}
