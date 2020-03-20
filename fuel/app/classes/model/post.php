<?php


class Model_Post extends Orm\Model
{
    protected static $_table_name = 'posts';

    protected static $_primary_key = array('id');

    protected static $_properties = array('id', 'title', 'category', 'body', 'tags', 'create_date');
}
