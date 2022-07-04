<?php
function get_team_by_name($name) {
    global $db;
    $query = 'SELECT * FROM team
              WHERE teamName = :name';
    try {
        $statement = $db->prepare($query);
        $statement->bindValue(':name', $name);
        $statement->execute();
        $result = $statement->fetchAll();
        $statement->closeCursor();
        return $result;
    } catch (PDOException $e) {
        $error_message = $e->getMessage();
        display_db_error($error_message);
    }
}

function get_team($team_ID) {
    global $db;
    $query = 'SELECT *
              FROM team
              WHERE teamID = :team_ID';
    try {
        $statement = $db->prepare($query);
        $statement->bindValue(':team_ID', $team_ID);
        $statement->execute();
        $result = $statement->fetch();
        $statement->closeCursor();
        return $result;
    } catch (PDOException $e) {
        $error_message = $e->getMessage();
        display_db_error($error_message);
    }
}

function add_team($team_ID, $team_Name) {
    global $db;
    $query = 'INSERT INTO team
                 (teamID, teamName)
              VALUES
                 (:team_ID, :team_Name)';
    try {0
        $statement = $db->prepare($query);
        $statement->bindValue(':team_ID', $team_ID);
        $statement->bindValue(':team_Name', $team_Name);
        $statement->execute();
        $statement->closeCursor();

        // Get the last product ID that was automatically generated
        $team_ID = $db->lastInsertId();
        return $team_ID;
    } catch (PDOException $e) {
        $error_message = $e->getMessage();
        display_db_error($error_message);
    }
}

function update_team($team_ID, $team_Name) {
    global $db;
    $query = 'UPDATE team
              SET teamName = :team_Name,
                  playerPseudo = :player_Pseudo
              WHERE teamID = :team_ID';
    try {
        $statement = $db->prepare($query);
        $statement->bindValue(':team_Name', $team_Name);
        $statement->bindValue(':team_ID', $team_ID);
        $row_count = $statement->execute();
        $statement->closeCursor();
        return $row_count;
    } catch (PDOException $e) {
        $error_message = $e->getMessage();
        display_db_error($error_message);
    }
}

function delete_product($team_ID) {
    global $db;
    $query = 'DELETE FROM team WHERE teamID = :team_ID';
    try {
        $statement = $db->prepare($query);
        $statement->bindValue(':team_ID', $team_ID);
        $row_count = $statement->execute();
        $statement->closeCursor();
        return $row_count;
    } catch (PDOException $e) {
        $error_message = $e->getMessage();
        display_db_error($error_message);
    }
}
?>