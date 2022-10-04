<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="UTF-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>Bài 4: Tạo trang web nhận và xử lý thông tin người dùng</title>
  </head>
  <body>
<?php
// define variables and set to empty values
    $nameErr = $adrErr = $genderErr = $phoneErr = "";
    $name = $adr = $gender = $comment = $phone = "";

{


  if (empty($_POST["name"])) {
    $nameErr = "Name is required";
  } else {
    $name = test_input($_POST["name"]);
    // check if name only contains letters and whitespace
    if (!preg_match("/^[a-zA-Z-' ]*$/",$name)) {
      $nameErr = "Only letters and white space allowed";
    }
  }
  
  if (empty($_POST["adr"])) {
    $adrErr = "Địa chỉ is required";
  } else {
    $adr = test_input($_POST["adr"]);
    // check if e-mail address is well-formed
    // if (!filter_var($adr, FILTER_VALIDATE_EMAIL)) {
    //     $adrErr = "Invalid email format";
    // }
  }
    
  if (empty($_POST["phone"])) {
    $phone = "";
  } else {
    $phone = test_input($_POST["phone"]);
    // check if URL address syntax is valid (this regular expression also allows dashes in the URL)
    // if (!preg_match("/\b(?:(?:https?|ftp):\/\/|www\.)[-a-z0-9+&@#\/%?=~_|!:,.;]*[-a-z0-9+&@#\/%=~_|]/i",$phone)) {
    //   $phoneErr = "Invalid URL";
    // }
  }


  if (empty($_POST["gender"])) {
    $genderErr = "Gender is required";
  } else {
    $gender = test_input($_POST["gender"]);
  }


  if (empty($_POST["comment"])) {
    $comment = "";
  } else {
    $comment = test_input($_POST["comment"]);
  }

  if (isset($_POST['lunch'])) {

    foreach ($_POST['lunch'] as $choice) {

        print "You want a $choice bun. <br/>"; } if(isset($_POST['chk1'])) echo
    "checkbox 1 : " . $_POST['chk1'] . "<br />"; if(isset($_POST['chk2'])) echo
    "checkbox 2 : " . $_POST['chk2']. "<br />"; if(isset($_POST['chk3'])) echo
    "checkbox 3 : " . $_POST['chk3'] . "<br />"; if(isset($_POST['chk4'])) echo
    "checkbox 4 : " . $_POST['chk4']. "<br />"; 
  } 
}
    
    function test_input($data) {
    $data = trim($data); $data = stripslashes($data); $data =
    htmlspecialchars($data); return $data; } ?>

    <!--  -->
    <form action="" method="POST">
      <fieldset>
        <legend>Enter your information</legend>
        <table>
          <tr>
            <td>Họ tên:</td>

            <td>
              <input type="text" name="name" value="<?php echo $name;?>" />
            </td>
          </tr>
          <tr>
            <td>Địa chỉ:</td>

            <td>
              <input type="text" name="adr" value="<?php echo $adr;?>" />
            </td>
          </tr>
          <tr>
            <td>Số điện thoại:</td>
            <td>
              <input type="text" name="phone" value="<?php echo $phone;?>" />
            </td>
          </tr>
          <tr>
            <td>Giới tính:</td>
            <td>
              <input type="radio" name="gender"
              <?php if (isset($gender) && $gender=="female") echo "checked";?>
              value="female"/> Nam
            </td>
            <td>
              <input type="radio" name="gender"
              <?php if (isset($gender) && $gender=="male") echo "checked";?>
              value="male" /> Nữ
            </td>
          </tr>
          <tr>
            <td>Quốc tịch:</td>
            <td>
              <select name="country[]">
                <option value="VietNam" selected>VietNam</option>
                <option value="My">My</option>
                <option value="Anh">Anh</option>
                <option value="Audi">Audi</option>
              </select>
            </td>
          </tr>

          <tr>
            <td>Các môn đã học:</td>
            <td>
              <input type="checkbox" name="chk1" value="php"
              <?php if(isset($_POST['chk1'])&& $_POST['chk1']=='php') echo 'checked'; else echo ""?>
              /> PHP & MySQL
            </td>
            <td>
              <input type="checkbox" name="chk2" value="c#"
              <?php if(isset($_POST['chk2'])&& $_POST['chk2']=='c#') echo 'checked'; else echo ""?>/>
              C#
            </td>
            <td>
              <input type="checkbox" name="chk3" value="xml"
              <?php if(isset($_POST['chk3'])&& $_POST['chk3']=='xml') echo 'checked'; else echo ""?>/>
              XML
            </td>
            <td>
              <input type="checkbox" name="chk4" value="python"
              <?php if(isset($_POST['chk4'])&& $_POST['chk4']=='python') echo 'checked'; else echo ""?>/>
              PyThon
            </td>
          </tr>

          <tr>
            <td>Ghi chú:</td>
            <td>
              <textarea name="comment" rows="5" cols="40">
            <?php echo $comment;?>
            The cat was playing in the garden.
            </textarea
              >
            </td>
          </tr>

          <tr>
            <td colspan="3" align="center">
              <input type="submit" value="send" name="gui" />
              <input type="submit" value="exit" name="huy" />
            </td>
          </tr>
        </table>
      </fieldset>
    </form>

    <!-- <?php
echo "<h2>Your Input:</h2>";
echo $name;
echo "<br>";
echo $adr;
echo "<br>";
echo $phone;
echo "<br>";
echo $comment;
echo "<br>";
echo $gender;
?> -->
  </body>
</html>
