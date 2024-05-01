<?php

class User {

    var $role_id;
    var $username;
    var $password;

}

require('../utils/db_utils.php');
class User_Account_Utils extends User {

    public $conn;

    public function __construct()
    {
        $this->conn = db_connect();
        
        if ($this->conn->connect_error == null) {
            echo "success!";
        } else {
            echo "FAILED! " . $this->conn->connect_error;
        }
        
    }

    public function selectSingle($key) {
        if ($key == null) {
            return false;
        }
        $qry = 'SELECT * FROM Tracker_User WHERE username = ?';
        $stmt = '';
        $stmt = $this->conn->prepare($qry);
        $stmt->bind_param('s', $key);
        $stmt->execute();
        $stmt->bind_result(
            $this->username,
            $this->password);
        
        $row = array();
        if ($stmt->fetch()) {
            array_push($row, $this->username);
            array_push($row, $this->password);
        }
        if (!empty($row)) {
            return true;
        } else {
            return false;
        }

    }

    public function insert($values) {
        if ($values == null){
            return false;
        }
    
        $qry = "INSERT INTO Tracker_User (role_id, username, password) VALUES (?, ?, ?)";
        $stmt = $this->conn->prepare($qry);
        if (!$stmt) {
            echo "Statement prep error";
            return false;
        }
        $stmt->bind_param(
            'iss',
            $values['role_id'],
            $values['username'], 
            $values['password']);

        $stmt->execute();
        if ($stmt->affected_rows == 1) {
            return false;
        } else {
            return true;
        }
    }



    public function update($row) {
        if ($row == null) {
            return false;
        }

        $qry = 'UPDATE Tracker_User SET role_id = (?), username = (?), password = (?) 
                WHERE username = (?)';

        $stmt = $this->conn->prepare($qry);
        $stmt->bind_param('isss', $row['role_id'], $row['username'], $row['password'], $row['username']);

        $success = $stmt->execute();
        if (!$success) {
            echo "Update failed: " . $stmt->error;
        } else {
            echo "Update Successful!";
        }
    }

    
    public function delete($user){
        if ($user == null) {
            return false;
        }

        $qry = 'DELETE FROM Tracker_User WHERE username = ?';
        $stmt = $this->conn->prepare($qry);
        $stmt->bind_param('s', $user);

        $stmt->execute();
        if ($stmt->affected_rows == 1) {
            echo "Delete failed: " . $stmt->error;
        } else {
            echo "Delete Successful!";
        }
    }

    public function __destruct() {
        $this->conn->close();
    }

}


?>