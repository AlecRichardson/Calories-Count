$(document).ready(function() {
  $(function() {
    evaluatePath(location.pathname);
    // nav[role=navigation] a
    $(".async .async-link").click(function(e) {
      e.preventDefault();

      var request = $(this).attr("href");
      console.log("request", request);
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
  console.log(location.pathname);
  console.log(path);

  switch (request) {
    case "login":
      $.get("./Components/Auth/loginForm.php", stageContent);
      break;
    case "dashboard":
      $.get("./Components/CalorieLog/calorieLog.php", stageContent);
      break;
    case "enter-meal":
      $.get("./Components/CalorieLog/calorieLogForm.php", stageContent);
      break;
    case "edit-meal":
      $.get("./Components/CalorieLog/editLogForm.php", stageContent);
      break;
    default:
      $.get("./Components/Landing.php", stageContent);
  }
}
