
<?php
	if(!session_start()){
        header("Location: ../../error.php");
        exit;
    }
	$loggedin = empty($_SESSION['loggedin']) ? '' : $_SESSION['loggedin'];
	
	
    if (!$loggedin) {
        ?>
            <script>
                history.pushState(null, null, "login");
                evaluatePath("login");
            </script>
        <?php
    }
    ?>

<script>
    var today = new Date();
    var year = today.getFullYear();
    var day = today.getDate();
    var month = today.getMonth()+1;
    today = `${year}-${month}-${day}`;
    $('#date').val(today);

    $("#enter-meal-button").click(function() {
        $.post("./api/logInfo.php", $("#enter-meal-form").serialize(), function(data) {
            if(data === 'success'){
                history.pushState(null, null, "dashboard");
                evaluatePath("dashboard");
            } else {
                $('#error').html(data);
            }
        });
      });
      $("#enter-meal-back-button").click(function() {
            history.pushState(null, null, "dashboard");
            evaluatePath("dashboard");
      });
</script>

<div class='calorie-log-form container text-center'  style="width: 50%;">
        <h1>Calorie Log</h1>
        <form id='enter-meal-form'>
            <input type='hidden' name='action' value='do_log'>  

            <div class="input-group mb-3"> 
                <div class="input-group-prepend">
                    <span class="input-group-text">Date</span>
                </div>
                <input type="date" class="form-control" name='date' id='date' placeholder="Date">
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

               <div id='error' style='margin:15px; color: red;'></div>

             <button type="button" id='enter-meal-button' class="btn btn-primary">Submit</button>
             <button type="button" id='enter-meal-back-button' class="btn btn-danger">Back</button>
         </form>

</div>


        