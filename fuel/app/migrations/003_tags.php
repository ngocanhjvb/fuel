<?php

namespace Fuel\Migrations;

class Tags
{

    function up()
    {
        \DBUtil::create_table('tags', array(
            'id' => array('type' => 'int', 'auto_increment' => true),
            'name' => array('type' => 'varchar', 'constraint' => 255),
            'create_date' => array('type' => 'datetime', 'constraint' => 4),
        ), array('id'));
    }

    function down()
    {
        \DBUtil::drop_table('tags');
    }
}
