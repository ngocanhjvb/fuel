<?php

namespace Fuel\Tasks;


use Fuel\Core\Str;

class Tags
{
    public static function run($tagName = null)
    {
        $tag = \Model_Tag::forge(array(
            'name' => $tagName ? $tagName : Str::random('alnum', 16)
        ));
        $tag->save();
        echo 'Create a Tag name is' . $tag->name;
    }
}


