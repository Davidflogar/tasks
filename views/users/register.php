<form class="form_register container" action="<?=base_url?>/users/save" method="POST">
    <h1>Sign up</h1>
    <label class="label_form" for="first_name">First Name</label>
    <input onblur="validateUser(this)" autocomplete="off" class="input_register" type="text" name="first_name" required>

    <label class="label_form" for="first_name">Last Name</label>
    <input autocomplete="off" class="input_register" type="text" name="last_name" required>

    <label class="label_form" for="first_name">Password</label>
    <input autocomplete="off" class="input_register" type="password" name="password" required>

    <p class="alert"><b>Remember the password as you will not be able to recover it if you lose it</b></p>
    <?php if(isset($_SESSION['register']) && $_SESSION['register'] == "true"): ?>
        <p class="alert good"><b><?="Registration completed, you can now log in with your account"?></b></p>
    <?php elseif(isset($_SESSION['register']) && $_SESSION['register'] == "false"): ?>
        <p class="alert bad"><b><?="Oops, there was an error in your registration, check that all the data is written correctly"?></b></p>
    <?php elseif(isset($_SESSION['error']) && $_SESSION['error'] == true): ?>
        <p class="alert bad"><b>There is already a user with that name, please write another name</b></p>
    <?php endif; ?>
    <input type="checkbox" id="showpassword" name="showpassword">
    <label for="showpassword">Show password</label>

    <input type="submit" class="form_input" value="Check in">
    <p class="alert"><b>Do you already have an account? <a class="account" href="<?=base_url?>/users/login">Log in</a></b></p>
</form>
<?php
unset($_SESSION['register']);
unset($_SESSION['error']);
if(isset($_SESSION['user']))
{
    redirectIndex();
}
?>
<script>
    
</script>