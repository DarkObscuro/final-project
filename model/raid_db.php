<?php
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

function add_raid($raid_ID, $team_ID, $raid_Date) {
    global $db;
    $query = 'INSERT INTO raid
                 (raidID, teamID, raidDate)
              VALUES
                 (:raid_ID, :team_ID, :raid_Date)';
    try {
        $statement = $db->prepare($query);
        $statement->bindValue(':raid_ID', $raid_ID);
        $statement->bindValue(':team_ID', $team_ID);
        $statement->bindValue(':raid_Date', $raid_Date);
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

function update_raid($raid_ID, $team_ID, $raid_Date) {
    global $db;
    $query = 'UPDATE raid
              SET teamID = :team_ID,
                  raidDate = :raid_Date
              WHERE raidID = :raid_ID';
    try {
        $statement = $db->prepare($query);
        $statement->bindValue(':team_ID', $team_ID);
        $statement->bindValue(':raid_Date', $raid_Date);
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
?>