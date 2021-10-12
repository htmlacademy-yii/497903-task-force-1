<?php

use yii\db\Migration;

/**
 * Class m211009_161744_create_reviews
 */
class m211009_161744_create_reviews extends Migration
{
  public function up()
  {
      $this->createTable('reviews', [
          'id' => $this->primaryKey(),
          'executor_id' => $this->integer()->notNull(),
          'customer_id' => $this->integer()->notNull(),
          'description' => $this->text()->defaultValue(null),
          'rate' => $this->integer()->notNull(),
      ]);
  }
  
  public function down()
  {
      $this->dropTable('reviews');
  }
}