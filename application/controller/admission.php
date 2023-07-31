<?php

require '../application/model/database.php';
  /**
   * It is user Online Admission page.
   */
  class Admission extends Framework {

    public $formData = [];

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

    /**
     * It is managing two casses first when user submit registartion form and
     * another is when user send the request to this controller through url.
     * First case : After form submission it will fetch the data and check the
     * validations and then communicate with model for storing the data into
     * database.
     * Second Case : If user access through another method then if user logged
     * in then redirect to home page otherwise stay on registration page.
     *
     *   @return void
     *     It will not return any values;
     */
    public function index() {
      if(isset($_POST['submitBtn'])) {
        $this->formData['department'] = $this->testInput($_POST['department']);
        $this->formData['course'] = $this->testInput($_POST['course']);
        $this->formData['session'] = $this->testInput($_POST['session']);
        $this->formData['admissionYear'] = $this->testInput($_POST['admissionYear']);
        $this->formData['centerName'] = $this->testInput($_POST['centerName']);
        $this->formData['fullName'] = $this->testInput($_POST['fullName']);
        $this->formData['guardianName'] = $this->testInput($_POST['guardianName']);
        $this->formData['addressInfo'] = $this->testInput($_POST['addressInfo']);
        $this->formData['state'] = $this->testInput($_POST['state']);
        $this->formData['cityName'] = $this->testInput($_POST['cityName']);
        $this->formData['pinCode'] = $this->testInput($_POST['pinCode']);
        $this->formData['mobile'] = $this->testInput($_POST['mobile']);
        $this->formData['email'] = $this->testInput($_POST['email']);
        $this->formData['medium'] = $this->testInput($_POST['medium']);
        $this->formData['category'] = $this->testInput($_POST['category']);
        $this->formData['dob'] = $this->testInput($_POST['dob']);
        $this->formData['physical'] = $this->testInput($_POST['physical']);
        $this->formData['aadhaar'] = $this->testInput($_POST['aadhaar']);
        $this->formData['ssc-board'] = $this->testInput($_POST['ssc-board']);
        $this->formData['ssc-college'] = $this->testInput($_POST['ssc-college']);
        $this->formData['ssc-year'] = $this->testInput($_POST['ssc-year']);
        $this->formData['ssc-marks'] = $this->testInput($_POST['ssc-marks']);
        $this->formData['inter-board'] = $this->testInput($_POST['inter-board']);
        $this->formData['inter-college'] = $this->testInput($_POST['inter-college']);
        $this->formData['inter-year'] = $this->testInput($_POST['inter-year']);
        $this->formData['inter-marks'] = $this->testInput($_POST['inter-marks']);
        $this->formData['degree-board'] = $this->testInput($_POST['degree-board']);
        $this->formData['degree-college'] = $this->testInput($_POST['degree-college']);
        $this->formData['degree-year'] = $this->testInput($_POST['degree-year']);
        $this->formData['degree-marks'] = $this->testInput($_POST['degree-marks']);
        $this->formData['other-board'] = $this->testInput($_POST['other-board']);
        $this->formData['other-college'] = $this->testInput($_POST['other-college']);
        $this->formData['other-year'] = $this->testInput($_POST['other-year']);
        $this->formData['other-marks'] = $this->testInput($_POST['other-marks']);

        $sscImage = $_FILES['ssc-image']['name'];
        $sscTmp = $_FILES['ssc-image']['tmp_name'];
        $sscType = $_FILES['ssc-image']['type'];

        $interImage = $_FILES['inter-image']['name'];
        $interTmp = $_FILES['inter-image']['tmp_name'];
        $interType = $_FILES['inter-image']['type'];

        $degreeImage = $_FILES['degree-image']['name'];
        $degreeTmp = $_FILES['degree-image']['tmp_name'];
        $degreeType = $_FILES['degree-image']['type'];

        $otherImage = $_FILES['other-image']['name'];
        $otherTmp = $_FILES['other-image']['tmp_name'];
        $otherType = $_FILES['other-image']['type'];

        $userImage = $_FILES['userImage']['name'];
        $userTmp = $_FILES['userImage']['tmp_name'];
        $userType = $_FILES['userImage']['type'];

        $signImage = $_FILES['userSignature']['name'];
        $signTmp = $_FILES['userSignature']['tmp_name'];
        $signType = $_FILES['userSignature']['type'];

        $govtImage = $_FILES['govtProof']['name'];
        $govtTmp = $_FILES['govtProof']['tmp_name'];
        $govtType = $_FILES['govtProof']['type'];

        if(true) {
          move_uploaded_file($sscTmp, "assets/uploads/". $sscImage);
          move_uploaded_file($interTmp, "assets/uploads/". $interImage);
          move_uploaded_file($degreeTmp, "assets/uploads/". $degreeImage);
          move_uploaded_file($otherTmp, "assets/uploads/". $otherImage);
          move_uploaded_file($userTmp, "assets/uploads/". $userImage);
          move_uploaded_file($signTmp, "assets/uploads/". $signImage);
          move_uploaded_file($govtTmp, "assets/uploads/". $govtImage);

          $this->formData['sscImage'] = "/assets/uploads/$sscImage";
          $this->formData['interImage'] = "/assets/uploads/$interImage";
          $this->formData['degreeImage'] = "/assets/uploads/$degreeImage";
          $this->formData['otherImage'] = "/assets/uploads/$otherImage";
          $this->formData['userImage'] = "/assets/uploads/$userImage";
          $this->formData['signImage'] = "/assets/uploads/$signImage";
          $this->formData['govtImage'] = "/assets/uploads/$govtImage";
        }
        
        $obj = new Database();

        $status = $obj->onlineAdmission($this->formData);
        if($status) {
          $obj->getEmail($this->formData['fullName'], $this->formData['email']);
          header("location: /setpassword");
        }
        else {
          echo "Failed";
        }

      }
      else {
        session_start();
        if(isset($_SESSION['logged_in'])) {
          header("location: /home");
        }
        else {
          session_destroy();
          $this->view("admission");
        }
      }
    }


  }
?>
