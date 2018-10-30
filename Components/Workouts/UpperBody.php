<?php
if(!session_start()){
    header("Location: ../Error/error.php");
    exit;
}

?>

<link href='./Components/Workouts/Workouts.css' rel='stylesheet' type='text/css
'>
<div class="container background">
<div class="header">
		<h1>Upper Body Exercises</h1>
	</div>
<div class="workouts-container">

	<div class="column-sm">
		<div>
			<button type="button" class="btn btn-warning btn-lg" data-toggle="modal" data-target="#myModal">Chest</button>
		</div>
		<div class="modal fade" id="myModal" role="dialog">
			<div class="modal-dialog">
				<!-- Modal content-->
				<div class="modal-content text-center">
					<div class="modal-header text-center">
						<h4 class="modal-title">Chest Exercises</h4>
					</div>
					<div class="modal-body">
					</div>
					<div class="panel panel-default">
						<div class="panel-heading">
							<h4 class="panel-title">
								<button class="accordion-toggle collapsed btn btn-warning btn-lg" data-toggle="collapse" data-parent="#accordion" href="#collapseOne">Bench
									Press</button>
							</h4>
						</div>

						<div id="collapseOne" class="panel-collapse collapse">
							<div class="panel-body">
								<div>
									<img class='workout-image' src="./images/workouts/Bench%20Press.png">
								</div>
								<p>Slowly lower the bar to your chest then press upwards till arms are fully extended.</p>
							</div>
						</div>
					</div>
					<!-- second accordion element -->
					<div class="panel panel-default">
						<div class="panel-heading">
							<h4 class="panel-title">
								<button class="accordion-toggle collapsed btn btn-warning btn-lg" data-toggle="collapse" data-parent="#accordion" href="#collapseTwo">Cable
									Fly</button>
							</h4>
						</div>

						<div id="collapseTwo" class="panel-collapse collapse">
							<div class="panel-body">
								<div>
									<img class='workout-image' src="./images/workouts/CableFly.jpg">
								</div>
								<p>With arms extended, pull cables in front of your chest till your hands touch.</p>
							</div>
						</div>
					</div>

					<div class="panel panel-default">
						<div class="panel-heading">
							<h4 class="panel-title">
								<button class="accordion-toggle collapsed btn btn-warning btn-lg" data-toggle="collapse" data-parent="#accordion" href="#collapseThree">Seated
									Chest Press</button>
							</h4>
						</div>

						<div id="collapseThree" class="panel-collapse collapse">
							<div class="panel-body">
								<div>
									<img class='workout-image' src="./images/workouts/SeatedChestPress.jpg">
								</div>
								<p>Sit firmly against the seat with feet flat on floor and keep head and neck still as you do the movement.</p>
							</div>
						</div>
					</div>
					<div class="modal-footer">
						<button type="button" class="btn btn-danger" data-dismiss="modal">Close</button>
					</div>
				</div>
			</div>
		</div>
		<img class='workout-image' src="./images/workouts/Chest.jpg" alt="Chest">
	</div>

	<!-- back modal content-->
	<div class="column-sm">
		<div>
			<button type="button" class="btn btn-warning btn-lg" data-toggle="modal" data-target="#myModal">Back</button>
		</div>
		<img class='workout-image' src="./images/workouts/Back.jpg" alt="Back">

	</div>

	<!-- Biceps modal content-->
	<div class="column-sm">
		<div>
			<button type="button" class="btn btn-warning btn-lg" data-toggle="modal" data-target="#myModal">Biceps</button>
		</div>
		<img class='workout-image' src="./images/workouts/Biceps.jpg" alt="Biceps">
	</div>

	<!-- Triceps modal content-->
	<div class="column-sm">
		<div>
			<button type="button" class="btn btn-warning btn-lg" data-toggle="modal" data-target="#myModal">Triceps</button>
		</div>
		<img class='workout-image' src="./images/workouts/Triceps.jpg" alt="Triceps">
	</div>

	<!-- Shoulders modal content-->
	<div class="column-sm">
		<div>
			<button type="button" class="btn btn-warning btn-lg" data-toggle="modal" data-target="#myModal">Shoulders</button>
		</div>
		<img class='workout-image' src="./images/workouts/Shoulders.jpg" alt="Shoulders">

	</div>
	<!-- Abs modal content-->
	<div class="column-sm">
		<div>
			<button type="button" class="btn btn-warning btn-lg" data-toggle="modal" data-target="#myModal">Abs</button>
		</div>
		<img class='workout-image' src="./images/workouts/Abs.jpg" alt="Abs">

	</div>

	
</div>

</div>