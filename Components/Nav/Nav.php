<?php
if(!session_start()){
    header("Location: ../Error/error.php");
    exit;
}
$loggedin = empty($_SESSION['loggedin']) ? '' : $_SESSION['loggedin'];



?>

<style>
<?php include 'Nav.css'; ?>
</style>

<div class="navbar navbar-dark bg-dark ">
          <a class="navbar-brand" href="/home">
            <h1>Calories Count</h1>
          </a>
          <ul class="nav nav-pills">
            <li class="nav-item active">
              <a
                class='nav-link active async-link'
                href='./'
              >
                Home
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
                class='nav-link async-link' href='./login'
              >
                Login
              </a>
            </li>
          </ul>
</div>
