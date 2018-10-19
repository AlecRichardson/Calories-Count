<script>
    $("#register-button").click(function() {
    $('#error').html('');
        $.post("./api/createUser.php", $("#register-form").serialize(), function(data) {
            if(data === 'success'){
            history.pushState(null, null, "login");
            evaluatePath("login");
            } else{
                $('#error').html(data);
            }
        });
      });

      $("#register-back-button").click(function() {
            history.pushState(null, null, "dashboard");
            evaluatePath("dashboard");
      });
</script>
<div class='register-form container text-center' style="width: 50%; margin-top: 100px;">
          
                <h1>Register</h1>

                <form id='register-form'>
                    <input type='hidden' name='action' value='do_create'>

                    <div class="input-group mb-3">
                        <div class="input-group-prepend">
                            <span class="input-group-text">First Name</span>
                        </div>
                        <input type="text" class="form-control" name='firstName' placeholder="First Name">
                    </div>

                    <div class="input-group mb-3">
                        <div class="input-group-prepend">
                            <span class="input-group-text">Last Name</span>
                        </div>
                        <input type="text" class="form-control" placeholder="Last name" name='lastName'>
                    </div>

                    <div class="input-group mb-3">
                        <div class="input-group-prepend">
                            <span class="input-group-text">Username</span>
                        </div>
                        <input type="text" class="form-control" placeholder="Username" name='username'>
                    </div>

                    <div class="input-group mb-3">
                        <div class="input-group-prepend">
                            <span class="input-group-text">Password</span>
                        </div>
                        <input type="password" class="form-control" placeholder="Password" name='password'>
                    </div>

                    <div class="input-group mb-3">
                        <div class="input-group-prepend">
                            <span class="input-group-text">Confirm password</span>
                        </div>
                        <input type="password" class="form-control" placeholder="Confirm password" name='confirmPass'>
                    </div>

                    <div class="input-group mb-3">
                        <div class="input-group-prepend">
                            <span class="input-group-text">Birthday</span>
                        </div>
                        <input type="date" class="form-control" placeholder="Birthday" name='birthday'>
                    </div>

                    <div class="input-group mb-3">
                        <div class="input-group-prepend">
                            <span class="input-group-text">Email</span>
                        </div>
                        <input type="email" class="form-control" placeholder="Email" name='email'>
                    </div>

                    <div id='error' style='margin:15px; color: red;'></div>
                    
                    <button type="button" class="btn btn-success" id='register-button'>Register</button>
                    <button type="button" class="btn btn-danger" id='register-back-button'>Back</button>
                </form>
        </div>
 
         