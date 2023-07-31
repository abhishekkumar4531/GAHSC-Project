<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Send OTP</title>
  <?php include "components/header.php" ?>
  <script src="assets/js/loadMore.js"></script>
</head>
<body class="parent-tag">
  <?php include "components/navbar.php" ?>
  <div class="container">
    <div  class="form-field">
      <h1>Send OTP on your registered email</h1>
      <form action="/setpassword" method="post">
        <dl>
          <dt>Enter Your Registered Email</dt>
            <dd>
              <input type="text" name="email" id="email" placeholder="Enter User-Email" required onblur="checkEmailStatus()"
              value = "<?php if(isset($_POST['email'])){echo $_POST['email'];} ?>"
              >
            </dd>
            <dd id="email_success" class="success-msg"></dd>
            <dd id="email_status" class="error-msg"></dd>
            <dd class="error-msg">
              <?php
                if(isset($GLOBALS['userEmailErrorStatus']) && $GLOBALS['userEmailErrorStatus']) {
                  echo "Please Enter Valid User-Email";
                }
              ?>
            </dd>
            <dd>
              <button id="submitBtn" name="sendOtp">Send OTP</button>
            </dd>
        </dl>
      </form>
    </div>
  </div>
</body>
</html>
