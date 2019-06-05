<?php
    function add_user($username, $password){
        global $db;
        $password_hash = password_hash($password, PASSWORD_DEFAULT);
        $query = "INSERT INTO group7users
            (username, password)
            VALUES (:username, :password)";
        $statement = $db->prepare($query);
        $statement->bindValue(':username',$username);
        $statement->bindValue(':password',$password_hash);
        $statement->execute();
        $statement->closeCursor();
        return $db->lastInsertId();
    }

    function get_user($username){
        global $db;
        $query = "SELECT * 
            FROM group7users
            WHERE username = :username";
        $statement = $db->prepare($query);
        $statement->bindValue(':username',$username);
        $statement->execute();
        $user = $statement->fetch();
        $statement->closeCursor();
        return $user;
    }
?>