<?php
function get_raids() {
    global $db;
    $query = 'SELECT * FROM raid';
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

function get_raids_by_time() {
    global $db;
    $query = 'SELECT * FROM raid ORDER BY raidStart';
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

function get_raid($raid_ID) {
    global $db;
    $query = 'SELECT *
              FROM raid
              WHERE raidID = :raid_ID';
    try {
        $statement = $db->prepare($query);
        $statement->bindValue(':raid_ID', $raid_ID);
        $statement->execute();
        $result = $statement->fetch();
        $statement->closeCursor();
        return $result;
    } catch (PDOException $e) {
        $error_message = $e->getMessage();
        display_db_error($error_message);
    }
}

function add_raid($raid_Name, $raid_Day, $raid_Start, $raid_End) {
    global $db;
    $query = 'INSERT INTO raid
                 (raidName, raidDay, raidStart, raidEnd)
              VALUES
                 (:raid_Name, :raid_Day, :raid_Start, :raid_End)';
    try {
        $statement = $db->prepare($query);
        $statement->bindValue(':raid_Name', $raid_Name);
        $statement->bindValue(':raid_Day', $raid_Day);
        $statement->bindValue(':raid_Start', $raid_Start);
        $statement->bindValue(':raid_End', $raid_End);
        $statement->execute();
        $statement->closeCursor();

        // Get the last product ID that was automatically generated
        $raid_ID = $db->lastInsertId();
        return $raid_ID;
    } catch (PDOException $e) {
        $error_message = $e->getMessage();
        display_db_error($error_message);
    }
}

function update_raid($raid_ID, $raid_Name, $raid_Date, $raid_Duration) {
    global $db;
    $query = 'UPDATE raid
              SET raidName = :raid_Name,
                  raidDate = :raid_Date,
                  raidDuration = :raid_Duration,
              WHERE raidID = :raid_ID';
    try {
        $statement = $db->prepare($query);
        $statement->bindValue(':raid_Name', $raid_Name);
        $statement->bindValue(':raid_Date', $raid_Date);
        $statement->bindValue(':raid_Duration', $raid_Duration);
        $statement->bindValue(':raid_ID', $raid_ID);
        $row_count = $statement->execute();
        $statement->closeCursor();
        return $row_count;
    } catch (PDOException $e) {
        $error_message = $e->getMessage();
        display_db_error($error_message);
    }
}

function delete_raid($raid_ID) {
    global $db;
    $bosses_ID = get_bosses_from_raid_list($raid_ID);
    foreach ($bosses_ID as $boss_ID) {
        delete_raid_boss($raid_ID, $boss_ID);
    }
    $query = 'DELETE FROM raid WHERE raidID = :raid_ID';
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

function add_team_to_raid($team_ID, $raid_ID) {
    global $db;
    $query = 'UPDATE raid SET teamID = :team_ID WHERE raid.raidID = :raid_ID';
    try {
        $statement = $db->prepare($query);
        $statement->bindValue(':team_ID', $team_ID);
        $statement->bindValue(':raid_ID', $raid_ID);
        $row_count = $statement->execute();
        $statement->closeCursor();
        return $row_count;
    } catch (PDOException $e) {
        $error_message = $e->getMessage();
        display_db_error($error_message);
    }
}

function get_Raid_Name_from_ID($raid_ID) {
    global $db;
    $query = 'SELECT raidName
              FROM raid
              WHERE raid_ID = :raid_ID';
    if ($raid_ID == NULL) {
        return '<i>None</i>';
    } else {
        try {
            $statement = $db->prepare($query);
            $statement->bindValue(':raid_ID', $raid_ID);
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