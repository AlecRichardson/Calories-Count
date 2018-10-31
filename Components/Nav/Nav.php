<?php
if(!session_start()){
    header("Location: ../Error/error.php");
    exit;
}
$loggedin = empty($_SESSION['loggedin']) ? '' : $_SESSION['loggedin'];

?>
<link href='./Components/Nav/Nav.css' rel='stylesheet' type='text/css
'>


<div class="navbar navbar-dark bg-dark">
          <a class="navbar-brand" href="./">
            <h1>Calories Count</h1>
          </a>
          <ul class="nav nav-pills">
            <li class="nav-item">
              <a
                id='home'
                class='nav-link active async-link'
                href='./'
              >
                Home
              </a>
            </li>
            <li class="nav-item">
              <a
                id='workouts'
                class='nav-link  async-link'
                href='./workouts'
              >
                Workouts
              </a>
            </li>
            <li class="nav-item">
              <a
                id='nutrition'
                class='nav-link  async-link'
                href='./nutrition'
              >
                Nutrition
              </a>
            </li>
            <li class="nav-item">
              <a
              id='dashboard'
              class='nav-link async-link'
              href='./dashboard'
              >
                Dashboard
              </a>
            </li>
            <li class="nav-item">
              <a
              id='login'
                class='nav-link async-link' href='./login'
              >
                Login
              </a>
            </li>
          </ul>
</div>
