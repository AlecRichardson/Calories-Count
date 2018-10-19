$(document).ready(function() {
  $(function() {
    evaluatePath(location.pathname);

    $(".async .async-link").click(function(e) {
      e.preventDefault();

      $(".async")
        .find("a.active")
        .removeClass("active");
      $(this).addClass("active");

      var request = $(this).attr("href");
      history.pushState(null, null, request);
      evaluatePath(request);
    });

    $(window).on("popstate", function() {
      evaluatePath(location.pathname);
    });
  });
});
function stageContent(content) {
  $("#content").html(content);
}

function evaluatePath(path) {
  var request = path.split("/").pop();

  switch (request) {
    case "login":
      $.get("./Components/Auth/loginForm.php", stageContent);
      break;
    case "register":
      $.get("./Components/Auth/createUserForm.php", stageContent);
      break;
    case "dashboard":
      $.get("./api/authenticate.php", function(data) {
        if (data === "success") {
          $.get("./Components/CalorieLog/calorieLog.php", stageContent);
        } else {
          history.pushState(null, null, "login");
          evaluatePath("login");
        }
      });
      break;
    case "enter-meal":
      $.get("./Components/CalorieLog/calorieLogForm.php", stageContent);
      break;
    case "edit-meal":
      $.get("./Components/CalorieLog/editLogForm.php", stageContent);
      break;
    case "profile":
      $.get("./Components/Profile/Profile.php", stageContent);
      break;
    default:
      $.get("./Components/Landing/Landing.php", stageContent);
  }
}
