<?php
// defined('BASEPATH') or exit('No direct script access allowed');
include "login_header.php";
?>



<div class="adlogin_center">


    <h1>Login</h1>
    <span class="text-danger"><?php // echo $this->session->flashdata("error"); 
                                ?></span>
    <form action="<?php echo "site_url('Admin/login_validation')" ?>" method="POST">

        <div class="adlogin_txt_field">
            <input type="email" name="email">
            <span class="text-danger"><?php echo "form_error('email')"; ?></span>
            <label>User Email</label>
        </div>

        <div class="adlogin_txt_field">
            <input type="password" name="password">
            <span class="text-danger"><?php echo "form_error('password')"; ?></span>
            <label>Password</label>
        </div>

        <div>
            <input type="submit" name="insert" value="Login">
        </div>
    </form>



</div>