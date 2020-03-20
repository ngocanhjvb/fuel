<?php

namespace Model;

class Model_Posts extends \Model_Crud
{
    // Set the table to use
    protected static $_table_name = 'posts';

    protected static $_created_at = 'create_date';

    protected static $_mysql_timestamp = true;
}
