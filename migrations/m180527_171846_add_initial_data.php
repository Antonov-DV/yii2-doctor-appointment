<?php

use yii\db\Migration;

/**
 * Class m180527_171846_add_initial_data
 */
class m180527_171846_add_initial_data extends Migration
{
    const TABLE_REQUEST        = '{{%request}}';
    const TABLE_SPECIALIZATION = '{{%specialization}}';
    const TABLE_SCIENCE_DEGREE = '{{%science_degree}}';
    const TABLE_SOURCE_MESSAGE = '{{%source_message}}';
    const TABLE_MESSAGE        = '{{%message}}';
    const TABLE_LANGUAGE       = '{{%language}}';

    /**
     * {@inheritdoc}
     */
    public function safeUp()
    {
        $this->batchInsert(self::TABLE_SPECIALIZATION, ['id', 'value'], [
            ['1', "Therapist"],
            ['2', "Surgeon"],
            ['3', "Pediatrician"],
        ]);

        $this->batchInsert(self::TABLE_SCIENCE_DEGREE, ['id', 'value'], [
            ['1', "Specialist"],
            ['2', "Candidate of sciences"],
            ['3', "Doctor"],
        ]);

        $this->batchInsert(self::TABLE_LANGUAGE, ['id', 'name', 'code'], [
            ['1', 'English', 'en-US'],
            ['2', 'Russian', 'ru-RU'],
        ]);

        $this->batchInsert(self::TABLE_SOURCE_MESSAGE, ['id', 'category', 'message'], [
            ['1', 'app', "Therapist"],
            ['2', 'app', "Surgeon"],
            ['3', 'app', "Pediatrician"],
            ['4', 'app', "Specialist"],
            ['5', 'app', "Candidate of sciences"],
            ['6', 'app', "Doctor"],
        ]);

        $this->batchInsert(self::TABLE_MESSAGE, ['id', 'language', 'translation'], [
            ['1', 'en-US', "Therapist"],
            ['2', 'en-US', "Surgeon"],
            ['3', 'en-US', "Pediatrician"],
            ['4', 'en-US', "Specialist"],
            ['5', 'en-US', "Candidate of sciences"],
            ['6', 'en-US', "Doctor"],
            ['1', 'ru-RU', "Терапевт"],
            ['2', 'ru-RU', "Хирург"],
            ['3', 'ru-RU', "Педиатр"],
            ['4', 'ru-RU', "Специалист"],
            ['5', 'ru-RU', "Кандидат наук"],
            ['6', 'ru-RU', "Доктор наук"],
        ]);
    }

    /**
     * {@inheritdoc}
     */
    public function safeDown()
    {
        $this->delete(self::TABLE_REQUEST);
        $this->delete(self::TABLE_SPECIALIZATION);
        $this->delete(self::TABLE_SCIENCE_DEGREE);
        $this->delete(self::TABLE_SOURCE_MESSAGE);
        $this->delete(self::TABLE_MESSAGE);
        $this->delete(self::TABLE_LANGUAGE);
    }


}
