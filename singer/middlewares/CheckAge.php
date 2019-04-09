<?php

namespace singer\middlewares;
use yii\web\Request;
/**
 * Created by PhpStorm.
 * User: duanwei
 * Date: 2018/4/13
 * Time: 下午2:26
 */

class CheckAge implements MiddlewareImp
{
    public function handle(Request $request)
    {
        throw new MidException(__CLASS__,1);
    }


}