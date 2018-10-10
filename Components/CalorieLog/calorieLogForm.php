
<?php
	if(!session_start()){
        header("Location: ./Components/Error/error.php");
        exit;
    }
	$loggedin = empty($_SESSION['loggedin']) ? '' : $_SESSION['loggedin'];
	
	
//     if (!$loggedin) { 
//     ?>
        <script>
//             history.pushState(null, null, "login");
//             $.get("./Components/Auth/loginForm.php", stageContent);
//         </script>
    <?php
// 		exit;
// 	} 

// ?>

<script>
  $("#enter-meal-button").click(function() {
        $.post("./api/logInfo.php", $("#enter-meal-form").serialize(), function(data) {
            history.pushState(null, null, "dashboard");
            evaluatePath("dashboard");
        });
      });

      
</script>

<div class='calorie-log-form container text-center'  style="width: 50%;">
        <h1>Calorie Log</h1>

        <?php if($error){ ?>
            <div><?php $error ?></div> <?php } ?>

            <form id='enter-meal-form'>
            <input type='hidden' name='action' value='do_log'>  

            <div class="input-group mb-3"> 
                <div class="input-group-prepend">
                    <span class="input-group-text">Date</span>
                </div>
                <input type="date" class="form-control" name='date' placeholder="Date">
            </div>

            <div class="input-group mb-3">
                <div class="input-group-prepend">
                    <span class="input-group-text">Breakfast</span>
                </div>
                 <input type="text" class="form-control" name='breakfast' placeholder="Breakfast">
            </div>
            <div class="input-group mb-3">
                <div class="input-group-prepend">
                    <span class="input-group-text">Lunch</span>
                </div>
                 <input type="text" class="form-control"  name='lunch' placeholder="Lunch">
            </div>
            <div class="input-group mb-3">
                <div class="input-group-prepend">
                    <span class="input-group-text">Dinner</span>
                </div>
                 <input type="text" class="form-control"  name='dinner' placeholder="Dinner">
            </div>
            <div class="input-group mb-3">
                <div class="input-group-prepend">
                    <span class="input-group-text">Other</span>
                </div>
                 <input type="text" class="form-control" name='other' placeholder="Other">
            </div>

             <button type="button" id='enter-meal-button' class="btn btn-primary">Submit</button>
             <button type="button" class="btn btn-danger">Back</button>
         </form>

</div>


        