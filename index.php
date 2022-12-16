<html>
 <head>
  <title>PHP Test</title>
 </head>

 <body>
 <?php echo '<h1>Hello World!</h1>'; 
       echo 'You requested the contents of: <b>'; echo $_SERVER['HTTP_HOST']; echo '</b><br>';
//       echo 'The Pod that answered is: <b>'; echo $_ENV['HOSTNAME']; echo '</b> with an internal IP of <b>'; echo $_SERVER['SERVER_ADDR']; echo '</b><br>';
       echo 'The Pod that responded is: <b>'; echo $_ENV['OCP_POD_NAME']; echo '</b> with an internal IP of <b>'; echo $_ENV['OCP_POD_IP']; echo '</b><br>';
       echo 'That Pod is running on Node: <b>'; echo $_ENV['OCP_NODE_NAME']; echo '</b> who\'s primary IP is <b>'; echo $_ENV['OCP_NODE_IP']; echo '</b><br>';
       echo 'The clusterIP subnet/gateway assigned to that node is: <b>'; echo $_SERVER['REMOTE_ADDR']; echo '</b><br><br>';
  
       if (empty($_SERVER['HTTP_X_FORWARDED_FOR'])) {
         echo 'Direct connection, no proxy, or HTTP_X_FORWARD_FOR not set.<br>';
       } else {
         echo 'The proxy says you are: <b>'; echo $_SERVER['HTTP_X_FORWARDED_FOR']; echo '</b><br>';
       }
 ?>

 <p></p>

 <?php
       if (!empty($_ENV['DEBUG'])) {
         $everything = get_defined_vars();
         ksort($everything);
         echo '<pre>'; print_r($everything); echo '</pre>';
       }
 ?>

 <p></p>

 <?php
       if (!empty($_ENV['DEBUG'])) {
         phpinfo();
       }
 ?>

 </body>
</html>

<!--
# How to add OCP_XXXX variables

# command-line patch
  oc patch deployment/simple-php -p '{"spec":{"template":{"spec":{"containers":[{"name":"simple-php","env":[{"name":"OCP_NODE_NAME","valueFrom":{"fieldRef":{"apiVersion":"v1","fieldPath":"spec.nodeName"}}},{"name":"OCP_NODE_IP","valueFrom":{"fieldRef":{"apiVersion":"v1","fieldPath":"status.hostIP"}}},{"name":"OCP_POD_NAME","valueFrom":{"fieldRef":{"apiVersion":"v1","fieldPath":"metadata.name"}}},{"name":"OCP_POD_IP","valueFrom":{"fieldRef":{"apiVersion":"v1","fieldPath":"status.podIP"}}}]}]}}}}'

# raw YAML under
spec:
  template:
    spec:
      containers:
        - name: simple-php
          # ... #
          env:
            - name: OCP_NODE_NAME
              valueFrom:
                fieldRef:
                  fieldPath: spec.nodeName
            - name: OCP_NODE_IP
              valueFrom:
                fieldRef:
                  fieldPath: status.hostIP
            - name: OCP_POD_NAME
              valueFrom:
                fieldRef:
                  fieldPath: metadata.name
            - name: OCP_POD_IP
              valueFrom:
                fieldRef:
                  fieldPath: status.podIP
          # ... #
-->
