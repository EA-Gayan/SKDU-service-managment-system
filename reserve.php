<?php

class Reservation {
  
  //  CONSTRUCTOR - CONNECT TO DATABASE
  private $pdo; // PDO object
  private $stmt; // SQL statement
  public $error; // Error message
  
  function __construct() {
    try {
      $this->pdo = new PDO(
        "mysql:host=" . DB_HOST . ";dbname=" . DB_NAME . ";charset=" . DB_CHARSET,
        DB_USER, DB_PASSWORD, [
          PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION,
          PDO::ATTR_DEFAULT_FETCH_MODE => PDO::FETCH_NAMED
        ]
      );
    } catch (Exception $ex) { exit($ex->getMessage()); }
  }

  // DESTRUCTOR - CLOSE DATABASE CONNECTION
  function __destruct() {
    $this->pdo = null;
    $this->stmt = null;
  }

  //  SAVE RESERVATION
  function save ($service,$date, $slot, $index, $email, $tel) {


    // DATABASE ENTRY
    try {
      $this->stmt = $this->pdo->prepare(
        "INSERT INTO `reservations` (`res_service`,`res_date`, `res_slot`, `res_index`, `res_email`, `res_tel`) VALUES (?,?,?,?,?,?)"
      );
      $this->stmt->execute([$service, $date, $slot, $index, $email, $tel]);
    } catch (Exception $ex) {
      $this->error = $ex->getMessage();
      return false;
    }

    // EMAIL

    $subject = "Reservation Received";
    $message = "Thank you, we have received your request and will process it shortly.";
    @mail($email, $subject, $message);
    return true;
  }

  //  GET RESERVATIONS FOR THE DAY
  function getDay ($day="") {
    // (D1) DEFAULT TO TODAY
    if ($day=="") { $day = date("Y-m-d"); }

    //  GET ENTRIES
    $this->stmt = $this->pdo->prepare(
      "SELECT * FROM `reservations` WHERE `res_date`=?"
    );
    $this->stmt->execute([$day]);
    return $this->stmt->fetchAll();
  }
}

// DATABASE SETTINGS 
define("DB_HOST", "localhost");

define("DB_CHARSET", "utf8");
define("DB_USER", "root");


//  NEW RESERVATION OBJECT
$_RSV = new Reservation();
