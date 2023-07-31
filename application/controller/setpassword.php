<?php

require '../application/model/database.php';
class Setpassword extends Framework {
  
  /**
     * It is validating the input feild.
     *
     *   @param  string $data
     *     It will store input feild data.
     *
     *   @return sring
     *     Adter validating it will return string type data.
     */
    function testInput($data) {
      $data = trim($data);
      $data = stripslashes($data);
      $data = htmlspecialchars($data);
      return $data;
    }

  public function index() {
    $obj = new Database();
    if(isset($_POST['sendOtp'])) {
      session_start();
      $email = $this->testInput($_POST['email']);
      $otp = $obj->sendOtp($email);
      $_SESSION['otp'] = $otp;
      $_SESSION['email'] = $email;
      echo "OTP send => ". $_SESSION['otp'];
      $this->view("setPassword");
    }
    else if(isset($_POST['setPassword'])){
      session_start();
      echo "Email : ". $_SESSION['email'];
      $otp = $_POST['otp'];
      $password = $this->testInput($_POST['newPassword']);
      if(number_format($_SESSION['otp']) == number_format($otp)){
        $status = $obj->setPassword($_SESSION['email'], $password);
        if($status) {
          session_destroy();
          header("location: login");
        }
      }
      else {
        session_destroy();
        echo "Password erro Error!!";
      }
    }
    else {
      $this->view("sendOtp");
    }
  }
}

?>