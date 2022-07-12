<?php
function get_teams() {
    global $db;
    $query = 'SELECT * FROM team';
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

function add_team($team_Name) {
    global $db;
    $query = 'INSERT INTO team
                 (teamName)
              VALUES
                 (:team_Name)';
    try {
        $statement = $db->prepare($query);
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


function remove_raid_ID_from_team($raid_ID) {
    global $db;
    $query = 'UPDATE raid SET teamID = NULL WHERE raidID = :raid_ID';
    try {
        $statement = $db->prepare($query);
        $statement->bindValue(':raid_ID', $raid_ID);
        $row_count = $statement->execute();
        $statement->closeCursor();
        return $row_count;
    } catch (PDOException $e) {
        $error_message = $e->getMessage();
        display_db_error($error_message);
    }
}

function remove_player_ID_from_team($player_ID) {
    global $db;
    $tableID = $table_name.`ID`;
    $query = 'UPDATE player  SET teamID = NULL WHERE playerID = :player_ID';
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

function remove_raids_ID_from_team($team_ID) {
    global $db;
    $query = 'SELECT raidID FROM raid WHERE teamID = :team_ID';
    try {
        $statement = $db->prepare($query);
        $statement->bindValue(':team_ID', $team_ID);
        $statement->execute();
        $res = $statement->fetchAll();
        $statement->closeCursor();
    } catch (PDOException $e) {
        $error_message = $e->getMessage();
        display_db_error($error_message);
    }
    $teams_ID = [sizeof($res)];
    for ($i=0; $i<sizeof($res); $i++) {
        $teams_ID[$i] = (int)$res[$i][0];
    }
    foreach ($teams_ID as $team_ID) {
        remove_raid_ID_from_team($team_ID);
    }
}

function remove_players_ID_from_team($team_ID) {
    global $db;
    $query = 'SELECT playerID FROM player WHERE teamID = :team_ID';
    try {
        $statement = $db->prepare($query);
        $statement->bindValue(':team_ID', $team_ID);
        $statement->execute();
        $res = $statement->fetchAll();
        $statement->closeCursor();
    } catch (PDOException $e) {
        $error_message = $e->getMessage();
        display_db_error($error_message);
    }
    $players_ID = [sizeof($res)];
    for ($i=0; $i<sizeof($res); $i++) {
        $players_ID[$i] = (int)$res[$i][0];
    }
    foreach ($players_ID as $player_ID) {
        remove_player_ID_from_team($player_ID);
    }
}

function delete_team($team_ID) {
    global $db;
    remove_raids_ID_from_team($team_ID);
    remove_players_ID_from_team($team_ID);
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

function get_Name_from_ID($team_ID) {
    global $db;
    $query = 'SELECT teamName
              FROM team
              WHERE teamID = :team_ID';
    if ($team_ID == NULL) {
        return '<i>None</i>';
    } else {
        try {
            $statement = $db->prepare($query);
            $statement->bindValue(':team_ID', $team_ID);
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

function get_players_from_team($team_ID) {
    global $db;
    $query = 'SELECT playerID
              FROM player
              WHERE teamID = :team_ID';
    try {
        $statement = $db->prepare($query);
        $statement->bindValue(':team_ID', $team_ID);
        $statement->execute();
        $players_ID = $statement->fetchAll();
        $statement->closeCursor();
        $res = [sizeof($players_ID)];
        for ($i=0; $i<sizeof($players_ID); $i++) {
            $res[$i] = $players_ID[$i][0];
        }
        return $res;
    } catch (PDOException $e) {
        $error_message = $e->getMessage();
        display_db_error($error_message);
    }
}
?>