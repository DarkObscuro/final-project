<?php 

function get_player_count_by_job() {
    global $db;
    $query = 'SELECT playerJob, count(*) FROM player GROUP BY playerJob';
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

function get_player_count_by_job_list() {
    $temp = get_player_count_by_job();
    $res [sizeof($temp) - 1][0] = 2;
    for ($i=0; $i<sizeof($temp); $i++) {
        $res[$i][0] = $temp[$i][0];
        $res[$i][1] = $temp[$i][1];
    }
    return $res;
}


?>