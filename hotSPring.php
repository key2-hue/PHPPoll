<?php



namespace Choice;

require_once(__DIR__ . '/db.php');


class HotSpring {
  private $pdo;

  public function __construct() {
    $this->startDb();
    $this->security();
  }

  private function checkAnswer() {
    if(
      !isset($_POST['chosenPicture']) ||
      !in_array($_POST['chosenPicture'], [1,2,3,4])
    ) {
      throw new \Exception('答えが間違っています！');
    }
  }

  public function security() {
    if(!isset($_SESSION['security'])) {
      $_SESSION['security'] = bin2hex(openssl_random_pseudo_bytes(16));
    };
  }

  public function checkSecurity() {
    if(
      !isset($_SESSION['security']) ||
      !isset($_POST['security']) ||
      $_SESSION['security'] !== $_POST['security']
    ) {
      throw new \Exception('セキュリティー面で問題あり');
    }
  }

  private function save() {
    $pic = 'insert into pictures (poll, created) values (:ans, now())';
    $choice = $this->pdo->prepare($pic);
    $choice->bindValue(':ans', (int)$_POST['chosenPicture'], \PDO::PARAM_INT);
    $choice->execute();
    exit;
  }

 

  public function send() {
    try {
      $this->checkSecurity();
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