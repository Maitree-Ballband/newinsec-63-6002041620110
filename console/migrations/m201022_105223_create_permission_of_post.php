<?php

use yii\db\Migration;

/**
 * Class m201022_105223_create_permission_of_post
 */
class m201022_105223_create_permission_of_post extends Migration
{
    /**
     * {@inheritdoc}
     */
    public function safeUp()
    {
        $auth = Yii::$app->authManager;

        $create = $auth->createPermission('post-create');
        $create->description = 'Create a post';
        $auth->add($create);

        $index = $auth->createPermission('post-index');
        $index->description = 'List a post';
        $auth->add($index);

        $update = $auth->createPermission('post-update');
        $update->description = 'Update a post';
        $auth->add($update);

        $view = $auth->createPermission('post-view');
        $view->description = 'View a post';
        $auth->add($view);

        $delete = $auth->createPermission('post-delete');
        $delete->description = 'Delete a post';
        $auth->add($delete);

        return false;
    }

    /**
     * {@inheritdoc}
     */
    public function safeDown()
    {

        $auth = Yii::$app->authManager;

        $create = $auth->getPermission('post-create');
        if($create){
            $auth->remove($create);
        }

        $index = $auth->getPermission('post-index');
        if($index){
            $auth->remove($index);
        }

        $update = $auth->getPermission('post-update');
        if($update){
            $auth->remove($update);
        }
        $view = $auth->getPermission('post-view');
        if($view){
            $auth->remove($view);
        }

        $delete = $auth->getPermission('post-delete');
        if($delete){
            $auth->remove($delete);
        }

        //echo "m201022_105223_create_permission_of_post cannot be reverted.\n";

        return false;
    }

    /*
    // Use up()/down() to run migration code without a transaction.
    public function up()
    {

    }

    public function down()
    {
        echo "m201022_105223_create_permission_of_post cannot be reverted.\n";

        return false;
    }
    */
}
