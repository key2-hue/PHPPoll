<?php

namespace Choice;

class HotSpring {
  private $pdo;
  public function startDb() {
    try {
      $this->pdo = new \PDO(DSN, DATABASE_USERNAME, DATABASE_PASSWORD);
      $this->pdo->setAttribute(\PDO::ATTR_ERRMODE, \PDO::ERRMODE_EXCEPTION);
    } catch(\PDOException $e) {
      exit('エラーが発生しました！' . $e->getMessage());
    }
  }
}