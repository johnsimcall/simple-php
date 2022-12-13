<html>
 <head>
  <title>PHP Test</title>
 </head>

 <body>
 <?php echo '<h1>Hello World!</h1>'; 
       echo 'You requested the contents of: <b>'; echo $_SERVER['HTTP_HOST']; echo '</b><br>';
       echo 'The Pod that answered is: <b>'; echo $_ENV['HOSTNAME']; echo '</b> with an internal IP of <b>'; echo $_SERVER['SERVER_ADDR']; echo '</b><br><br>';
 
       if (empty($_SERVER['HTTP_X_FORWARDED_FOR'])) {
         echo 'Direct connection, no proxy or HTTP_X_FORWARD_FOR not set.<br>You appear to be: <b>'; echo $_SERVER['REMOTE_ADDR']; echo '</b><br>';
       } else {
         echo 'The proxy says you are: <b>'; echo $_SERVER['HTTP_X_FORWARDED_FOR']; echo '</b><br>';
         echo 'REMOTE_ADDR is: <b>'; echo $_SERVER['REMOTE_ADDR']; echo '</b><br>';
       }
 ?>

<!--
 <?php
  $everything = get_defined_vars();
  ksort($everything);
  echo '<pre>'; print_r($everything); echo '</pre>';
 ?>
-->

 <p></p>
 <?php phpinfo(); ?>

 </body>
</html>
