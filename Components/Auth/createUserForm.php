<div class='register-form container text-center' style="width: 50%;">
          
                <h1>Register</h1>

                <?php if($error){ ?>
                <div><?php $error ?></div> <?php } ?>

                <form action='./api/createUser.php' method='POST'>
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
                    
                    <button type="submit" class="btn btn-success">Register</button>
                </form>
        </div>
 
         