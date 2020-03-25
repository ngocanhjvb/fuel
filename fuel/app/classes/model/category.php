<?php


class Model_Category extends Orm\Model
{
    protected static $_table_name = 'categories';

    protected static $_primary_key = array('id');

    protected static $_properties = array('id', 'name', 'create_date');

    protected static $_observers = array(
        'Orm\\Observer_CreatedAt' => array(
            'events' => array('before_insert'),
            'mysql_timestamp' => true,
            'property' => 'create_date',
            'overwrite' => true,
        ),
    );


    protected static $_has_many = array(
        'posts' => array(
            'key_from' => 'id',
            'model_to' => 'Model_Post',
            'key_to' => 'category_id',
            'cascade_save' => true,
            'cascade_delete' => false,
        )
    );
}
