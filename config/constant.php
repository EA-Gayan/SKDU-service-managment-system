<?php
    //create session
    session_start();

      //execue  query and save data in database
      define('SITEURL','http://localhost/web-design-KDU/');
      define('LOCALHOST','localhost');
      define('DB_USERNAME','root');
      define('DB_PASSWORD', '');
      define('DB_NAME','kdu_app');
      
      $conn = mysqli_connect(LOCALHOST,DB_USERNAME,DB_PASSWORD,);
      $db_select = mysqli_select_db($conn, DB_NAME);
?>