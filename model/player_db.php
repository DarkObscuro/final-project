<?php
function get_players() {
    global $db;
    $query = 'SELECT * FROM player';
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

function get_player_by_pseudo($pseudo) {
    global $db;
    $query = 'SELECT * FROM player
              WHERE playerPseudo = :pseudo';
    try {
        $statement = $db->prepare($query);
        $statement->bindValue(':pseudo', $pseudo);
        $statement->execute();
        $result = $statement->fetchAll();
        $statement->closeCursor();
        return $result;
    } catch (PDOException $e) {
        $error_message = $e->getMessage();
        display_db_error($error_message);
    }
}

function get_player($player_ID) {
    global $db;
    $query = 'SELECT *
              FROM player
              WHERE playerID = :player_ID';
    try {
        $statement = $db->prepare($query);
        $statement->bindValue(':player_ID', $player_ID);
        $statement->execute();
        $result = $statement->fetch();
        $statement->closeCursor();
        return $result;
    } catch (PDOException $e) {
        $error_message = $e->getMessage();
        display_db_error($error_message);
    }
}

function add_player($player_Pseudo, $player_Job,
        $player_Title, $player_FC) {
    global $db;
    $query = 'INSERT INTO player
                 (playerPseudo, playerJob, playerTitle, playerFC)
              VALUES
                 (:player_Pseudo, :player_Job, :player_Title, :player_FC)';
    try {
        $statement = $db->prepare($query);
        $statement->bindValue(':player_Pseudo', $player_Pseudo);
        $statement->bindValue(':player_Job', $player_Job);
        $statement->bindValue(':player_Title', $player_Title);
        $statement->bindValue(':player_FC', $player_FC);
        $statement->execute();
        $statement->closeCursor();

        // Get the last product ID that was automatically generated
        $player_ID = $db->lastInsertId();
        return $player_ID;
    } catch (PDOException $e) {
        $error_message = $e->getMessage();
        display_db_error($error_message);
    }
}

function update_player($player_ID, $team_ID, $player_Pseudo, $player_Job,
$player_Title, $player_FC) {
    global $db;
    $query = 'UPDATE player
              SET teamID = :team_ID,
                  playerPseudo = :player_Pseudo,
                  playerJob = :player_Job,
                  playerTitle = :player_Title,
                  playerFC = :player_FC
              WHERE playerID = :player_ID';
    try {
        $statement = $db->prepare($query);
        $statement->bindValue(':team_ID', $team_ID);
        $statement->bindValue(':player_Pseudo', $player_Pseudo);
        $statement->bindValue(':player_Job', $player_Job);
        $statement->bindValue(':player_Title', $player_Title);
        $statement->bindValue(':player_FC', $player_FC);
        $statement->bindValue(':player_ID', $player_ID);
        $row_count = $statement->execute();
        $statement->closeCursor();
        return $row_count;
    } catch (PDOException $e) {
        $error_message = $e->getMessage();
        display_db_error($error_message);
    }
}

function delete_player($player_ID) {
    global $db;
    $query = 'DELETE FROM player WHERE playerID = :player_ID';
    try {
        $statement = $db->prepare($query);
        $statement->bindValue(':player_ID', $player_ID);
        $row_count = $statement->execute();
        $statement->closeCursor();
        return $row_count;
    } catch (PDOException $e) {
        $error_message = $e->getMessage();
        display_db_error($error_message);
    }
}

function add_player_to_team($player_ID, $team_ID) {
    global $db;
    $query = 'UPDATE player SET teamID = :team_ID WHERE player.playerID = :player_ID';
    try {
        $statement = $db->prepare($query);
        $statement->bindValue(':team_ID', $team_ID);
        $statement->bindValue(':player_ID', $player_ID);
        $row_count = $statement->execute();
        $statement->closeCursor();
        return $row_count;
    } catch (PDOException $e) {
        $error_message = $e->getMessage();
        display_db_error($error_message);
    }
}
?>