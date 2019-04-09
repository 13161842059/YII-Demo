<?php

namespace singer\middlewares;
use singer\models\user\service\index\Login;
use yii\web\Request;
/**
 * Created by PhpStorm.
 * User: duanwei
 * Date: 2018/4/13
 * Time: 下午2:26
 */

class Authenticate implements MiddlewareImp
{
    public $tokenParam = 'token';

    public function handle(Request $request)
    {
        if(!\Yii::$app->user->enableSession){   //token
            $accessToken = $request->getHeaders()->get($this->tokenParam) ? $request->getHeaders()->get($this->tokenParam) : $request->get($this->tokenParam);
            if (is_string($accessToken) && $userId = \Yii::$app->redis->get(Login::LOGIN_TOKEN.$accessToken)) {
                $userBo = new \singer\models\user\bo\User();
                $user = $userBo->getUser($userId);
                if($user){
                    //\Yii::$app->session->set('token',$accessToken);
                    //\Yii::$app->session->set('userId',$user['id']);
                    return true;
                }
                /*
                $user = \Yii::$app->getUser();
                $identity = $user->loginByAccessToken($accessToken, get_class($this));
                if ($identity !== null) {
                    return true;
                }*/

            }
            throw new MidException("token unauthorized",10010004);
        }else{  //session
            if(\Yii::$app->user->isGuest){
                throw new MidException("session not exists",10010005);
            }
        }
        return true;
    }


}