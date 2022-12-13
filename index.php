<html>
 <head>
  <title>PHP Test</title>
 </head>
 <body>
 <?php echo '<p>Hello World</p>'; ?> 
 <?php
  $everything = get_defined_vars();
  ksort($everything);
 ?>
 </body>
</html>
