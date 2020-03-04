<?php

namespace Choice;

class HotSpring {
  private $pdo;

  public function __construct() {
    $this->startDb();
  }

  private function checkAnswer() {
    if(
      !isset($_POST['chosenPicture']) ||
      !in_array($_POST['chosenPicture'], [1,2,3,4])
    ) {
      throw new \Exception('答えが間違っています！');
    }
  }

  public function send() {
    try {
      $this->checkAnswer();
      $this->save();
      header('Location: http://' . $_SERVER['HTTP_HOST'] . '/final.php');
    } catch(\Exception $e) {
      header('Location:: http://' . $_SERVER['HTTP_HOST']);
    }
  }

  public function startDb() {
    try {
      $this->pdo = new \PDO(DSN, DATABASE_USERNAME, DATABASE_PASSWORD);
      $this->pdo->setAttribute(\PDO::ATTR_ERRMODE, \PDO::ERRMODE_EXCEPTION);
    } catch(\PDOException $e) {
      exit('エラーが発生しました！' . $e->getMessage());
    }
  }
}