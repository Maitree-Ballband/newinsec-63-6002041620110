<?php

use yii\db\Migration;

/**
 * Class m201022_093626_create_item_for_rbac
 */
class m201022_093626_create_item_for_rbac extends Migration
{
    /**
     * {@inheritdoc}
     */
    public function safeUp()
    {
        $auth = Yii::$app->authManager;

        $admin = $auth->createRole('admin');
        $admin->description = 'Admin';
        $auth->add($admin);
        
        $author = $auth->createRole('author');
        $author->description = 'Author';
        $auth->add($author);

        $superAdmin = $auth->createRole('super_admin');
        $superAdmin->description = 'Super Admin';
        $auth->add($superAdmin);
 
        //printf_r($auth);
        //return false;
    }

    /**
     * {@inheritdoc}
     */
    public function safeDown()
    {
        $auth = Yii::$app->authManager;

        $admin = $auth->getRole('admin');
        if($admin){
            $auth->remove($admin);
        }

        $author = $auth->getRole('author');
        if($author){
            $auth->remove($author);
        }

        $superAdmin = $auth->getRole('super_admin');
        if($superAdmin){
            $auth->remove($superAdmin);
        }


        //echo "m201022_093626_create_item_for_rbac cannot be reverted.\n";

        return false;
    }

    /*
    // Use up()/down() to run migration code without a transaction.
    public function up()
    {

    }

    public function down()
    {
        echo "m201022_093626_create_item_for_rbac cannot be reverted.\n";

        return false;
    }
    */
}
