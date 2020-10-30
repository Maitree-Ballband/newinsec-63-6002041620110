<?php

use yii\db\Migration;

/**
 * Class m201030_044515_create_assign_user_to_role
 */
class m201030_044515_create_assign_user_to_role extends Migration
{
    /**
     * {@inheritdoc}
     */
    public function safeUp()
    {
        $auth = Yii::$app->authManager;
        $auth->init();
    
        $author=$auth->getRole('author');
        $admin=$auth->getRole('admin');
        $superadmin=$auth->getRole('super_admin');
    
        $auth->assign($author, 1);
        $auth->assign($admin, 2);
        $auth->assign($superadmin, 3);
          
        return true;
        
    }

    /**
     * {@inheritdoc}
     */
    public function safeDown()
    {
        
        $auth = Yii::$app->authManager;
        $auth->init();
    
        $author =$auth->getRole('author');
        $admin=$auth->getRole('admin');
        $superadmin=$auth->getRole('super_admin');
    
        $auth->revoke($author, 1);
        $auth->revoke($admin, 2);
        $auth->revoke($superadmin, 3);
    
        return false;
        
    }

    /*
    // Use up()/down() to run migration code without a transaction.
    public function up()
    {

    }

    public function down()
    {
        echo "m201030_044515_create_assign_user_to_role cannot be reverted.\n";

        return false;
    }
    */
}
