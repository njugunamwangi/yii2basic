<?php

use yii\db\Migration;

/**
 * Handles the creation of table `{{%user}}`.
 */
class m210902_125159_create_user_table extends Migration
{
    /**
     * {@inheritdoc}
     */
    public function safeUp()
    {
        $this->createTable('{{%user}}', [
            'id' => $this->primaryKey(),
            'first_name' => $this->string(55)->notNull(),
            'last_name' => $this->string(55)->notNull(),
            'username' => $this->string(55)->notNUll(),
            'password' => $this->string(255)->notNull(),
            'auth_key' => $this->string(255)->notNull(),
            'access_token' => $this->string(255)->notNull(),
        ]);
    }

    /**
     * {@inheritdoc}
     */
    public function safeDown()
    {
        $this->dropTable('{{%user}}');
    }
}
