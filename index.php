<!DOCTYPE html>

<html>

<head>
    <!-- HTML meta URL redirect-->
    <?php
    $actual_link = (isset($_SERVER['HTTPS']) && $_SERVER['HTTPS'] === 'on' ? "https" : "http") . "://$_SERVER[HTTP_HOST]$_SERVER[REQUEST_URI]/feed.xml";
    ?>
    <meta http-equiv="refresh" content="1; url=<?php echo $actual_link ?>">

</head>

<body>
    <?php
      $file = fopen("feed.xml","w");
      fwrite($file,$response = file_get_contents("http://mein-mmo.de/feed/"));
      fclose($file);
      // echo $response;
    ?>
</body>

</html>