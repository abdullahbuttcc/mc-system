<?php

namespace Core;

require_once __DIR__ . '/../config/Database.php';

use Config\Database;
use Exception;
use PDO;

/**
 * The authentication class.
 *
 * This class authenticates users.
 *
 * @category   Authentication
 * @package    Core
 */
class Authentication
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

    public function searchUserId($databaseTable, $userIDField, $email)
    {
        try {
            // Prepare statement
            $stmt = Authentication::$db->prepare("
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
    public function checkPassword($databaseTable, $userIDField, $userId, $password)
    {
        try {
            // Prepare statement
            $stmt2 = Authentication::$db->prepare("
            SELECT * FROM " . $databaseTable . " 
            WHERE ( " . $userIDField . "=:id)
        ");
            $stmt2->bindParam(':id', $userId);
            // Execute statement with values
            $stmt2->execute();
            $stmt2->setFetchMode(PDO::FETCH_ASSOC);
            if ($stmt2->rowCount() > 0) {
                $result = $stmt2->fetch();
                if ($result['Password'] === $password) {
                    return $result;
                } else {
                    return false;
                }
            }
        } catch (Exception $e) {
            echo 'Message: ' . $e->getMessage();
        }
    }
    public function createLog($table, $fields, $message, $userId)
    {
        $log = Authentication::$db->prepare("
            INSERT INTO " . $table . "($fields) 
            VALUES (:id, NOW(), NOW(), :msg, :msg)
        ");
        $log->bindParam(':id', $userId);
        $log->bindParam(':msg', $message);
        $log->bindParam(':msg', $message);

        $log->execute();
    }
    public function logout()
    {
        //Log the event
        $type = $_SESSION['userType'];
        $table = Database::DB_TABLES_LOG[$type];
        $fields = Database::DB_TABLES_LOG_FIELDS[$type];
        $userId = $_SESSION['userID'];
        $this->createLog($table, $fields, "User logged out", $userId);
        session_unset();
    }
    /**
     * The login method.
     * 
     *
     * @param usernameOrEmail the email or username of the user
     * @param password the password of the user
     *
     * @return array has two keys, 'success' and 'errors' , success key indicates whether login was successful or not
     * the errors key logs any errors such as invalid username or password
     * @access  public
     */
    public function login($usernameOrEmail, $password): array
    {
        $response = ["success" => false, "passError" => false, "usernameError" => false, "type" => false];


        $userId = false;
        $userType = null;
        for ($i = 0; $i < 3; $i++) {
            $userId = $this->searchUserId(Database::DB_TABLES[$i], Database::DB_ID_FIELDS[$i], $usernameOrEmail);
            if ($userId) {
                $userType = $i;
                break;
            }
        }
        if ($userId) {
            $result = $this->checkPassword(Database::DB_TABLES[$userType], Database::DB_ID_FIELDS[$userType], $userId, $password);
            if ($result) {
                $_SESSION['name'] = ucfirst($result['FirstName']);
                $_SESSION['loggedIn'] = true;
                $_SESSION['userID'] = $result[Database::DB_ID_FIELDS[$userType]];
                $_SESSION['username'] = $result[Database::DB_ID_FIELDS[$userType]];
                $_SESSION['email'] = $result['Email1'];
                $_SESSION['userType'] = $userType;
                $response['success'] = true;

                //Log the event
                $type = $_SESSION['userType'];
                $table = Database::DB_TABLES_LOG[$type];
                $fields = Database::DB_TABLES_LOG_FIELDS[$type];
                $userId = $_SESSION['userID'];
                $this->createLog($table, $fields, "User logged in", $userId);
                $response = ["success" => true, "passError" => false, "usernameError" => false, "type" => $type];
            } else {
                $response = ["success" => false, "passError" => true, "usernameError" => false, "type" => false];
            }
        } else {
            $response = ["success" => false, "passError" => false, "usernameError" => true, "type" => false];
            return $response;
        }


        // Return the result of the operation.
        return $response;
    }

        public function insertToCvs($arr,$table_name) {        
            $response = ["success" => false, "usernameError" => true];
            $cols=implode(",",array_keys($arr));
            $query_text="";
            $data=array();
            foreach ($arr as $key=>$values) {
                if ($query_text=="") {
                    $query_text="?";
                    $data[]=$values;
                } else {
                    $query_text.=",?";
                    $data[]=$values;
                }
            }
            $query="insert into {$table_name} ($cols) values ($query_text)";
            try {
                // Prepare statement
                $stmt = Authentication::$db->prepare($query);
                $result = $stmt->execute($data);
                if ($result > 0) {
                   $response = ["success" => true, "usernameError" => false];
                }else{
                    $response = ["success" => false, "usernameError" => true];
                }
            }
            //catch exception
            catch (\Exception $e) {
                echo 'Message: ' . $e->getMessage();
            }


            // Return the result of the operation.
            return $response;
        }

        public function getRow($query){
            $response = ["success" => false, "usernameError" => true];
            try {
                // Prepare statement
                $stmt = Authentication::$db->prepare($query);
                $stmt->execute();
                return $stmt->fetch();  
            }
            //catch exception
            catch (\Exception $e) {
                echo 'Message: ' . $e->getMessage();
            }
        }

        public function fetch_all($query)
        {
            $stmt = Authentication::$db->prepare($query);
            $stmt->execute();
            $stmt->setFetchMode(PDO::FETCH_ASSOC);
            return $stmt->fetchAll();
        }

        public function query($query){
            try {
                $stmt=Authentication::$db->prepare($query);
                $result=$stmt->execute();
                return $result;
            } catch (PDOException $e) {
                print $e->getMessage();
                die();
            }
        }

        public function update($id,$arr,$table_name,$wherecol){
            $response = ["success" => false, "usernameError" => true];
            $q='';
            $data=array();
            foreach($arr as $key=>$value){
                if($q=='') {
                    $q.="$key=?";
                    $data[]=$value;
                } else {
                    $q.=",$key=?";
                    $data[]=$value;
                }
            }
            $query="update {$table_name} set $q where ".$wherecol." = ".intval($id);
            try {
                // Prepare statement
                $stmt = Authentication::$db->prepare($query);
                $result = $stmt->execute($data);
                if ($result > 0) {
                   $response = ["success" => true, "usernameError" => false];
                }else{
                    $response = ["success" => false, "usernameError" => true];
                }
            }
            //catch exception
            catch (\Exception $e) {
                echo 'Message: ' . $e->getMessage();
            }


            // Return the result of the operation.
            return $response;
        }

}
