<?php
if(!session_start()){
    header("Location: ../Error/error.php");
    exit;
}

?>
<head>
<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/css/bootstrap.min.css" integrity="sha384-MCw98/SFnGE8fJT3GXwEOngsV7Zt27NXFoaoApmYm81iuXoPkFOJwJ8ERdknLPMO" crossorigin="anonymous">

        <script
         src="https://code.jquery.com/jquery-3.3.1.min.js"
         integrity="sha256-FgpCb/KJQlLNfOu91ta32o/NMZxltwRo8QtmkMRdAu8="
         crossorigin="anonymous"></script>
</head>
<link href='./Components/Workouts/Workouts.css' rel='stylesheet' type='text/css'>

<div class='container background'>
	<div class="header">
		<h1>Lower Body Workouts</h1>
	</div>

	<div class="workouts-container">
		<div class="column-sm">
			<button type="button" class="btn btn-warning btn-lg" data-toggle="modal" data-target="#myModal">Quads</button>
			<div class="modal fade" id="myModal" role="dialog">
	<div class="modal-dialog">
		<!-- Modal content-->
		<div class="modal-content text-center">
			<div class="modal-header text-center">
				<h4 class="modal-title">Quad Exercises</h4>
			</div>
			<div class="modal-body">
			</div>
			<div class="panel panel-default">
				<div class="panel-heading">
					<h4 class="panel-title">
						<button class="accordion-toggle collapsed btn btn-warning btn-lg" data-toggle="collapse" data-parent="#accordion" href="#collapseOne">Squats</button>
					</h4>
				</div>

				<div id="collapseOne" class="panel-collapse collapse">
					<div class="panel-body">
						<div>
							<img class='workout-image' src="./images/workouts/squat-exercise.jpg">
						</div>
						<p>Make sure your legs are parallel to the ground at the bottom of your squat.</p>
					</div>
				</div>
			</div>
			<!-- second accordion element -->
			<div class="panel panel-default">
				<div class="panel-heading">
					<h4 class="panel-title">
						<button class="accordion-toggle collapsed btn btn-warning btn-lg" data-toggle="collapse" data-parent="#accordion" href="#collapseTwo">Leg
							Press</button>
					</h4>
				</div>

				<div id="collapseTwo" class="panel-collapse collapse">
					<div class="panel-body">
						<div>
							<img class='workout-image' src="./images/workouts/leg%20press.jpg">
						</div>
						<p>Make sure your legs are parallel to the ground at the bottom of your squat.</p>
					</div>
				</div>
			</div>

			<div class="panel panel-default">
				<div class="panel-heading">
					<h4 class="panel-title">
						<button class="accordion-toggle collapsed btn btn-warning btn-lg" data-toggle="collapse" data-parent="#accordion" href="#collapseThree">Lunges</button>
					</h4>
				</div>

				<div id="collapseThree" class="panel-collapse collapse">
					<div class="panel-body">
						<div>
							<img class='workout-image' src="./images/workouts/lunges.jpg">
						</div>
						<p>Make sure you forward foot leg makes a 90 degree, and your back knee touches the ground.</p>
					</div>
				</div>
			</div>

			<div class="modal-footer">
				<button type="button" class="btn btn-danger" data-dismiss="modal">Close</button>
			</div>
		</div>
	</div>
</div>
			<img class='workout-image' src="./images/workouts/Quads.jpg" alt="Chest">
		</div>

		<div class="column-sm">
			<button type="button" class="btn btn-warning btn-lg" data-toggle="modal" data-target="#myModal">Hamstrings</button>
			<img class='workout-image' src="./images/workouts/Hamstrings.jpg" alt="Chest">
		</div>

		<div class="column-sm">
			<button type="button" class="btn btn-warning btn-lg" data-toggle="modal" data-target="#myModal">Calves</button>
			<img class='workout-image' src="./images/workouts/Calves.jpg" alt="Chest">
		</div>

		<div class="column-sm">
			<button type="button" class="btn btn-warning btn-lg" data-toggle="modal" data-target="#myModal">Glutes</button>
			<img class='workout-image' src="./images/workouts/Glutes.jpg" alt="Chest">
		</div>
	</div>
</div>






