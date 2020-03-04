<?php

require_once(__DIR__ . '/db.php');
require_once(__DIR__ . '/hotSpring.php');

try {
  $pictureNum = new \Choice\HotSpring();
} catch(Exception $e) {
  echo $e->getMessage();
  exit;
}

$num = $pictureNum->results();

?>

<!DOCTYPE html>
<html lang="ja">
<head>
  <meta charset="utf-8">
  <title>現時点での投票数</title>
  <link rel="stylesheet" href="styles.css">
</head>
<body>
  <h1>現時点での投票数</h1>
  <div class="hotSpring">
    <?php for($i = 1; $i <= 4; $i++) : ?>
      <div class="picture" id="picture<?= h($i); ?>"><?= h($num[$i - 1]); ?></div>
    <?php endfor; ?>
  </div>
  <a href="/"><div id="btn">戻る</div></a>
</body>
</html>