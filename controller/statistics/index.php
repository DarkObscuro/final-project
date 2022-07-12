<?php
require('../../model/database.php');
require('../../model/player_db.php');
require('../../model/raid_db.php');
require('../../model/team_db.php');
require('../../model/raid_boss_db.php');
require('../../model/boss_db.php');
require('../../model/chart_db.php');
include('../../view/header_stats.php'); 

$jobs_count = get_player_count_by_job_list();
$roles_count = get_player_count_by_role_list();

$dataPoints1 = array();
foreach($jobs_count as $job_count){
    array_push($dataPoints1, array("label"=> $job_count[0], "y"=> $job_count[1], "color"=> $job_count[2]));
}

$dataPoints2 = array();
foreach($roles_count as $role_count){
    array_push($dataPoints2, array("label"=> $role_count[0], "y"=> $role_count[1], "color"=> $role_count[2]));
}

?>

<main>
    <h1>Statistics</h1>
    <script type="text/javascript" src="../../util/canvasjs.min.js"></script>
    <script type="text/javascript">
    
    window.onload = function () {
        var chart1 = new CanvasJS.Chart("chartContainer1", {
            animationEnabled: true,
            theme: "dark1",
            title:{
                text: "Total players per job"              
            },
            data: [              
            {
                // Change type to "doughnut", "line", "splineArea", etc.
                type: "column",
                dataPoints: <?php echo json_encode($dataPoints1, JSON_NUMERIC_CHECK); ?>
            }
            ]
        });
        chart1.render();

        var chart2 = new CanvasJS.Chart("chartContainer2", {
            animationEnabled: true,
            theme: "dark1",
            title:{
                text: "Total players per role"              
            },
            data: [              
            {
                // Change type to "doughnut", "line", "splineArea", etc.
                type: "pie",
                dataPoints: <?php echo json_encode($dataPoints2, JSON_NUMERIC_CHECK); ?>
            }
            ]
        });
        chart2.render();
    }
    </script>
    
    <div class="chart_container" id="chartContainer1"></div>
    <div class="chart_container" id="chartContainer2"></div>
    <p class="last_paragraph"><a href="../../index.php">Back</a></p>
</main>
<?php include '../../view/footer.php'; ?>