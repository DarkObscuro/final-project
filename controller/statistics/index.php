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
$dataPoints = array();
foreach($jobs_count as $job_count){
    array_push($dataPoints, array("label"=> $job_count[0], "y"=> $job_count[1], "color"=> $job_count[2]));
}

?>

<main>
    <h1>Statistics</h1>
    <script src="https://canvasjs.com/assets/script/canvasjs.min.js"></script>
    <script type="text/javascript">
    

    window.onload = function () {
        var chart1 = new CanvasJS.Chart("chartContainer1", {
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
        chart1.render();

        var chart2 = new CanvasJS.Chart("chartContainer2", {
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
        chart2.render();
    }
    </script>
    <div class="charts_container">
        <div class="chart" id="chartContainer1"></div>
        <div class="chart" id="chartContainer2"></div>
    </div>
    <p class="last_paragraph"><a href="../../index.php">Back</a></p>
</main>
<?php include '../../view/footer.php'; ?>