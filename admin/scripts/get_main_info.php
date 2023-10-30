<?php
	include("../config/dbconnect.php"); 
	include("../config/checkAdmin.php"); 

	$type = $_POST['type'];
	$start_date = $_POST['start_date'];
	$end_date = $_POST['end_date'];

	function getDates($startTime, $endTime) {
        $day = 86400;
        $format = 'Y-m-d';
        $startTime = strtotime($startTime);
        $endTime = strtotime($endTime);

        $numDays = round(($endTime - $startTime) / $day);

        $days = array();

        $days[0] = date($format, $startTime);

        for ($i = 1; $i < $numDays; $i++) { 
            $days[] = date($format, ($startTime + ($i * $day)));
        }

        $days[$numDays] = date($format, $endTime);

        return $days;
    }

    $days = getDates($start_date, $end_date);

	if($type == 'clients'){
		if($days != ''){
			$data = '';
			$categories = '';
			$name = 'Регистрация пользователей';
			foreach ($days as $key => $value) {
				if($value != ''){
					$value_date = date("d.m", strtotime($value));
					$categories .= '"' . $value_date . '",';

					$select = mysqli_query($link, "SELECT * FROM in_clients WHERE reg_date = '$value'");
					$count = mysqli_num_rows($select);

					$data .= $count . ",";
				}
			}

			$data = substr($data,0,-1);
			$categories = substr($categories,0,-1);
		}
	}

	if($type == 'add_route'){
		if($days != ''){
			$data = '';
			$categories = '';
			$name = 'Создание маршрутов';
			foreach ($days as $key => $value) {
				if($value != ''){
					$value_date = date("d.m", strtotime($value));
					$categories .= '"' . $value_date . '",';

					$select = mysqli_query($link, "SELECT * FROM in_routes WHERE DATE(created_date) = '$value'");
					$count = mysqli_num_rows($select);

					$data .= $count . ",";
				}
			}

			$data = substr($data,0,-1);
			$categories = substr($categories,0,-1);
		}
	}

	if($type == 'end_route'){
		if($days != ''){
			$data = '';
			$categories = '';
			$name = 'Прохождение маршрутов';
			foreach ($days as $key => $value) {
				if($value != ''){
					$value_date = date("d.m", strtotime($value));
					$categories .= '"' . $value_date . '",';

					$select = mysqli_query($link, "SELECT * FROM in_routes_end WHERE DATE(create_time) = '$value'");
					$count = mysqli_num_rows($select);

					$data .= $count . ",";
				}
			}

			$data = substr($data,0,-1);
			$categories = substr($categories,0,-1);
		}
	}

	if($type == 'paid_route'){
		if($days != ''){
			$data = '';
			$categories = '';
			$name = 'Выплаты за маршруты';
			foreach ($days as $key => $value) {
				if($value != ''){
					$value_date = date("d.m", strtotime($value));
					$categories .= '"' . $value_date . '",';

					$select = mysqli_query($link, "SELECT * FROM in_sales WHERE DATE(paid_datetime) = '$value'");
					$count = mysqli_num_rows($select);

					$data .= $count . ",";
				}
			}

			$data = substr($data,0,-1);
			$categories = substr($categories,0,-1);
		}
	}
?>
<div id="ana_dash_1" class="apex-charts"></div>
<script>
	$( document ).ready(function() {
		var options={
			chart:{
				height:320,
				type:"area",
				stacked:!0,
				toolbar:{
					show:!1,
					autoSelected:"zoom"
				}
			},
			colors:["#2a77f4","#a5c2f1"],
			dataLabels:{
				enabled:!1
			},
			stroke:{
				curve:"smooth",
				width:[1.5,1.5],
				dashArray:[0,4],
				lineCap:"round"
			},
			grid:{
				padding:{
					left:0,
					right:0
				},
				strokeDashArray:3
			},
			markers:{
				size:0,
				hover:{
					size:0
				}
			},
			series:[
			{
				name:"<?php echo $name; ?>",
				data:[<?php echo $data; ?>]
			}
			],
			xaxis:{
				type:"date",
				categories:[<?php echo $categories; ?>],
				axisBorder:{
					show:!0
				},
				axisTicks:{
					show:!0
				}
			},
			yaxis:{
				allowDecimals: false,
				labels: {
					formatter: function(val) {
						return val.toFixed(0);
					}
				}
			},
			fill:{
				type:"gradient",
				gradient:{
					shadeIntensity:1,
					opacityFrom:.4,
					opacityTo:.3,
					stops:[0,90,100]
				}
			},
			tooltip:{
				x:{
					format:"dd/MM/yy HH:mm"
				}
			},
			legend:{
				position:"top",
				horizontalAlign:"right"
			}
		};
		var chart = new ApexCharts(document.querySelector("#ana_dash_1"),options).render();
	});
</script>