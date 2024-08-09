<!DOCTYPE html>
<html>
<head>
    <title>Register</title>
</head>
<body>
    <h2>Register</h2>
    <?php echo validation_errors(); ?>
    <?php echo form_open('auth/register_user'); ?>
        <label for="username">Username:</label>
        <input type="text" name="username" value="<?php echo set_value('username'); ?>"><br>
        
        <label for="email">Email:</label>
        <input type="email" name="email" value="<?php echo set_value('email'); ?>"><br>
        
        <label for="password">Password:</label>
        <input type="password" name="password"><br>
        
        <input type="submit" value="Register">
    </form>
    <a href="<?php echo site_url('auth/login'); ?>">Sudah punya akun? Login</a>
</body>
</html>
