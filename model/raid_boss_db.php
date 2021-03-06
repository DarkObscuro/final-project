<?php
function get_raids_from_boss($boss_ID) {
    global $db;
    $query = 'SELECT raidID
              FROM raid_boss
              WHERE bossID = :boss_ID';
    try {
        $statement = $db->prepare($query);
        $statement->bindValue(':boss_ID', $boss_ID);
        $statement->execute();
        $result = $statement->fetchAll();
        $statement->closeCursor();
        return $result;
    } catch (PDOException $e) {
        $error_message = $e->getMessage();
        display_db_error($error_message);
    }
}

function get_bosses_from_raid($raid_ID) {
    global $db;
    $query = 'SELECT bossID
              FROM raid_boss
              WHERE raidID = :raid_ID';
    try {
        $statement = $db->prepare($query);
        $statement->bindValue(':raid_ID', $raid_ID);
        $statement->execute();
        $result = $statement->fetchAll();
        $statement->closeCursor();
        return $result;
        
    } catch (PDOException $e) {
        $error_message = $e->getMessage();
        display_db_error($error_message);
    }
}

function get_bosses_from_raid_list($raid_ID) {
    $bosses_ID = get_bosses_from_raid($raid_ID);
    $bosses = [sizeof($bosses_ID)];
    for ($i=0; $i<sizeof($bosses_ID); $i++) {
        $bosses[$i] = $bosses_ID[$i][0];
    }
    return $bosses;
}

function add_raid_boss($raid_ID, $boss_ID) {
    global $db;
    $query = 'INSERT INTO raid_boss
                 (raidID, bossID)
              VALUES
                 (:raid_ID, :boss_ID)';
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

function delete_raid_boss($raid_ID, $boss_ID) {
    global $db;
    $query = 'DELETE FROM raid_boss WHERE raidID = :raid_ID AND bossID = :boss_ID';
    try {
        $statement = $db->prepare($query);
        $statement->bindValue(':raid_ID', $raid_ID);
        $statement->bindValue(':boss_ID', $boss_ID);
        $row_count = $statement->execute();
        $statement->closeCursor();
        return $row_count;
    } catch (PDOException $e) {
        $error_message = $e->getMessage();
        display_db_error($error_message);
    }
}

function is_boss_in_raid($raid_ID, $boss_ID) {
    global $db;
    $query = 'SELECT * FROM raid_boss
        WHERE raidID = :raid_ID AND bossID = :boss_ID';
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