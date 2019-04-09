<?php
/**
 * Created by PhpStorm.
 * User: charlie
 * Date: 2018/4/8
 * Time: 上午11:29
 */

namespace singer\models\user\service\index;

class Update
{


    public function execute($data)
    {
        $indexBo = new \singer\models\user\bo\Index();

        $return = $indexBo->updateTitle($data['id']);

        return $return;
    }

}