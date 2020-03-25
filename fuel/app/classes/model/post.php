<?php


class Model_Post extends Orm\Model
{
    protected static $_table_name = 'posts';

    protected static $_primary_key = array('id');

    protected static $_properties = array('id', 'title', 'category_id', 'body', 'tags', 'create_date');

    protected static $_observers = array(
        'Orm\\Observer_CreatedAt' => array(
            'events' => array('before_insert'),
            'mysql_timestamp' => true,
            'property' => 'create_date',
            'overwrite' => true,
        ),
    );

    protected static $_belongs_to = array(
        'category' => array(
            'key_from' => 'category_id',
            'model_to' => 'Model_Category',
            'key_to' => 'id',
            'cascade_save' => true,
            'cascade_delete' => false,
        )
    );

    protected static $_many_many = array(
        'tags' => array(
            'key_from' => 'id',
            'key_through_from' => 'post_id', // column 1 from the table in between, should match a posts.id
            'table_through' => 'tag_post', // both models plural without prefix in alphabetical order
            'key_through_to' => 'tag_id', // column 2 from the table in between, should match a users.id
            'model_to' => 'Model_Tag',
            'key_to' => 'id',
            'cascade_save' => true,
            'cascade_delete' => false,
        )
    );
}
