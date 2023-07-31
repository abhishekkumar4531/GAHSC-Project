<?php

  require "../vendor/autoload.php";
  use PHPMailer\PHPMailer\PHPMailer;
  class Database extends Connection {

    /**
     * It store the login user's email exists or not in boolean form.
     *
     *   @var bool
     */
    public $emailErrorMsg = false;

    /**
     * It store the login user's password exists or not in boolean form.
     *
     *   @var bool
     */
    public $pwdErrorMsg = false;

    /**
     * validationMsg
     *
     *   @var array
     */
    public $validationMsg = [];

    /**
     * duplicateEmailMsg
     *
     *   @var bool
     */
    public $duplicateEmailMsg;

    /**
     * It store all the books.
     *
     * @var array
     */
    public $bookData = [];

    public $verifyName = "";
    public $verifyEmail = "";

    /**
     * It manage the user login operation. It will called by controller for
     * validating the user's entered data for login.
     *
     *   @param  string $userEmail
     *     It store the user email.
     *
     *   @param  string $userPassword
     *     It store the user password.
     *
     *   @return void
     *     If user's entered valid data then return true otherwise return false.
     */
    public function loginRequest($userEmail, $userPassword) {
      $fetch = "SELECT * FROM Account WHERE UserEmail = '$userEmail'";
      $result = $this->conn->query($fetch);
      if ($result->num_rows > 0) {
        $row = $result->fetch_assoc();
        if($userPassword === $row["UserPassword"]){
          $this->emailErrorMsg = false;
          $this->pwdErrorMsg = false;
          return true;
        }
        else {
          $this->pwdErrorMsg = true;
          return false;
        }
      }
      else {
        $this->emailErrorMsg = true;
        return false;
      }

      $this->conn->close();
    }

    /**
     * It is managing the use registartion.
     *
     *   @param  string $userFirstName
     *     It store the user first name.
     *
     *   @param  string $userLastName
     *     It store the user last mame.
     *
     *   @param  string $userPassword
     *     It store the user password.
     *
     *   @param  string $userMobile
     *     It store the user's mobile number.
     *
     *   @param  string $userEmail
     *     It store the user Email address.
     *
     *   @param  string $userImage
     *     It stote the user image file address.
     *
     *   @return bool
     *     When regisrartion done successfully it will retur true other wise false.
     */
    public function registerRequest($userFirstName, $userLastName, $userPassword, $userMobile, $userEmail, $userImage) {
      $check_sql = "SELECT UserEmail FROM Account WHERE UserEmail = '$userEmail'";

      $result = $this->conn->query($check_sql);

      if ($result->num_rows > 0) {
        $this->duplicateEmailMsg = true;
        return false;
      }
      else{
        $post = "INSERT INTO Account (FirstName, LastName, UserPassword, UserMobile, UserEmail, UserImage)
        VALUES('$userFirstName', '$userLastName', '$userPassword', '$userMobile', '$userEmail', '$userImage')";
        if($this->conn->query($post)) {
          $this->duplicateEmailMsg = false;
          return true;
        }
        else {
          return false;
        }
      }
      $this->conn->close();
    }

    public function onlineAdmission($formData) {
      $department = $formData['department'];
      $course = $formData['course'];
      $session = $formData['session'];
      $admissionYear = $formData['admissionYear'];
      $centerName = $formData['centerName'];
      $fullName = $formData['fullName'];
      $guardianName = $formData['guardianName'];
      $addressInfo = $formData['addressInfo'];
      $state = $formData['state'];
      $cityName = $formData['cityName'];
      $pinCode = $formData['pinCode'];
      $mobile = $formData['mobile'];
      $email = $formData['email'];
      $medium = $formData['medium'];
      $category = $formData['category'];
      $dob = $formData['dob'];
      $physical = $formData['physical'];
      $aadhaar = $formData['aadhaar'];
      $sscBoard = $formData['ssc-board'];
      $sscCollege = $formData['ssc-college'];
      $sscYear = $formData['ssc-year'];
      $sscMarks = $formData['ssc-marks'];
      $sscImage = $formData['sscImage'];
      $interBoard = $formData['inter-board'];
      $interCollege = $formData['inter-college'];
      $interYear = $formData['inter-year'];
      $interMarks = $formData['inter-marks'];
      $interImage = $formData['interImage'];
      $degreeBoard = $formData['degree-board'];
      $degreeCollege = $formData['degree-college'];
      $degreeYear = $formData['degree-year'];
      $degreeMarks = $formData['degree-marks'];
      $degreeImage = $formData['degreeImage'];
      $otherBoard = $formData['other-board'];
      $otherCollege = $formData['other-college'];
      $otherYear = $formData['other-year'];
      $otherMarks = $formData['other-marks'];
      $otherImage = $formData['otherImage'];
      $userImage = $formData['userImage'];
      $signImage = $formData['signImage'];
      $govtImage = $formData['govtImage'];
      $post = "INSERT INTO onlineAdmission (department, course, sesssion, admissionYear, centerName, fullName, guardianName, address, state, city, pincode, mobile, 
      email, medium, caegory, dob, physical, aadhaar, sscBoard, sscCollege, sscPassingYear, sscMarks, sscImages, interBoard, interCollege, interPassingYear, 
      interMarks, interImages, degreeBoard, degreeCollege, degreePassingYear, degreeMarks, degreeImages, otherBoard, otherCollege, otherPassingYear, 
      otherMarks, otherImages, userImage, userSignature, govtProof)
      VALUES('$department', '$course', '$session', '$admissionYear', '$centerName', '$fullName', '$guardianName', '$addressInfo', '$state', '$cityName', '$pinCode', '$mobile', '$email', '$medium', '$category', '$dob', '$physical', '$aadhaar', '$sscBoard', 
      '$sscCollege', '$sscYear', '$sscMarks', '$sscImage', '$interBoard', '$interCollege', '$interYear', '$interMarks', '$interImage', '$degreeBoard', '$degreeCollege', '$degreeYear', '$degreeMarks', '$degreeImage', 
      '$otherBoard', '$otherCollege', '$otherYear', '$otherMarks', '$otherImage', '$userImage', '$signImage', '$govtImage')";
      if($this->conn->query($post)) {
        return true;
      }
      else {
        return false;
      }
    }

    public function setPassword($userEmail, $password) {
      $find = "SELECT email FROM onlineAdmission WHERE email = '$userEmail'";
      $result = $this->conn->query($find);

      if($result->num_rows > 0) {
        $post = "UPDATE onlineAdmission SET password = '$password' WHERE email = '$userEmail'";
        if ($this->conn->query($post) === TRUE) {
          return true;
        }
        else {
          return false;
        }
      }
      else {
        return false;
      }
    }

    public function verify($enrollId, $dob) {
      $find = "SELECT userId FROM onlineAdmission WHERE userId = '$enrollId'";
      $result = $this->conn->query($find);

      if($result->num_rows > 0) {
        $check = "SELECT * FROM onlineAdmission WHERE dob = '$dob'";
        $user = $this->conn->query($check);
        if($user->num_rows > 0 == 1) {
          $userData = $user->fetch_assoc();
          $this->verifyName = $userData['fullName'];
          $this->verifyEmail = $userData['email'];
          return [$this->verifyName, $this->verifyEmail];
        }
      }
      else {
        return null;
      }
    }

    /**
     * It is managing the user input data validations.
     *
     *   @param  string $firstName
     *     It store user first name.
     *
     *   @param  string $lastName
     *     It store user last name.
     *
     *   @param  string $password
     *     It store the user password.
     *
     *   @param  string $mobile
     *     It store the user mobile number.
     *
     *   @param  string $email
     *     It store the user email.
     *
     *   @return array
     *     It will return an array in which first index will hold overall validations
     *     status and another index store another which consists status of all
     *     the data.
     */
    public function newUserValidation($firstName, $lastName, $password, $mobile, $email) {
      if(preg_match("/^[A-Za-z]+$/", $firstName)) {
        $this->validationMsg['firstName'] = true;
      }
      else {
        $this->validationMsg['firstName'] = false;
      }
      if(preg_match("/^[A-Za-z]+$/", $lastName)) {
        $this->validationMsg['lastName'] = true;
      }
      else {
        $this->validationMsg['lastName'] = false;
      }
      if(preg_match("/^(?=.*[a-z])(?=.*[A-Z])(?=.*[0-9])(?=.*[!@#\$%\^&\*])(?=.{8,})/", $password)) {
        $this->validationMsg['password'] = true;
      }
      else {
        $this->validationMsg['password'] = false;
      }
      if(preg_match("/^(\+91)[0-9]{10}$/", $mobile)) {
        $this->validationMsg['mobile'] = true;
      }
      else {
        $this->validationMsg['mobile'] = false;
      }
      if(filter_var($email, FILTER_VALIDATE_EMAIL)) {
        $this->validationMsg['email'] = true;
      }
      else {
        $this->validationMsg['email'] = false;
      }

      foreach($this->validationMsg as $status) {
        if($status === false) {
          return [false, $this->validationMsg];
        }
      }
      return [true, $this->validationMsg];
    }


    public function sendOtp($userEmail) {
      $email = $userEmail;
      $otp = rand(100000, 999999);
  
      $mail = new PHPMailer();
      $mail->isSMTP();
      $mail->Host = 'smtp.gmail.com';
      $mail->SMTPAuth = true;
      $mail->Username = "abhi31kr45@gmail.com";
      $mail->Password = "ylagckqsadjtgigz";
      $mail->SMTPSecure = PHPMailer::ENCRYPTION_STARTTLS;
      $mail->Port = 587;
  
      $mail->setFrom("abhi31kr45@gmail.com");
      $mail->addAddress($email);
      $mail->Subject = "Thanks for registration!!!";
      $mail->isHTML(TRUE);
      $mail->Body = "<b>Please set your password : </b> Your OTP => $otp";
      $mail->send();
      return $otp;
    }

    public function getEmail($userName, $userEmail) {
      $email = $userEmail;
  
      $mail = new PHPMailer();
      $mail->isSMTP();
      $mail->Host = 'smtp.gmail.com';
      $mail->SMTPAuth = true;
      $mail->Username = "abhi31kr45@gmail.com";
      $mail->Password = "ylagckqsadjtgigz";
      $mail->SMTPSecure = PHPMailer::ENCRYPTION_STARTTLS;
      $mail->Port = 587;
  
      $mail->setFrom("abhi31kr45@gmail.com");
      $mail->addAddress($email);
      $mail->Subject = "Thanks for registration!!!";
      $mail->isHTML(TRUE);
      $mail->Body = "Hello $userName !!! <br>Now set your password after clicking on given link : <a href='theem.com'>Set password</a>";
      $mail->send();
    }

  }

?>
