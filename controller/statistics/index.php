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
array_push($dataPoints3, array("label"=> 'Paladin', "y"=> rand(5681, 5979), "color"=> '#A8D2E6'));
array_push($dataPoints3, array("label"=> 'Warrior', "y"=> rand(5608, 5921), "color"=> '#cf2621'));
array_push($dataPoints3, array("label"=> 'Dark Knight', "y"=> rand(5923, 6254), "color"=> '#d126cb'));
array_push($dataPoints3, array("label"=> 'Gunbreaker', "y"=> rand(5932, 6205), "color"=> '#796D30'));
array_push($dataPoints3, array("label"=> 'White Mage', "y"=> rand(5295, 5666), "color"=> '#FFF0DC'));
array_push($dataPoints3, array("label"=> 'Scholar', "y"=> rand(5617, 6162), "color"=> '#8657FF'));
array_push($dataPoints3, array("label"=> 'Astrologian', "y"=> rand(5461, 5977), "color"=> '#FFE74A'));
array_push($dataPoints3, array("label"=> 'Sage', "y"=> rand(5324, 5674), "color"=> '#80A0F0'));
array_push($dataPoints3, array("label"=> 'Monk', "y"=> rand(9240, 9789), "color"=> '#d69c00'));
array_push($dataPoints3, array("label"=> 'Dragoon', "y"=> rand(9185, 9751), "color"=> '#4164CD'));
array_push($dataPoints3, array("label"=> 'Ninja', "y"=> rand(9269, 9843), "color"=> '#AF1964'));
array_push($dataPoints3, array("label"=> 'Samurai', "y"=> rand(9091, 9415), "color"=> '#e46d04'));
array_push($dataPoints3, array("label"=> 'Reaper', "y"=> rand(8804, 9352), "color"=> '#965A90'));
array_push($dataPoints3, array("label"=> 'Bard', "y"=> rand(8687, 9292), "color"=> '#91BA5E'));
array_push($dataPoints3, array("label"=> 'Machinist', "y"=> rand(8242, 8586), "color"=> '#6EE1D6'));
array_push($dataPoints3, array("label"=> 'Dancer', "y"=> rand(8471, 9306), "color"=> '#E2B0AF'));
array_push($dataPoints3, array("label"=> 'Black Mage', "y"=> rand(9013, 9614), "color"=> '#A579D6'));
array_push($dataPoints3, array("label"=> 'Summoner', "y"=> rand(8597, 9191), "color"=> '#2D9B78'));
array_push($dataPoints3, array("label"=> 'Red Mage', "y"=> rand(8588, 9286), "color"=> '#e87b7b'));
?>

<main>
    <h1><a class="site-logo" href="../../"><i class="fa fa-home" style="font-size:28px;color:white;"></i></a>           Statistics</h1>
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
            height:640,
            theme: "dark1",
            title: {
                text: "Damage Per Second Rankings",
                fontSize: 25              
            },
            axisX: {
                margin: 10,
                labelFontSize: 15,
                interval: 1
            },
            axisY2: {
                labelFontSize: 15,
                includeZero: true
            },
            data: [              
            {
                // Change type to "doughnut", "line", "splineArea", etc.
                type: "bar",
                axisYType: "secondary",
                indexLabel: "{y}",
                indexLabelFontSize: 15,
                dataPoints: <?php echo json_encode($dataPoints3, JSON_NUMERIC_CHECK); ?>
            }
            ]
        });
        chart3.options.data[0].dataPoints.sort(compareDataPointYAscend);
        chart3.render();
    }
    </script>
    <div class="charts-container">
        <div class="chart1">
            <div class="chart_container_1" id="chartContainer1"></div>
        </div>
        <div class="chart2">
            <div class="chart_container_2" id="chartContainer2"></div>
        </div>
        <div class="chart3">
            <div class="chart_container_3" id="chartContainer3"></div>
        </div>
    </div>
</main>
<?php include '../../view/footer.php'; ?>