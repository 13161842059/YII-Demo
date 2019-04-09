<?php
/**
 * Created by PhpStorm.
 * User: charlie
 * Date: 2018/4/8
 * Time: 上午11:29
 */

namespace singer\models\user\service\index;

use singer\library\BizException;

class TestErr
{


    public function execute($data)
    {
        echo 111;
        if (!isset($data['name']))
            throw new BizException(BizException::PARAM_ERROR);

        echo 222;
        return 'done!!!';
    }

}