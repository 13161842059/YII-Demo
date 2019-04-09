<?php
/**
 * Created by PhpStorm.
 * User: charlie
 * Date: 2018/4/8
 * Time: 上午11:29
 */

namespace singer\models\user\service\index;

use singer\library\BizException;
use singer\library\Validation;

class Index
{


    public function execute($data)
    {
        $valid = new Validation($data);
        $valid->add_rules('id', 'required');
        $valid->add_rules('name', 'required', 'mb_length[1,4]');
        if (!$valid->validate()) {
            throw new BizException(BizException::PARAM_ERROR );
        }



        $indexBo = new \singer\models\user\bo\Index();

        $return = $indexBo->getUser($data['id']);
        return $return;
    }

}