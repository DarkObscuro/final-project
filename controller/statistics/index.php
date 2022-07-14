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
$jobs_dps = get_player_job_list();

$dataPoints1 = array();
foreach($jobs_count as $job_count){
    array_push($dataPoints1, array("label"=> $job_count[0], "y"=> $job_count[1], "color"=> $job_count[2]));
}

$dataPoints2 = array();
foreach($roles_count as $role_count){
    array_push($dataPoints2, array("label"=> $role_count[0], "y"=> $role_count[1], "color"=> $role_count[2]));
}

$dataPoints3 = array();
array_push($dataPoints3, array("label"=> 'Paladin', "y"=> rand(5366, 5681), "color"=> '#A8D2E6'));
array_push($dataPoints3, array("label"=> 'Warrior', "y"=> rand(5295, 5608), "color"=> '#cf2621'));
array_push($dataPoints3, array("label"=> 'Dark Knight', "y"=> rand(5644, 5923), "color"=> '#d126cb'));
array_push($dataPoints3, array("label"=> 'Gunbreaker', "y"=> rand(5651, 5931), "color"=> '#796D30'));
array_push($dataPoints3, array("label"=> 'White Mage', "y"=> rand(4880, 5295), "color"=> '#FFF0DC'));
array_push($dataPoints3, array("label"=> 'Scholar', "y"=> rand(4972, 5617), "color"=> '#8657FF'));
array_push($dataPoints3, array("label"=> 'Astrologian', "y"=> rand(4663, 5461), "color"=> '#FFE74A'));
array_push($dataPoints3, array("label"=> 'Sage', "y"=> rand(4949, 5324), "color"=> '#80A0F0'));
array_push($dataPoints3, array("label"=> 'Monk', "y"=> rand(8660, 9240), "color"=> '#d69c00'));
array_push($dataPoints3, array("label"=> 'Dragoon', "y"=> rand(8565, 9185), "color"=> '#4164CD'));
array_push($dataPoints3, array("label"=> 'Ninja', "y"=> rand(8749, 9269), "color"=> '#AF1964'));
array_push($dataPoints3, array("label"=> 'Samurai', "y"=> rand(8710, 9091), "color"=> '#e46d04'));
array_push($dataPoints3, array("label"=> 'Reaper', "y"=> rand(8330, 8804), "color"=> '#965A90'));
array_push($dataPoints3, array("label"=> 'Bard', "y"=> rand(7909, 8687), "color"=> '#91BA5E'));
array_push($dataPoints3, array("label"=> 'Machinist', "y"=> rand(7907, 8242), "color"=> '#6EE1D6'));
array_push($dataPoints3, array("label"=> 'Dancer', "y"=> rand(7774, 8471), "color"=> '#E2B0AF'));
array_push($dataPoints3, array("label"=> 'Black Mage', "y"=> rand(8516, 9013), "color"=> '#A579D6'));
array_push($dataPoints3, array("label"=> 'Summoner', "y"=> rand(8162, 8597), "color"=> '#2D9B78'));
array_push($dataPoints3, array("label"=> 'Red Mage', "y"=> rand(8043, 8588), "color"=> '#e87b7b'));
?>

<main>
    <h1>Statistics</h1>
    <script type="text/javascript" src="../../util/js/canvasjs.min.js"></script>
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


        function compareDataPointYAscend(dataPoint1, dataPoint2) {
		    return dataPoint1.y - dataPoint2.y;
        }

        var chart3 = new CanvasJS.Chart("chartContainer3", {
            animationEnabled: true,
            height:650,
            theme: "dark1",
            title: {
                text: "Damage Per Second Rankings",
                fontSize: 25              
            },
            axisX: {
                margin: 10,
                labelPlacement: "inside",
                tickPlacement: "inside",
                labelFontSize: 18,
            },
            axisY2: {
                labelFontSize: 18,
                includeZero: true
            },
            data: [              
            {
                // Change type to "doughnut", "line", "splineArea", etc.
                type: "bar",
                axisYType: "secondary",
                indexLabel: "{y}",
                dataPoints: <?php echo json_encode($dataPoints3, JSON_NUMERIC_CHECK); ?>
            }
            ]
        });
        chart3.options.data[0].dataPoints.sort(compareDataPointYAscend);
        chart3.render();
    }
    </script>
    
    <div class="chart_container" id="chartContainer1"></div>
    <div class="chart_container" id="chartContainer3"></div>
    <div class="chart_container" id="chartContainer2"></div>
    <div class="chart_container"></div>
</main>
<?php include '../../view/footer.php'; ?>