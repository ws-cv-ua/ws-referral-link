<?php

use yii\db\Migration;

class m170831_194815_init extends Migration
{
    public function tableNameLink()
    {
        return '{{%ReferralLink}}';
    }

    public function tableNameStatistic()
    {
        return '{{%ReferralLink_statistic}}';
    }

    public function safeUp()
    {
        $this->createTable($this->tableNameLink(), [
            'id' => $this->primaryKey(),
            'link' => $this->string(),
            'key' => $this->string(255)
        ]);

        $this->createTable($this->tableNameStatistic(), [
            'id' => $this->primaryKey(),
            'rl_id' => $this->integer(),
            'create_at' => $this->timestamp()->null()
        ]);

        $this->createIndex(
            'idx-statistic-link',
            $this->tableNameStatistic(),
            'rl_id'
        );

        $this->addForeignKey(
            'fx-statistic-link',
            $this->tableNameStatistic(),
            'rl_id',
            $this->tableNameLink(),
            'id',
            'CASCADE'
        );
    }

    public function safeDown()
    {
        $this->dropForeignKey(
            'fx-statistic-link',
            $this->tableNameStatistic()
        );

        $this->dropIndex(
            'idx-statistic-link',
            $this->tableNameStatistic()
        );

        $this->dropTable($this->tableNameStatistic());
        $this->dropTable($this->tableNameLink());
    }

    /*
    // Use up()/down() to run migration code without a transaction.
    public function up()
    {

    }

    public function down()
    {
        echo "m170831_194815_init cannot be reverted.\n";

        return false;
    }
    */
}
