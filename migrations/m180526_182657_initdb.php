<?php

use yii\db\Migration;

/**
 * Class m180526_182657_initdb
 */
class m180526_182657_initdb extends Migration
{
    const TABLE_REQUEST = '{{%request}}';
    const TABLE_SPECIALIZATION = '{{%specialization}}';
    const TABLE_SCIENCE_DEGREE = '{{%science_degree}}';

    /**
     * {@inheritdoc}
     */
    public function safeUp()
    {
        $this->createTable(self::TABLE_SCIENCE_DEGREE, [
            'id' => $this->primaryKey(),
            'value' => $this->string('255')->notNull(),
        ]);

        $this->createTable(self::TABLE_SPECIALIZATION, [
            'id' => $this->primaryKey(),
            'value' => $this->string('255')->notNull(),
        ]);

        $this->createTable(self::TABLE_REQUEST, [
            'id' => $this->primaryKey(),
            'firstname' => $this->string(255)->notNull(),
            'lastname' => $this->string(255)->notNull(),
            'fathername' => $this->string(255)->notNull(),
            'specialization_id' => $this->integer()->defaultValue(null),
            'science_degree_id' => $this->integer()->defaultValue(null),
            'description' => $this->text(),
            'created_at' => $this->dateTime()->defaultExpression('CURRENT_TIMESTAMP'),
            'willing_at' => $this->dateTime()->notNull(),
            'is_paid' => $this->integer()->defaultValue('0')
        ]);

        $this->addForeignKey('request_specialization_fk', self::TABLE_REQUEST, 'specialization_id', self::TABLE_SPECIALIZATION, 'id', 'SET NULL', 'CASCADE');
        $this->addForeignKey('request_science_degree_fk', self::TABLE_REQUEST, 'science_degree_id', self::TABLE_SCIENCE_DEGREE, 'id', 'SET NULL', 'CASCADE');
    }

    /**
     * {@inheritdoc}
     */
    public function safeDown()
    {
       $this->dropTable(self::TABLE_REQUEST);
       $this->dropTable(self::TABLE_SPECIALIZATION);
       $this->dropTable(self::TABLE_SCIENCE_DEGREE);

    }
}
