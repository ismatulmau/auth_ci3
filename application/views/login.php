<!DOCTYPE html>
<html>
<head>
    <title>Login</title>
</head>
<body>
    <h2>Login</h2>
    <?php if ($this->session->flashdata('error')): ?>
        <p style="color: red;"><?php echo $this->session->flashdata('error'); ?></p>
    <?php endif; ?>
    <?php echo validation_errors(); ?>
    <?php echo form_open('auth/login_user'); ?>
        <label for="username">Username:</label>
        <input type="text" name="username" value="<?php echo set_value('username'); ?>"><br>
        
        <label for="password">Password:</label>
        <input type="password" name="password"><br>
        
        <input type="submit" value="Login">
    </form>
    <a href="<?php echo site_url('auth/register'); ?>">Belum punya akun? Register</a>
</body>
</html>
