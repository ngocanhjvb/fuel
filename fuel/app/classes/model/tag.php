<?php


class Model_Tag extends Orm\Model
{
    protected static $_table_name = 'tags';

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

    protected static $_many_many = array(
        'posts' => array(
            'key_from' => 'id',
            'key_through_from' => 'tag_id', // column 1 from the table in between, should match a posts.id
            'table_through' => 'tag_post', // both models plural without prefix in alphabetical order
            'key_through_to' => 'post_id', // column 2 from the table in between, should match a users.id
            'model_to' => 'Model_Post',
            'key_to' => 'id',
            'cascade_save' => true,
            'cascade_delete' => false,
        )
    );
}
