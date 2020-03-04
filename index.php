<?php
  require_once(__DIR__ . '/db.php');
?>
<!DOCTYPE html>
<html lang="ja">
  <meta charset="utf-8">
  <title>投票ボックス</title>
  <link rel="stylesheet" href="styles.css">
</html>
<body>
  <h1>好きな画像を選んでください</h1>
  <form action="" method="post">
    <div class="hotSpring">
      <div class="picture" id="picture1" data-id="1"></div>
      <div class="picture" id="picture2" data-id="2"></div>
      <div class="picture" id="picture3" data-id="3"></div>
      <div class="picture" id="picture4" data-id="4"></div>
    </div>
    <div id="btn">投票結果</div>
  </form>
</body>
</html>