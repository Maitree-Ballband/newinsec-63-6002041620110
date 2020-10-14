<?php

namespace common\component;

class User extends \yii\web\User
{
    public $identityClass = '\common\models\User';
    public function checkAccess($operation, $params = [], $allowCaching = true) {
        // Always return true when SuperAdmin user
        
        echo 'test';
        exit;
        return false;
        
        if (\Yii::$app->user->id == 2 && \Yii::$app->user->status == 10)
        
        {
            return true;
        }
        return parent::can($operation, $params, $allowCaching);
    }
}

