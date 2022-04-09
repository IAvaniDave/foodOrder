<?php
   include('subheader.php');
   include('db/signin-db.php')
?>
<div class="block_content mt-5">
    <?php
      if (isset($_SESSION["msg"])) {
          echo $_SESSION["msg"];
          unset($_SESSION["msg"]);
      }
   ?>
    <div class="module_heading">
        <h2>Login</h2>
        <p>or <a href="#" class="text_orenge">create an account</a></p>
    </div>
    <form method="post">
        <div class="form-group pb-2 pb-md-3 pb-lg-3 mt-3">
            <input type="text" class="form-control text-black" name="email" id="email" value="" placeholder=" "
                required="">
            <label class="form-control-placeholder" for="email">Email Id <span class="text-yellow">*</span></label>
        </div>
        <div class="form-group">
            <input type="password" id="password_field" class="form-control text-black" name="password" value=""
                placeholder=" " required="">
            <label class="form-control-placeholder" for="password_field">Password <span
                    class="text-yellow">*</span></label>
            <a href="javascript:void(0);" class="password-icon">
                <i class="password-toggle flaticon-blind icon-margin-none"></i>
            </a>
        </div>
        <div class="row align-items-center">
            <div class="col-md-6">
                <label class="custom_check">Remember Me
                    <input type="checkbox">
                    <span class="checkmark"></span>
            </div>
            <div class="col-md-6 text-right">
                <a href="#" class="text_orenge font-small text-right">Forgot Password ?</a>
            </div>
        </div>
        <div class="form_footer mt-3">
            <button type="submit" class="food_btn" href="#" name="submit">Submit <img src="images/btn_icon.png"
                    class="btn-arrow"></button>
        </div>
    </form>
</div>
<?php
   include('subfooter.php');
?>