<?php

require '../application/model/database.php';

class Verification extends Framework {

  public function index() {
    if(isset($_POST['search'])) {
      $enrollId = $_POST['enrollId'];
      $dob = $_POST['dob'];
      $obj = new Database();
      $val = $obj->verify($enrollId, $dob);
      if($val != 0) {
        $GLOBALS['userName'] = $val[0];
        $GLOBALS['userEmail'] = $val[1];
        $GLOBALS['verified'] = $val[0] ." is verified account!!!";
        echo "<script>alert('". $GLOBALS['userName'] ." is verified accounts!!!');</script>";
        $this->view("verification");
      }
      else {
        $GLOBALS['verified'] = "Not verified account!!!";
        $this->view("verification");
      }
    }
    else {
      $this->view("verification");
    }
  }

}

?>