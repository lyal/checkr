<?php
/**
 * Created by PhpStorm.
 * User: lyal
 * Date: 10/10/17
 * Time: 7:14 PM
 */

namespace PullRequest\Checkr\Facades;

class CheckrFacade extends \Illuminate\Support\Facades\Facade
{
    protected static function getFacadeAccessor()
    {
        return 'lyal.checkr';
    }
}