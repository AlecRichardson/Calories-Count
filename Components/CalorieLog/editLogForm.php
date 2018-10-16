<?php
if(!session_start()){
    header("Location: ../../error.php");
    exit;
}

    // $loggedin = empty($_SESSION['loggedin']) ? '' : $_SESSION['loggedin'];
    // $editid = empty($_SESSION['edit-id']) ? '' : $_SESSION['edit-id'];
    // $date = empty($_SESSION['date']) ? '' : $_SESSION['date'];
    // $breakfast = empty($_SESSION['breakfast']) ? '' : $_SESSION['breakfast'];
    // $lunch = empty($_SESSION['lunch']) ? '' : $_SESSION['lunch'];
    // $dinner = empty($_SESSION['dinner']) ? '' : $_SESSION['dinner'];
    // $other = empty($_SESSION['other']) ? '' : $_SESSION['other'];

    require_once "../../config/db.conf";
    
    $mysqli = new mysqli($dbhost, $dbuser, $dbpass, $dbname);
    
    if($mysqli->connect_error){
        die('Connect Error (' . $mysqli->connect_errno . ')' . $mysqli->connect_error);
    }

    $id = empty($_SESSION['edit-id']) ? '99' : $_SESSION['edit-id'];

    $query = "select * from calorielog where id='$id'";

    if($result = $mysqli->query($query)){
        while($row = $result->fetch_assoc()){
            $date = $row['date'];
            $breakfast = $row['breakfast'];
            $lunch = $row['lunch'];
            $dinner = $row['dinner'];
            $other = $row['other'];
        }
    }

?>
    <script>
        $("#edit-meal-button-2").click(function() {
            console.log('edit submit');
        $.post("./api/editInfo.php", $("#edit-meal-form-2").serialize(), function(data) {
            console.log('============editformdata========', data);
            history.pushState(null, null, "dashboard");
            evaluatePath("dashboard");
        });
      });

      $("#edit-back-button").click(function() {
            history.pushState(null, null, "dashboard");
            evaluatePath("dashboard");
      });
        </script>
        
        <div class='edit-log-form container text-center'  style="width: 50%;">
        <h1>Edit entry</h1>

        <?php if($error){ ?>
            <div><?php $error ?></div> <?php } ?>

            <form id='edit-meal-form-2'>
            <input type='hidden' name='action' value='do_log'>  

            <div class="input-group mb-3"> 
                <div class="input-group-prepend">
                    <span class="input-group-text">Date</span>
                </div>
                <input type="date" class="form-control" placeholder="Date" name='date' value='<?php echo $date; ?>'>
            </div>

            <div class="input-group mb-3">
                <div class="input-group-prepend">
                    <span class="input-group-text">Breakfast</span>
                </div>
                 <input type="text" class="form-control" placeholder="Breakfast" name='breakfast' value='<?php echo $breakfast; ?>'>
            </div>
            <div class="input-group mb-3">
                <div class="input-group-prepend">
                    <span class="input-group-text">Lunch</span>
                </div>
                 <input type="text" class="form-control" placeholder="Lunch" name='lunch' value='<?php echo $lunch; ?>'>
            </div>
            <div class="input-group mb-3">
                <div class="input-group-prepend">
                    <span class="input-group-text">Dinner</span>
                </div>
                 <input type="text" class="form-control" placeholder="Dinner" name='dinner' value='<?php echo $dinner; ?>'>
            </div>
            <div class="input-group mb-3">
                <div class="input-group-prepend">
                    <span class="input-group-text">Other</span>
                </div>
                 <input type="text" class="form-control" placeholder="Other" name='other' value='<?php echo $other; ?>'>
            </div>

             <button type="button" class="btn btn-success"
             id='edit-meal-button-2'>Submit</button>
             <button type="button" class="btn btn-danger" id='edit-back-button'>Back</button>
         </form>

</div>


        
        
       

       