<?php
	include("../config/dbconnect_site.php");
	require_once('../stripe/init.php');

	header('Content-Type: application/json');

	$secret_key = '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';
	$secret_key_test = 'sk_test_51KE7WoGuMkImtWPlqkyHAiIHzA96we4iLQ6PlBEx4rV2yyZgvZKAZZ031dDq0hbRX2NPxuW3Y3PQarnVhPDbyMeV00Kb6ntxSE';

	$response = array();
	$number = $_POST['number'];
	$month = $_POST['month'];
	$year = $_POST['year'];
	$cvv = $_POST['cvv'];
	$eur = $_POST['eur'];
	$eur = $eur * 100;

	$stripe = new \Stripe\StripeClient($secret_key_test);

	try{
		$card_token = $stripe->tokens->create([
			'card' => [
				'number' => $number,
				'exp_month' => $month,
				'exp_year' => $year,
				'cvc' => $cvv,
			],
		]);

		// $card_token = $stripe->tokens->create([
		// 	'card' => [
		// 		'number' => '5375411500099119',
		// 		'exp_month' => 10,
		// 		'exp_year' => 2024,
		// 		'cvc' => '958',
		// 	],
		// ]);

		$token_card = $card_token["id"];

		// echo $card_token;
		// echo "<br><br>";
		// echo $token_card;

		try{
			$charge = $stripe->charges->create([
				"amount" => $eur,
				"currency" => "eur",
				"card" => $token_card,
				"description" => "Test Account"
			]);

			$charge_id = $charge["id"];

			while(true){
				sleep(3);

				try{
					$charge_status = $stripe->charges->retrieve($charge_id,[]);

					if($charge_status["status"] == 'succeeded'){
						//echo $charge_status["status"];
						$response["error"] = false;
						$response["description"] = $charge_status["status"];
						echo json_encode(array($response));
						break;
					}
				}catch(Exception $e){
					$response["error"] = true;
					$response["description"] = $e->getMessage();
					echo json_encode(array($response));
					break;
				}
			}
		}catch(Exception $e){
			$response["error"] = true;
	        $response["description"] = $e->getMessage();
			echo json_encode(array($response));
		}
		// echo "<br><br>";
		// echo $charge;
	}catch(Exception $e){
		$response["error"] = true;
        $response["description"] = $e->getMessage();
		echo json_encode(array($response));
	}
?>