
<link href='./Components/Landing/Landing.css' rel='stylesheet' type='text/css
'>

<script>
    $("#forum-desc").click(function() {
            history.pushState(null, null, "forum");
            evaluatePath("forum");
      });
</script>

<div id='background-image'>
    <div class='container' id='intro'> 
        Your one stop shop for everything fitness.
    </div>
</div>

<div id='description'>
    <div id='calorie-desc' class='col'>
        <h2>Log Calories</h2>
        <p class='landing-desc' >Keep track of the amount of calories you consume to meet your fitness goals using our simple calorie diary.</p>
        <button type="button" class="btn btn-warning landing-button">Diary</button>
        <hr style=' width: 75%;'/>
    </div>
    <div id='workout-desc' class='col'>
        <h2>Track Workouts</h2>
        <p class='landing-desc'>Find different workouts and exercises to accelerate your progress to gain muscle, burn fat, or stay healthy.</p>
        <button type="button" class="btn btn-warning landing-button">Workouts</button>
        <hr style=' width: 75%;'/>
    </div>
    <div id='diet-desc' class='col'>
        <h2>Explore Nutrition</h2>
        <p class='landing-desc'>Different goals require different diets. Search for the perfect diet plan that fits your needs.</p>
        <button type="button" class="btn btn-warning landing-button">Diets</button>
        <hr style=' width: 75%;'/>
    </div>
</div>
    
<div id='forum'>
    <div id="forum-desc">
        <h1>Forum</h1>
        <p class='landing-desc'>Ask questions, share advice, or update your friends on your progress in our forum.</p>
    </div>
</div>

<div id="contact" class='container text-center'>
    <h1>Contact us</h1>
    <p class='landing-desc'>Have any reccomendations or need to report a bug? Send us a message to voice your concerns and opinions.</p>
    <button type="button" class="btn btn-warning landing-button">Contact</button>
    <hr/>
</div>


