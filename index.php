<?php
  require_once(__DIR__ . '/db.php');
  require_once(__DIR__ . '/hotSpring.php');
  try {
    $chosenPicture = new \Choice\HotSpring();
  } catch(Exception $e) {
    echo $e->getMessage();
    exit;
  }
  if($_SERVER['REQUEST_METHOD'] === 'POST') {
    $chosenPicture->send();
    
  }
  $error = $chosenPicture->error();
?>
<!DOCTYPE html>
<html lang="ja">
  <meta charset="utf-8">
  <title>投票ボックス</title>
  <link rel="stylesheet" href="styles.css">
</html>
<body>
  <h1>好きな画像を選んでください(2枚まで選べます)</h1>
  <form action="" method="post">
    <div class="hotSpring">
      <div class="picture" id="picture1" data-id="1"></div>
      <div class="picture" id="picture2" data-id="2"></div>
      <div class="picture" id="picture3" data-id="3"></div>
      <div class="picture" id="picture4" data-id="5"></div>
      <input type="hidden" id="chosenPicture" name="chosenPicture" value="">
      <input type="hidden" name="security" value="<?= h($_SESSION['security']); ?>">
    </div>
    <?php if (isset($error)) : ?>
      <div class="error"><?= h($error); ?></div>  
    <?php endif; ?>
    <div id="btn">投票結果</div>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.4/jquery.min.js"></script>
    <script src="index.js"></script>
  </form>
</body>
</html>