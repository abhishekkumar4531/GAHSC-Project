<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Verification</title>
  <?php include "components/header.php" ?>
  <script src="assets/js/loadMore.js"></script>
</head>
<body class="parent-tag">
  <?php include "components/navbar.php" ?>
  <div class="container">
    <div class="form-content">
      <div class="form-field">
        <h1>Online Verification</h1>
        <form action="verification" method="post">
          <dl>
            <dd>
              <input type="text" name="enrollId" id="enrollId" placeholder="Enter your enrollment id">
            </dd>
            <dd>
              <input type="date" name="dob" id="dob" placeholder="">
            </dd>

            <dd>
              <button id="submitBtn" name="search">Search</button>
            </dd>
          </dl>
        </form>

        <!--<div>
          <ul>
            <li><?php if(isset($GLOBALS['userName'])) {$GLOBALS['userName'];} ?></li>
            <li><?php if(isset($GLOBALS['userEmail'])) {$GLOBALS['userEmail'];} ?></li>

            <li class="success-msg">
              <?php if(isset($GLOBALS['verified'])) {$GLOBALS['verified'];} ?>
            </li>
          </ul>
        </div>-->
      </div>
    </div>
  </div>
</body>
</html>
