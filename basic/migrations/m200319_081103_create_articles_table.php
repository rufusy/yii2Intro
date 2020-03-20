<?php

use yii\db\Migration;

/**
 * Handles the creation of table `{{%articles}}`.
 */
class m200319_081103_create_articles_table extends Migration
{
    /**
     * {@inheritdoc}
     */
    public function safeUp()
    {
        $this->createTable('{{%articles}}', [
            'id' => $this->primaryKey(),
            'title' => $this->string(1024)->notNull(),
            'slug' => $this->string(1024)->notNull(),
            'body' => $this->text()->notNull(),
            'created_at' => $this->integer(),
            'updated_at' => $this->integer(),
            'created_by' => $this->integer()->notNull(),
        ]);

        // creates index for columns created_by and updated_by
        $this->createIndex(
            'article_user_created_by_idx',
            'articles',
            'created_by'
        );
      
        // aadd foreign keys for table users
        $this->addForeignKey(
            'article_user_created_by_fk',
            'articles',
            'created_by',
            'users',
            'id',
            'CASCADE'
        );
    }

    /**
     * {@inheritdoc}
     */
    public function safeDown()
    {
        // drops index key for columns created_by and updated_by
        $this->dropIndex(
            'article_user_created_by_idx',
            'articles'
        );
       
        // drop fk for table users
        $this->dropForeignKey(
            'article_user_created_by_fk',
            'articles'
        );
       

        $this->dropTable('{{%articles}}');
    }
}
