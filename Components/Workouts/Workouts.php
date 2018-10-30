<?php
if(!session_start()){
    header("Location: ../Error/error.php");
    exit;
}

?>
<script>
	$("#upper-body").click(function () {
		history.pushState(null, null, "upper-body");
		evaluatePath("upper-body");
	});
	$("#lower-body").click(function () {
		history.pushState(null, null, "lower-body");
		evaluatePath("lower-body");
	});
</script>

<link href='./Components/Workouts/Workouts.css' rel='stylesheet' type='text/css
'>
<div class='container background'>
	<div class="header text-center">
		<h1>Choose the type of workout you want</h1>
	</div>

	<div class="workouts-container">

		<div class="column">
			<h1 class="header">Upper Body</h1>

			<img id='upper-body' style='cursor:pointer;' src="./images/workouts/images%20(1).jpg" alt="UpperBody">

		</div>

		<div class="column">
			<h1 class="header">Lower Body</h1>

			<img id='lower-body' style='cursor:pointer;' src="./images/workouts/download.jpg" alt="LowerBody">

		</div>
	</div>
</div>