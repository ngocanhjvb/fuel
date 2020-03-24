<?php


class Model_Post extends Orm\Model
{
    protected static $_table_name = 'posts';

    protected static $_primary_key = array('id');

    protected static $_properties = array('id', 'title', 'category', 'body', 'tags', 'create_date');

    protected static $_observers = array(
        'Orm\\Observer_CreatedAt' => array(
            'events' => array('before_insert'),
            'mysql_timestamp' => true,
            'property' => 'create_date',
            'overwrite' => true,
        ),
    );
}
