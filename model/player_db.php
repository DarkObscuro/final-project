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

function add_player($player_Pseudo, $player_Job, $player_Title, $player_FC) {
    global $db;
    $player_Role = match ($player_Job) {
        'Paladin','Warrior','Dark Knight','Gunbreaker' => 'Tank',
        'White Mage','Scholar','Astrologian','Sage' => 'Healer',
        'Monk','Dragoon','Ninja','Samurai','Reaper' => 'Melee',
        'Bard','Machinist','Dancer' => 'Range',
        'Black Mage','Summoner','Red Mage' => 'Caster',
    };
    $job_Color = match ($player_Job) {
        'Paladin' => '#A8D2E6',
        'Warrior' => '#cf2621',
        'Dark Knight' => '#d126cb',
        'Gunbreaker' => '#796D30',
        'White Mage' => '#FFF0DC',
        'Scholar' => '#8657FF',
        'Astrologian' => '#FFE74A',
        'Sage' => '#80A0F0',
        'Monk' => '#d69c00',
        'Dragoon' => '#4164CD',
        'Ninja' => '#AF1964',
        'Samurai' => '#e46d04',
        'Reaper' => '#965A90',
        'Bard' => '#394925',
        'Machinist' => '#6EE1D6',
        'Dancer' => '#E2B0AF',
        'Black Mage' => '#A579D6',
        'Summoner' => '#2D9B78',
        'Red Mage' => '#e87b7b',
    };
    $role_Color = match ($player_Role) {
        'Tank' => '#4257C0',
        'Healer' => '#487B39',
        'Melee' => '#753637',
        'Range' => '#FCAD03',
        'Caster' => '#641E82',
    };
    $query = 'INSERT INTO player
                 (playerPseudo, playerJob, jobColor, playerRole, roleColor, playerTitle, playerFC)
              VALUES
                 (:player_Pseudo, :player_Job, :job_Color, :player_Role, :role_Color, :player_Title, :player_FC)';
    try {
        $statement = $db->prepare($query);
        $statement->bindValue(':player_Pseudo', $player_Pseudo);
        $statement->bindValue(':player_Job', $player_Job);
        $statement->bindValue(':job_Color', $job_Color);
        $statement->bindValue(':player_Role', $player_Role);
        $statement->bindValue(':role_Color', $role_Color);
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

function get_pseudo_from_ID($player_ID) {
    global $db;
    $query = 'SELECT playerPseudo
              FROM player
              WHERE playerID = :player_ID';
    if ($player_ID == NULL) {
        return '<i>None</i>';
    } else {
        try {
            $statement = $db->prepare($query);
            $statement->bindValue(':player_ID', $player_ID);
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

function get_job_from_ID($player_ID) {
    global $db;
    $query = 'SELECT playerJob
              FROM player
              WHERE playerID = :player_ID';
    if ($player_ID == NULL) {
        return '<i>None</i>';
    } else {
        try {
            $statement = $db->prepare($query);
            $statement->bindValue(':player_ID', $player_ID);
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

function is_player_in_a_team($player_ID) {
    global $db;
    $query = 'SELECT * FROM player WHERE teamID <> NULL';
    try {
        $statement = $db->prepare($query);
        $statement->bindValue(':raid_ID', $raid_ID);
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
?>