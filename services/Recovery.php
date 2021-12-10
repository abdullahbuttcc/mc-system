<?php

namespace Core;

require_once __DIR__ . '/../config/Database.php';
require_once __DIR__ . '/../config/Environment.php';
require_once __DIR__ . '/../include/functions.php';

use Config\Database;
use PDO;
use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\Exception;

require __DIR__ . '/../include/phpmailer/src/Exception.php';
require __DIR__ . '/../include/phpmailer/src/PHPMailer.php';
require __DIR__ . '/../include/phpmailer/src/SMTP.php';
/**
 * The recovery class.
 *
 * This class prvides password recovery services .
 *
 * @category   Utility
 * @package    Core
 */
class Recovery
{

  /**
   * It represents a PDO instance
   *
   * @var object
   */
  static $db = null;


  /**
   * The class constructor
   *
   */

  public function __construct()
  {

    if (static::$db === null) {

      $conn_string = 'mysql:host=' . Database::DB_HOST . ';dbname=' . Database::DB_NAME . ';charset=utf8';
      $db = new \PDO($conn_string, Database::DB_USER, Database::DB_PASSWORD);

      // Throw an Exception when an error occurs
      $db->setAttribute(\PDO::ATTR_ERRMODE, \PDO::ERRMODE_EXCEPTION);
      static::$db = $db;
    }
  }
  public function createLog($table, $fields, $message, $userId)
  {
    $log = Recovery::$db->prepare("
            INSERT INTO " . $table . "($fields) 
            VALUES ( :id, NOW(), NOW(), :msg, :msg)
        ");
    $log->bindParam(':id', $userId);
    $log->bindParam(':msg', $message);
    $log->bindParam(':msg', $message);

    $log->execute();
  }
  protected function getMailer()
  {
    $mailer = new PHPMailer;
    $mailer->isSMTP();
    $mailer->SMTPAuth = true;  // authentication enabled
    $mailer->SMTPSecure = 'tls'; // secure transfer enabled REQUIRED for GMail
    $mailer->SMTPAutoTLS = false;
    $mailer->Host = 'smtp.gmail.com';
    $mailer->Port = 587;
    $mailer->Username = RECOVERY_EMAIL;
    $mailer->Password = RECOVERY_EMAIL_PASSWORD;
    $mailer->setFrom(RECOVERY_EMAIL_PASSWORD);
    $mailer->IsHTML(true);
    return $mailer;
  }
  public function sendPasswordRecoveryEmail($email, $recoveryLink)
  {
    $mailer = $this->getMailer();
    $template = "<!DOCTYPE html>
<html>
<head>

  <meta charset='utf-8'>
  <meta http-equiv='x-ua-compatible' content='ie=edge'>
  <title>Password Reset</title>
  <meta name='viewport' content='width=device-width, initial-scale=1'>
  <style type='text/css'>
  /**
   * Google webfonts. Recommended to include the .woff version for cross-client compatibility.
   */
  @media screen {
    @font-face {
      font-family: 'Source Sans Pro';
      font-style: normal;
      font-weight: 400;
      src: local('Source Sans Pro Regular'), local('SourceSansPro-Regular'), url(https://fonts.gstatic.com/s/sourcesanspro/v10/ODelI1aHBYDBqgeIAH2zlBM0YzuT7MdOe03otPbuUS0.woff) format('woff');
    }

    @font-face {
      font-family: 'Source Sans Pro';
      font-style: normal;
      font-weight: 700;
      src: local('Source Sans Pro Bold'), local('SourceSansPro-Bold'), url(https://fonts.gstatic.com/s/sourcesanspro/v10/toadOcfmlt9b38dHJxOBGFkQc6VGVFSmCnC_l7QZG60.woff) format('woff');
    }
  }

  /**
   * Avoid browser level font resizing.
   * 1. Windows Mobile
   * 2. iOS / OSX
   */
  body,
  table,
  td,
  a {
    -ms-text-size-adjust: 100%; /* 1 */
    -webkit-text-size-adjust: 100%; /* 2 */
  }

  /**
   * Remove extra space added to tables and cells in Outlook.
   */
  table,
  td {
    mso-table-rspace: 0pt;
    mso-table-lspace: 0pt;
  }

  /**
   * Better fluid images in Internet Explorer.
   */
  img {
    -ms-interpolation-mode: bicubic;
  }

  /**
   * Remove blue links for iOS devices.
   */
  a[x-apple-data-detectors] {
    font-family: inherit !important;
    font-size: inherit !important;
    font-weight: inherit !important;
    line-height: inherit !important;
    color: inherit !important;
    text-decoration: none !important;
  }

  /**
   * Fix centering issues in Android 4.4.
   */
  div[style*='margin: 16px 0;'] {
    margin: 0 !important;
  }

  body {
    width: 100% !important;
    height: 100% !important;
    padding: 0 !important;
    margin: 0 !important;
  }

  /**
   * Collapse table borders to avoid space between cells.
   */
  table {
    border-collapse: collapse !important;
  }

  a {
    color: #1a82e2;
  }

  img {
    height: auto;
    line-height: 100%;
    text-decoration: none;
    border: 0;
    outline: none;
  }
  </style>

</head>
<body style='background-color: #e9ecef;'>

  <!-- start preheader -->
  <div class='preheader' style='display: none; max-width: 0; max-height: 0; overflow: hidden; font-size: 1px; line-height: 1px; color: #fff; opacity: 0;'>
    A password reset was requested.
  </div>
  <!-- end preheader -->

  <!-- start body -->
  <table border='0' cellpadding='0' cellspacing='0' width='100%'>

    <!-- start logo -->
    <tr>
      <td align='center' bgcolor='#e9ecef'>
        <!--[if (gte mso 9)|(IE)]>
        <table align='center' border='0' cellpadding='0' cellspacing='0' width='600'>
        <tr>
        <td align='center' valign='top' width='600'>
        <![endif]-->
        <table border='0' cellpadding='0' cellspacing='0' width='100%' style='max-width: 600px;'>
          <tr>
            <td align='center' valign='top' style='padding: 36px 24px;'>
              <a href='" . base_url() . "' target='_blank' style='display: inline-block;'>
                formlog
                              </a>
            </td>
          </tr>
        </table>
        <!--[if (gte mso 9)|(IE)]>
        </td>
        </tr>
        </table>
        <![endif]-->
      </td>
    </tr>
    <!-- end logo -->

    <!-- start hero -->
    <tr>
      <td align='center' bgcolor='#e9ecef'>
        <!--[if (gte mso 9)|(IE)]>
        <table align='center' border='0' cellpadding='0' cellspacing='0' width='600'>
        <tr>
        <td align='center' valign='top' width='600'>
        <![endif]-->
        <table border='0' cellpadding='0' cellspacing='0' width='100%' style='max-width: 600px;'>
          <tr>
            <td align='left' bgcolor='#ffffff' style='padding: 36px 24px 0; font-family:  Helvetica, Arial, sans-serif; border-top: 3px solid #d4dadf;'>
              <h1 style='margin: 0; font-size: 32px; font-weight: 700; letter-spacing: -1px; line-height: 48px;'>Reset Your Password</h1>
            </td>
          </tr>
        </table>
        <!--[if (gte mso 9)|(IE)]>
        </td>
        </tr>
        </table>
        <![endif]-->
      </td>
    </tr>
    <!-- end hero -->

    <!-- start copy block -->
    <tr>
      <td align='center' bgcolor='#e9ecef'>
        <!--[if (gte mso 9)|(IE)]>
        <table align='center' border='0' cellpadding='0' cellspacing='0' width='600'>
        <tr>
        <td align='center' valign='top' width='600'>
        <![endif]-->
        <table border='0' cellpadding='0' cellspacing='0' width='100%' style='max-width: 600px;'>

          <!-- start copy -->
          <tr>
            <td align='left' bgcolor='#ffffff' style='padding: 24px; font-family: Helvetica, Arial, sans-serif; font-size: 16px; line-height: 24px;'>
              <p style='margin: 0;'>Tap the button below to reset your customer account password. If you didn't request a new password, you can safely delete this email.</p>
            </td>
          </tr>
          <!-- end copy -->

          <!-- start button -->
          <tr>
            <td align='left' bgcolor='#ffffff'>
              <table border='0' cellpadding='0' cellspacing='0' width='100%'>
                <tr>
                  <td align='center' bgcolor='#ffffff' style='padding: 12px;'>
                    <table border='0' cellpadding='0' cellspacing='0'>
                      <tr>
                        <td align='center' bgcolor='#1a82e2' style='border-radius: 6px;'>
                          <a href='$recoveryLink' target='_blank' style='display: inline-block; padding: 16px 36px; font-family: Helvetica, Arial, sans-serif; font-size: 16px; color: #ffffff; text-decoration: none; border-radius: 6px;'>Reset password</a>
                        </td>
                      </tr>
                    </table>
                  </td>
                </tr>
              </table>
            </td>
          </tr>
          <!-- end button -->

          <!-- start copy -->
          <tr>
            <td align='left' bgcolor='#ffffff' style='padding: 24px; font-family: Helvetica, Arial, sans-serif; font-size: 16px; line-height: 24px;'>
              <p style='margin: 0;'>If that doesn't work, copy and paste the following link in your browser:</p>
              <p style='margin: 0;'><a href='$recoveryLink' target='_blank'>$recoveryLink</a></p>
            </td>
          </tr>
          <!-- end copy -->

          <!-- start copy -->
          <tr>
            <td align='left' bgcolor='#ffffff' style='padding: 24px; font-family:  Helvetica, Arial, sans-serif; font-size: 16px; line-height: 24px; border-bottom: 3px solid #d4dadf'>
              <p style='margin: 0;'>Cheers,<br>The Formlog Team</p>
            </td>
          </tr>
          <!-- end copy -->

        </table>
        <!--[if (gte mso 9)|(IE)]>
        </td>
        </tr>
        </table>
        <![endif]-->
      </td>
    </tr>
    <!-- end copy block -->

    <!-- start footer -->
    <tr>
      <td align='center' bgcolor='#e9ecef' style='padding: 24px;'>
        <!--[if (gte mso 9)|(IE)]>
        <table align='center' border='0' cellpadding='0' cellspacing='0' width='600'>
        <tr>
        <td align='center' valign='top' width='600'>
        <![endif]-->
        <table border='0' cellpadding='0' cellspacing='0' width='100%' style='max-width: 600px;'>

          <!-- start permission -->
          <tr>
            <td align='center' bgcolor='#e9ecef' style='padding: 12px 24px; font-family:  Helvetica, Arial, sans-serif; font-size: 14px; line-height: 20px; color: #666;'>
              <p style='margin: 0;'>You received this email because we received a request for Password Recovery for your account. If you didn't request it you can safely delete this email.</p>
            </td>
          </tr>
          <!-- end permission -->

        

        </table>
        <!--[if (gte mso 9)|(IE)]>
        </td>
        </tr>
        </table>
        <![endif]-->
      </td>
    </tr>
    <!-- end footer -->

  </table>


</body>
</html>";
    $mailer->addAddress($email);

    $mailer->Subject = "Password recovery";
    $mailer->Body = $template;
    $mailer->send();
  }

  protected function generateRecoveryURL(): array
  {
    $selector = bin2hex(random_bytes(8));
    $tokenBytes = random_bytes(32);
    $token = bin2hex($tokenBytes);

    $url = base_url() . "createnewpassword.php?selector=$selector&token=$token";
    $expires = date("U") + 600;

    return ['selector' => $selector, "tokenBytes" => $tokenBytes, "token" => $token, "resetUrl" => $url, "expiry" => $expires];
  }
  protected function removePreviousResetRequests($email)
  {
    try {
      // Prepare statement
      $stmt = Recovery::$db->prepare("
                DELETE FROM " . Database::DB_TABLE_RECOVERY . " 
                WHERE PwdResetEmail=:email");
      $stmt->bindParam(':email', $email);
      // Execute statement with values
      $stmt->execute();
    } //catch exception
    catch (\Exception $e) {
      echo 'Message: ' . $e->getMessage();
    }
  }
  protected function storeRecoveryDetailsInDB($email, $recoveryDetails)
  {
    try {
      // Prepare statement
      $stmt = Recovery::$db->prepare("
                INSERT INTO " . Database::DB_TABLE_RECOVERY . " ( `PwdResetEmail`, `PwdResetSelector`, `PwdResetToken`, `PwdResetExpires`)
                VALUES ( :email, :selector, :token, :expires)");
      $stmt->bindParam(':email', $email);
      $stmt->bindParam(':selector', $recoveryDetails['selector']);
      //hash reset token before insertion
      $hashedToken = password_hash($recoveryDetails['tokenBytes'], PASSWORD_DEFAULT);
      $stmt->bindParam(':token', $hashedToken);
      $stmt->bindParam(':expires', $recoveryDetails['expiry']);

      // Execute statement with values
      $stmt->execute();
    } //catch exception
    catch (\Exception $e) {
      echo 'Message: ' . $e->getMessage();
    }
  }
  public function searchUserId($databaseTable, $userIDField, $email)
  {
    try {
      // Prepare statement
      $stmt = Recovery::$db->prepare("
            SELECT * FROM " . $databaseTable . " 
            WHERE (Email1=:email1 )
        ");
      $stmt->bindParam(':email1', $email);

      // Execute statement with values
      $stmt->execute();
      $stmt->setFetchMode(PDO::FETCH_ASSOC);
      if ($stmt->rowCount() > 0) {
        $result = $stmt->fetch();
        return $result[$userIDField];
      } else {
        return false;
      }
    } //catch exception
    catch (\Exception $e) {
      echo 'Message: ' . $e->getMessage();
    }
    return false;
  }
  /**
   * The password recovery method.
   * 
   *
   * @param usernameOrEmail the email or username of the user
   * 
   *
   * @return bool returns true if the provided username or email was found in the database
   * @access  public
   */
  public function requestPasswordRecovery($usernameOrEmail): bool
  {
    $userType = null;
    $userId = null;
    for ($i = 0; $i < 3; $i++) {
      $userId = $this->searchUserId(Database::DB_TABLES[$i], Database::DB_ID_FIELDS[$i], $usernameOrEmail);
      if ($userId) {
        $userType = $i;
        break;
      }
    }
    if (!$userType) {
      return false;
    }
    $logTable = Database::DB_TABLES_LOG[$userType];
    $logFields =
      Database::DB_TABLES_LOG_FIELDS[$userType];
    $recoveryEmail = $usernameOrEmail;
    $userId = $userId;
    $recoveryDetails = $this->generateRecoveryURL();
    $this->removePreviousResetRequests($recoveryEmail);
    $this->storeRecoveryDetailsInDB($recoveryEmail, $recoveryDetails);
    $this->sendPasswordRecoveryEmail($recoveryEmail, $recoveryDetails['resetUrl']);

    $this->createLog($logTable, $logFields, "Password forgotten, reset email sent to $recoveryEmail", $userId);

    return true;
  }

  protected function getTokenInfo($selector): array
  {
    $result = [];
    try {
      // Prepare statement
      $stmt = Recovery::$db->prepare("
                SELECT * FROM " . Database::DB_TABLE_RECOVERY . " 
                WHERE PwdResetSelector=:selector AND PwdResetExpires >= :date
            ");
      $currentDate = date("U");
      $stmt->bindParam(':selector', $selector);
      $stmt->bindParam(':date', $currentDate);

      // Execute statement with values
      $stmt->execute();
      $stmt->setFetchMode(PDO::FETCH_ASSOC);
      if ($stmt->rowCount() > 0) {
        $result = $stmt->fetch();
      }
    } //catch exception
    catch (\Exception $e) {
      echo 'Message: ' . $e->getMessage();
    }
    return $result;
  }
  public function setPassword($password, $email, $table)
  {
    try {
      // Prepare statement
      $stmt = Recovery::$db->prepare("
                UPDATE " . $table . " 
                SET Password=:pass WHERE Email1=:email
            ");
      $stmt->bindParam(':pass', $password);
      $stmt->bindParam(':email', $email);
      // Execute statement with values
      $stmt->execute();
    } //catch exception
    catch (\Exception $e) {
      echo 'Message: ' . $e->getMessage();
    }
  }
  public function changePassword($password, $email)
  {
    $userType = null;
    for ($i = 0; $i < 3; $i++) {
      $userId = $this->searchUserId(Database::DB_TABLES[$i], Database::DB_ID_FIELDS[$i], $email);
      if ($userId) {
        $userType = $i;
        break;
      }
    }

    $this->setPassword($password, $email, Database::DB_TABLES[$userType]);
  }
  protected function verifyTokenMatch($token, $tokenHash): bool
  {
    $tokenBin = hex2bin($token);

    $tokenCheck = password_verify($tokenBin, $tokenHash);
    return $tokenCheck;
  }
  //Returns information about password reset request if valid, otherwise returns false.
  public function verifyAccessToken($token, $selector)
  {
    //verify string is hexadecimal
    if (!ctype_xdigit($selector)) {
      return false;
    }
    if (!ctype_xdigit($token)) {
      return false;
    }
    $tokenInformation = $this->getTokenInfo($selector);
    if ($this->verifyTokenMatch($token, $tokenInformation['PwdResetToken'])) {
      return $tokenInformation;
    } else {
      return false;
    }
  }
}
