<form action="/admission" method="post" enctype="multipart/form-data">
  <h3>Basic information</h3>
  <dl>
    <dd>
      <select name="department" id="department" class="form-select">
        <option value="">--Select department--</option>
        <option value="Electro Homoeopathy">Electro Homoeopathy</option>
        <option value="Homoeopathy">Homoeopathy</option>
        <option value="Yoga Naturopathy">Yoga Naturopathy</option>
      </select>
    </dd>

    <dd>
      <select name="course" id="course" class="form-select">
        <option value="">--Select course--</option>
        <option value="C.E.M.S - 1 YEAR">C.E.M.S - 1 YEAR</option>
        <option value="D.E.M.S - 2 YEAR">D.E.M.S - 2 YEAR</option>
        <option value="M.B.E.H - 3 YEAR">M.B.E.H - 3 YEAR</option>
      </select>
    </dd>

    <dd>
      <select name="session" id="session" class="form-select">
        <option value="">--Select session--</option>
        <option value="Jan">Jan</option>
        <option value="Jul">Jul</option>
      </select>
    </dd>

    <dd>
      <select name="admissionYear" id="admissionYear" class="form-select">
        <option value="">--Select admission year--</option>
        <option value="Electro Homoeopathy">2001</option>
        <option value="Homoeopathy">2002</option>
        <option value="Yoga Naturopathy">2003</option>
      </select>
    </dd>

    <dd>
      <select name="centerName" id="centerName" class="form-select">
        <option value="">--Select center name--</option>
        <option value="Medilite Electro Homoeopathic Medical Institute">Medilite Electro Homoeopathic Medical Institute</option>
        <option value="MEHP Medical Institute">MEHP Medical Institute</option>
      </select>
    </dd>

    <dd>
      <input type="text" name="fullName" id="fullName" required onblur="checkName()" placeholder="Enter your full name"
      value="<?php if(isset($_POST['fullName'])){echo $_POST['fullName'];} ?>"
      >
    </dd>
    <dd id="invalidFullName" class="error-msg"></dd>
    <dd class="error-msg">
      <?php if(isset($GLOBALS['fullNameError']) && !$GLOBALS['fullNameError']) {
        echo "Invalid syntax of name!!!";
      }
      ?>
    </dd>

    <dd>
      <input type="text" name="guardianName" id="guardianName" required onblur="checkName()" placeholder="Enter your Guardian's name"
      value="<?php if(isset($_POST['guardianName'])){echo $_POST['guardianName'];} ?>"
      >
    </dd>
    <dd id="invalidGuardianName" class="error-msg"></dd>
    <dd class="error-msg">
      <?php if(isset($GLOBALS['GuardianNameError']) && !$GLOBALS['GuardianNameError']) {
        echo "Invalid syntax of name!!!";
      }
      ?>
    </dd>

    <dd>
      <input type="text" name="addressInfo" id="addressInfo" required onblur="checkAddress()" placeholder="Enter your full address"
      value="<?php if(isset($_POST['addressInfo'])){echo $_POST['addressInfo'];} ?>"
      >
    </dd>
    <dd id="invalidAddressInfo" class="error-msg"></dd>
    <dd class="error-msg">
      <?php if(isset($GLOBALS['invalidAddressInfo']) && !$GLOBALS['invalidAddressInfo']) {
        echo "Invalid syntax of name!!!";
      }
      ?>
    </dd>

    <dd>
      <select name="state" id="state" class="form-select">
        <option value="">--Select state--</option>
        <option value="Bihar">Bihar</option>
        <option value="Jharkhand">Jharkhand</option>
        <option value="West Bengal">West Bengal</option>
      </select>
    </dd>

    <dd>
      <input type="text" name="cityName" id="cityName" required onblur="checkCity()" placeholder="Enter your City Name"
      value="<?php if(isset($_POST['cityName'])){echo $_POST['cityName'];} ?>"
      >
    </dd>
    <dd id="invalidCityName" class="error-msg"></dd>
    <dd class="error-msg">
      <?php if(isset($GLOBALS['invalidCityName']) && !$GLOBALS['invalidCityName']) {
        echo "Invalid City Name!!!";
      }
      ?>
    </dd>

    <dd>
      <input type="text" name="pinCode" id="pinCode" required onblur="checkPin()" placeholder="Enter your Pin Code"
      value="<?php if(isset($_POST['pinCode'])){echo $_POST['pinCode'];} ?>"
      >
    </dd>
    <dd id="invalidPinCode" class="error-msg"></dd>
    <dd class="error-msg">
      <?php if(isset($GLOBALS['invalidPinCode']) && !$GLOBALS['invalidPinCode']) {
        echo "Invalid Pin Code!!!";
      }
      ?>
    </dd>

    <dd>
      <input type="text" name="mobile" id="mobile" required onblur="checkPhoneNo()" placeholder="Enter your mobile no"
      value="<?php if(isset($_POST['mobile'])){echo $_POST['mobile'];} ?>"
      >
    </dd>
    <dd id="invalidMobile" class="error-msg"></dd>
    <dd class="error-msg">
      <?php if(isset($GLOBALS['mobileError']) && !$GLOBALS['mobileError']) {
        echo "Invalid syntax of mobile!!!";
      }
      ?>
    </dd>

    <dd>
      <input type="text" name="email" id="email" required onblur="checkEmailStatus()" placeholder="Enter your email"
      value="<?php if(isset($_POST['email'])){echo $_POST['email'];} ?>"
      >
    </dd>
    <dd id="emailSuccess" class="success-msg"></dd>
    <dd id="emailStatus" class="error-msg"></dd>
    <dd class="error-msg">
      <?php if(isset($GLOBALS['DuplicateErrorMsg']) && $GLOBALS['DuplicateErrorMsg']){echo "Please Enter Unique Email-Address!!!";} ?>
    </dd>
    <dd class="error-msg">
      <?php if(isset($GLOBALS['emailError']) && !$GLOBALS['emailError']) {
        echo "Invalid syntax of email!!!";
      }
      ?>
    </dd>

    <dd>
      <select name="medium" id="medium" class="form-select">
        <option value="">--Select Medium--</option>
        <option value="Hindi">Hindi</option>
        <option value="Bengali">Bengali</option>
        <option value="English">English</option>
      </select>
    </dd>

    <dd>
      <select name="category" id="category" class="form-select">
        <option value="">--Select Category--</option>
        <option value="General">General</option>
        <option value="OBC">OBC</option>
        <option value="SC/ST">SC/ST</option>
      </select>
    </dd>

    <dd>
      <input type="date" name="dob" id="dob" required onblur="" placeholder="Enter your date of birth"
      value="<?php if(isset($_POST['dob'])){echo $_POST['dob'];} ?>"
      >
    </dd>
    <dd id="invalidDob" class="error-msg"></dd>
    <dd class="error-msg">
      <?php if(isset($GLOBALS['dobError']) && !$GLOBALS['dobError']) {
        echo "Invalid syntax of Date of Birth!!!";
      }
      ?>
    </dd>

    <dd>
      <select name="physical" id="physical" class="form-select">
        <option value="">--Physical Challenged--</option>
        <option value="Yes">Yes</option>
        <option value="No">No</option>
      </select>
    </dd>

    <dd>
      <input type="text" name="aadhaar" id="aadhaar" required onblur="checkAadhaar()" placeholder="Enter your Aadhaar no"
      value="<?php if(isset($_POST['aadhaar'])){echo $_POST['aadhaar'];} ?>"
      >
    </dd>
    <dd id="invalidAadhaar" class="error-msg"></dd>
    <dd class="error-msg">
      <?php if(isset($GLOBALS['aadharError']) && !$GLOBALS['aadhaarError']) {
        echo "Invalid format of Aadhaar number!!!";
      }
      ?>
    </dd>

    <div class="qualifying">
      <h3 class="text-center p-1">Details of Qualifying Examination</h3>
      <table class="table">
        <tr>
          <th>Board</th>
          <th>Name of Board/University</th>
          <th>College Or School </th>
          <th>Year Of Passing</th>
          <th>Marks(%) </th>
          <th>Images</th>
        </tr>
        <tr>
          <td>
            <select name="ssc-10" id="ssc-10" class="form-select">
              <option value="SSC/10">SSC/10</option>
            </select>
          </td>
          <td>
            <input type="text" name="ssc-board" id="ssc-board" class="form-select" placeholder="Enter Board/University">
          </td>
          <td>
            <input type="text" name="ssc-college" id="ssc-college" class="form-control" placeholder="Enter College">
          </td>
          <td>
            <input type="text" name="ssc-year" id="ssc-year" class="form-control" placeholder="Year of Passing">
          </td>
          <td>
            <input type="text" name="ssc-marks" id="ssc-marks" class="form-control" placeholder="%">
          </td>
          <td>
            <input type="file" name="ssc-image" id="ssc-image">
          </td>
        </tr>
        <tr>
          <td>
            <select name="inter-12" id="inter-12" class="form-select">
              <option value="INTER/12">INTER/12</option>
            </select>
          </td>
          <td>
            <input type="text" name="inter-board" id="inter-board" class="form-select" placeholder="Enter Board/University">
          </td>
          <td>
            <input type="text" name="inter-college" id="inter-college" class="form-control" placeholder="Enter College">
          </td>
          <td>
            <input type="text" name="inter-year" id="inter-year" class="form-control" placeholder="Year of Passing">
          </td>
          <td>
            <input type="text" name="inter-marks" id="inter-marks" class="form-control" placeholder="%">
          </td>
          <td>
            <input type="file" name="inter-image" id="inter-image">
          </td>
        </tr>
        <tr>
          <td>
            <select name="degree" id="degree" class="form-select">
              <option value="Degree">Degree</option>
            </select>
          </td>
          <td>
            <input type="text" name="degree-board" id="degree-board" class="form-select" placeholder="Enter Board/University">
          </td>
          <td>
            <input type="text" name="degree-college" id="degree-college" class="form-control" placeholder="Enter College">
          </td>
          <td>
            <input type="text" name="degree-year" id="degree-year" class="form-control" placeholder="Year of Passing">
          </td>
          <td>
            <input type="text" name="degree-marks" id="degree-marks" class="form-control" placeholder="%">
          </td>
          <td>
            <input type="file" name="degree-image" id="degree-image">
          </td>
        </tr>
        <tr>
          <td>
            <select name="other" id="other" class="form-select">
              <option value="Other">Other</option>
            </select>
          </td>
          <td>
            <input type="text" name="other-board" id="other-board" class="form-select" placeholder="Enter Board/University">
          </td>
          <td>
            <input type="text" name="other-college" id="other-college" class="form-control" placeholder="Enter College">
          </td>
          <td>
            <input type="text" name="other-year" id="other-year" class="form-control" placeholder="Year of Passing">
          </td>
          <td>
            <input type="text" name="other-marks" id="other-marks" class="form-control" placeholder="%">
          </td>
          <td>
            <input type="file" name="other-image" id="other-image">
          </td>
        </tr>
      </table>
    </div>

    <dt>Upload your image</dt>
    <dd>
      <input type="file" name="userImage" id="userImage" required>
    </dd>
    <dd class="error-msg">
      <?php if(isset($GLOBALS['imageError']) && $GLOBALS['imageError']) {
        echo "Invalid image type!!!";
      }
      ?>
    </dd>

    <dt>Upload your signature</dt>
    <dd>
      <input type="file" name="userSignature" id="userSignature" required>
    </dd>
    <dd class="error-msg">
      <?php if(isset($GLOBALS['signatureError']) && $GLOBALS['signatureError']) {
        echo "Invalid image type!!!";
      }
      ?>
    </dd>

    <dt>Upload GOVT. ID proof</dt>
    <dd>
      <input type="file" name="govtProof" id="govtProof" required>
    </dd>
    <dd class="error-msg">
      <?php if(isset($GLOBALS['govtError']) && $GLOBALS['govtError']) {
        echo "Invalid image type!!!";
      }
      ?>
    </dd>

    <dd>
      <button name="submitBtn" id="submitBtn">Submit</button>
    </dd>
  </dl>
</form>
