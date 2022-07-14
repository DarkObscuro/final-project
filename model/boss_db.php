<?php
function get_bosses() {
    global $db;
    $query = 'SELECT * FROM boss';
    try {
        $statement = $db->prepare($query);
        $statement->execute();
        $result = $statement->fetchAll();
        $statement->closeCursor();
        return $result;
    } catch (PDOException $e) {
        $error_message = $e->getMessage();
        display_db_error($error_message);
    }
}

function get_boss($boss_ID) {
    global $db;
    $query = 'SELECT *
              FROM boss
              WHERE bossID = :boss_ID';
    try {
        $statement = $db->prepare($query);
        $statement->bindValue(':boss_ID', $boss_ID);
        $statement->execute();
        $result = $statement->fetch();
        $statement->closeCursor();
        return $result;
    } catch (PDOException $e) {
        $error_message = $e->getMessage();
        display_db_error($error_message);
    }
}

function get_boss_name_from_id($boss_ID) {
    global $db;
    $query = 'SELECT bossName
              FROM boss
              WHERE bossID = :boss_ID';
    if ($boss_ID == NULL) {
        return '<i>None</i>';
    } else {
        try {
            $statement = $db->prepare($query);
            $statement->bindValue(':boss_ID', $boss_ID);
            $statement->execute();
            $result = $statement->fetch();
            $statement->closeCursor();
            return $result[0];
        } catch (PDOException $e) {
            $error_message = $e->getMessage();
            display_db_error($error_message);
        }
    }
}

function get_difficulty_name_from_id($difficulty_ID) {
    global $db;
    $query = 'SELECT difficultyName
              FROM difficulty
              WHERE difficultyID = :difficulty_ID';
    if ($difficulty_ID == NULL) {
        return '<i>None</i>';
    } else {
        try {
            $statement = $db->prepare($query);
            $statement->bindValue(':difficulty_ID', $difficulty_ID);
            $statement->execute();
            $result = $statement->fetch();
            $statement->closeCursor();
            return $result[0];
        } catch (PDOException $e) {
            $error_message = $e->getMessage();
            display_db_error($error_message);
        }
    }
}
?>