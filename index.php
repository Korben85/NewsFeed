<!DOCTYPE html>

<html>

<head>
    <script type="module" src="bundle.js"></script>
</head>

<body>
    <?php
$file = fopen("feed.xml","w");
echo fwrite($file,"Hello World. Testing!");
fclose($file);
?>

    <?php
require_once 'HTTP/Request2.php';
$request = new HTTP_Request2();
$request->setUrl('https://mein-mmo.de/feed/');
$request->setMethod(HTTP_Request2::METHOD_GET);
$request->setConfig(array(
  'follow_redirects' => TRUE
));
try {
  $response = $request->send();
  if ($response->getStatus() == 200) {
    echo $response->getBody();
  }
  else {
    echo 'Unexpected HTTP status: ' . $response->getStatus() . ' ' .
    $response->getReasonPhrase();
  }
}
catch(HTTP_Request2_Exception $e) {
  echo 'Error: ' . $e->getMessage();
}
?>

</body>

</html>