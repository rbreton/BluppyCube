<?php 
  include_once("inc/config.inc.php");
?>
<!DOCTYPE html>
<html>
    
<head>
  <meta charset="utf-8" />
  <title>Bluppy Cube</title>

  <style>
    #game_div {
      width: 400px;
      margin: auto;
      margin-top: 50px;
    }
  </style>

  <script type="text/javascript" src="phaser.min.js"></script>
  <script type="text/javascript" src="main.js"></script>
</head>

<body>

  <div id="game_div"></div>
  <div id="txtHint"><b>Person info will be listed here.</b></div>
</body>

</html>