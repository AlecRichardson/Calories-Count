<?php
if(!session_start()){
    header("Location: error.php");
    exit;
}

$loggedin = empty($_SESSION['loggedin']) ? '' : $_SESSION['loggedin'];
?>

<link href='./Components/CalorieLog/calorieLog.css' rel='stylesheet' type='text/css
'>

<script>
$("#enter-meal-button").click(function() {
            history.pushState(null, null, "enter-meal");
            evaluatePath("enter-meal");
      });
$(".delete-meal-button").click(function() {
    var id = {id:$(this).attr('id')};
        $.post("./api/deleteLog.php", id, function(data) {
            history.pushState(null, null, "dashboard");
            evaluatePath("dashboard");
        });
        
      });
$(".edit-meal-button").click(function() {
    var id = {id:$(this).attr('id')};
        $.post("./api/setSession.php", id, function(data){
            history.pushState(null, null, "edit-meal");
            evaluatePath("edit-meal");
        })
      });

      $("#profile-button").click(function() {
            history.pushState(null, null, "profile");
            evaluatePath("profile");
      });

</script>

<div class='calorie-log container text-center' style="width: 70%; margin-top: 100px;">
        
    
    <?php
        if($_SESSION['error']){echo '<div>'.$_SESSION['error'].'</div>';}
        
         require_once "../../config/db.conf";
    
        $mysqli = new mysqli($dbhost, $dbuser, $dbpass, $dbname);
    
         if($mysqli->connect_error){
            die('Connect Error (' . $mysqli->connect_errno . ')' . $mysqli->connect_error);
        }
        $id = empty($_SESSION['id']) ? '99' : $_SESSION['id'];
        $query = "select * from calorielog where userId='$id' order by date desc";
            
        if($result = $mysqli->query($query)){ ?>
            <div>
                 <table class="table table-dark">
                    <tr>
                        <th scope="col">Date</th>
                        <th scope="col">Breakfast</th>
                        <th scope="col">Lunch</th>
                        <th scope="col">Dinner</th>
                        <th scope="col">Other</th>
                        <th scope="col">Total</th>
                        <th scope="col">Edit</th>
                        <th scope="col">Delete</th>
                    </tr>
                    <?php 
                        while($row = $result->fetch_assoc()){
                            $total = $row['breakfast'] + $row['lunch'] + $row['dinner'] +
                                $row['other'];
                            $date = date("m-d-Y", strtotime($row['date']));
                        ?> 
                        <tr>
                            <td scope="row"><?php echo $date; ?></td>
                            <td scope="row"><?php echo $row['breakfast']; ?> cals</td>
                            <td scope="row"><?php echo $row['lunch']; ?> cals</td>
                            <td scope="row"><?php echo $row['dinner']; ?> cals</td>
                            <td scope="row"><?php echo $row['other']; ?> cals</td>
                            <td scope="row"><?php echo $total; ?> cals</td>
                            <td scope="row">
                                <form class='edit-meal-form'>
                                    <input type='hidden' name='id' 
                                    value=<?php echo $row['id']; ?>>
                                    <input type='hidden' name='date' value=<?php echo $row['date']; ?>>
                                    <input type='hidden' name='breakfast' value=<?php echo $row['breakfast']; ?>>
                                    <input type='hidden' name='lunch' value=<?php echo $row['lunch']; ?>>
                                    <input type='hidden' name='dinner' value=<?php echo $row['dinner']; ?>>
                                    <input type='hidden' name='other' value=<?php echo $row['other']; ?>>
                                    <button type="button" 
                                    class="btn btn-primary edit-meal-button" id='<?php echo $row['id']; ?>'>Edit</button>
                                </form>
                            </td>
                            <td scope="row">
                                <form id='delete-meal-form'>
                                    <input type='hidden' name='id' value=<?php echo $row['id']; ?>>
                                    
                                    <button type="button" class="btn btn-danger delete-meal-button" id='<?php echo $row['id']; ?>'>Delete</button>
                                </form>
                            </td>
                        </tr>
                <?php } ?>
                </div>
                
                <div id="goals-container" class='container'>
                    <h1 id="page-title">
                        Calorie diary for <?php echo $loggedin; ?>
                    </h1>
                    <i class="fa fa-user fa-5x" aria-hidden="true"></i>
                    
                <?php 
                $query = "select users.firstName, users.lastName, calorielog.date, calorielog.breakfast, calorielog.lunch, calorielog.dinner, calorielog.other from users inner join calorielog on users.id = calorielog.userId where calorielog.date = date(now()) AND users.id='$id'";
                }
                if($result = $mysqli->query($query)){
                    $total=0;
                    while($row = $result->fetch_assoc()){
                    $total += $row['breakfast'] + $row['lunch'] + $row['dinner'] + $row['other'];
                    }
                ?>

                <div style="margin: 25px; font-size: 18px;">
                    <p>
                        A total of <?php echo $total; ?> calories.
                        <p id="goal">0</p>
                </p>
                    </div>
                  <?php 
                }
                $mysqli->close();
                $result->close();
            
              
            ?>
            <button type="button" class="btn btn-primary" id='profile-button'>My profile</button>
                </div>   

                <div style='margin: 20px;'>
                     <button type="button" class="btn btn-success" id='enter-meal-button'>Enter a meal</button>
                </div>
                </div>
      
   