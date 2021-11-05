<form class="form_register container" action="<?=base_url?>/users/sesion" method="POST">
    <h1>Log in</h1>
    <label class="label_form" for="first_name">First Name</label>
    <input autocomplete="off" class="input_register" type="text" name="first_name" required>

    <label class="label_form" for="first_name">Password</label>
    <input autocomplete="off" class="input_register" type="password" name="password" required>

    <?php if(isset($_SESSION['error_login'])): ?>
        <p class="alert bad"><b><?=$_SESSION['error_login']?></b></p>
    <?php endif; ?>
    <input type="submit" class="form_input" value="Check in">
    <p class="alert"><b>You do not have an account? <a class="account" href="<?=base_url?>/users/register">Sign up</a></b></p>
</form>
<?php
unset($_SESSION['error_login']);
if(isset($_SESSION['user']))
{
    redirectIndex();
}
?>