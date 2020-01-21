<?php

use yii\db\Migration;

/**
 * Class m180527_171204_init_languages
 */
class m180527_171204_init_languages extends Migration
{
    const TABLE_SOURCE_MESSAGE = '{{%source_message}}';
    const TABLE_MESSAGE = '{{%message}}';
    const TABLE_LANGUAGE = '{{%language}}';

    /**
     * {@inheritdoc}
     */
    public function safeUp()
    {
        $tableOptions = null;

        $this->createTable(self::TABLE_SOURCE_MESSAGE, [
            'id' => $this->primaryKey(),
            'category' => $this->string(),
            'message' => $this->text(),
        ], $tableOptions);

        $this->createTable(self::TABLE_MESSAGE, [
            'id' => $this->integer()->notNull(),
            'language' => $this->string(16)->notNull(),
            'translation' => $this->text(),
        ], $tableOptions);

        $this->addPrimaryKey('pk_message_id_language', self::TABLE_MESSAGE, ['id', 'language']);
        $this->addForeignKey('fk_message_source_message', self::TABLE_MESSAGE, 'id', self::TABLE_SOURCE_MESSAGE, 'id', 'CASCADE', 'RESTRICT');
        $this->createIndex('idx_source_message_category', self::TABLE_SOURCE_MESSAGE, 'category');
        $this->createIndex('idx_message_language', self::TABLE_MESSAGE, 'language');

        $this->createTable(self::TABLE_LANGUAGE, [
            'id' => $this->primaryKey(),
            'name' => $this->string(255),
            'code' => $this->string(255),
        ]);
    }

    /**
     * {@inheritdoc}
     */
    public function safeDown()
    {
        $this->dropForeignKey('fk_message_source_message', self::TABLE_MESSAGE);
        $this->dropTable(self::TABLE_MESSAGE);
        $this->dropTable(self::TABLE_SOURCE_MESSAGE);
        $this->dropTable(self::TABLE_LANGUAGE);
    }
}
