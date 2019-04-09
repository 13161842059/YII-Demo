<?php
namespace singer\controllers\user;

use singer\controllers\MyController;
use Yii;

/**
 * Site controller
 */
class IndexController extends MyController
{


    /**
     * {@inheritdoc}
     */
    public function actions()
    {
        return [
            'error' => [
                'class' => 'yii\web\ErrorAction',
            ],
        ];
    }

    /**
     *  eg: http://localhost/user/index/index?id=1
     * Displays homepage.
     *
     * @return string
     */
    public function actionIndex()
    {
        $param = [];
        $param['id'] = $this->get('id');
        $param['name'] = $this->get('name', 'test');
        return $this->_doFunction($param);
    }

    public function actionUpdate()
    {
        $param = [];
        $param['id'] = $this->request->get('id');
        return $this->_doFunction($param);
    }

    public function actionTestErr()
    {
        $param = [];
        $param['id'] = $this->request->get('id');
        return $this->_doFunction($param);
    }


}
