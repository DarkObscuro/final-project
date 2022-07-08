<?php
require('../../model/database.php');
require('../../model/player_db.php');
require('../../model/raid_db.php');
require('../../model/team_db.php');
require('../../model/raid_boss_db.php');
require('../../model/boss_db.php');
require('../../model/chart_db.php');
include('../../view/header.php'); 




$jobs_count = get_player_count_by_job_list();
foreach ($jobs_count as $job_count) {
    print_r($job_count);
    echo '<br>';
}

$dataPoints = array();
foreach($jobs_count as $job_count){
    array_push($dataPoints, array("label"=> $job_count[0], "y"=> $job_count[1], "color"=> "#796D30"));
}

foreach ($dataPoints as $dataPoint) {
    print_r($dataPoint);
    echo '<br>';
}
?>

<main>
    <h1>Statistics</h1>
    <script src="https://canvasjs.com/assets/script/canvasjs.min.js"></script>
    <script type="text/javascript">

    window.onload = function () {
        var chart = new CanvasJS.Chart("chartContainer", {
            title:{
                text: "Total players per job"              
            },
            data: [              
            {
                // Change type to "doughnut", "line", "splineArea", etc.
                type: "column",
                dataPoints: <?php echo json_encode($dataPoints, JSON_NUMERIC_CHECK); ?>
            }
            ]
        });
        chart.render();
    }
    </script>
    <div id="chartContainer" style="height: 300px; width: 100%;"></div>
    <p class="last_paragraph"><a href="../../index.php">Back</a></p>
</main>
<?php include '../../view/footer.php'; ?>