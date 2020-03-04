<?php



namespace Choice;

require_once(__DIR__ . '/db.php');


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
      $_SESSION['error'] = $e->getMessage();
      // var_dump($_SESSION['err']);
      header('Location: http://' . $_SERVER['HTTP_HOST']);
    }
    exit;
  }

  public function error() {
    $error = null;
    if(isset($_SESSION['error'])) {
      $error = $_SESSION['error'];
      unset($_SESSION['error']);
    }
    return $error;
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