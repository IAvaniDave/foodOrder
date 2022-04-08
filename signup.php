<?php
   include('subheader.php');
   include('db/signup-db.php')
?>
<?php
    $city = array("Ahmedabad","Rajkot","Jamnagar","Surat","Baroda","Gandhinagar","Amreli","Junagadh","Bhavnagar","Anand","Navsari","Surendranagar","Porbandar","Bhuj","Mahesana","Keshod","Other");
?>
<div class="block_content mt-4">
    <?php
         if (isset($_SESSION["msg"])) {
             echo $_SESSION["msg"];
             unset($_SESSION["msg"]);
         }
   ?>
    <div class="module_heading">
        <h2>Signup</h2>
        <p>or <a href="#" class="text_orenge">login to your account</a></p>
    </div>
    <form method="post" enctype="multipart/form-data" onsubmit="javascript:return validate();">
        <div class="form-group pb-2 pb-md-3 pb-lg-3 m-0">
            <input type="number" class="form-control text-black" name="phone" id="phone" value="" placeholder=" "
                required="">
            <label class="form-control-placeholder" for="phone">Phone Number <span class="text-yellow">*</span></label>
        </div>
        <div class="form-group pb-2 pb-md-3 pb-lg-3 m-0">
            <input type="text" class="form-control text-black" name="name" id="name" value="" placeholder=" "
                required="">
            <label class="form-control-placeholder" for="phone">Name <span class="text-yellow">*</span></label>
        </div>
        <div class="form-group pb-2 pb-md-3 pb-lg-3 m-0">
            <select class="form-control select2" name="city" style="width: 100%;" id="city"
                onchange="javascript:checkcity(this.value);" required>
                <option value="">--Select--</option>
                <?php foreach ($city as $v) {?>
                <option value="<?php echo($v); ?>"><?php echo($v); ?></option>
                <?php } ?>
            </select>
            <input type="text" class="form-control" name="othercity" id="othercity" style="display:none;" />
            <label class="form-control-placeholder" for="phone">City <span class="text-yellow">*</span></label>
        </div>
        <div class="form-group pb-2 pb-md-3 pb-lg-3 m-0">
            <input type="email" class="form-control text-black" name="email" id="email" value="" placeholder=" "
                required="">
            <label class="form-control-placeholder" for="email">Email Id <span class="text-yellow">*</span></label>
        </div>
        <div class="form-group">
            <input type="password" id="password" class="form-control text-black" name="password" value=""
                placeholder=" " required="">
            <label class="form-control-placeholder" for="password">Password <span class="text-yellow">*</span></label>
            <a href="javascript:void(0);" class="password-icon">
                <i class="password-toggle flaticon-blind icon-margin-none"></i>
            </a>
        </div>
        <div class="form-group">
            <input type="password" id="confirm_password" class="form-control text-black" name="confirm_password"
                value="" placeholder=" " required="">
            <label class="form-control-placeholder" for="confirm_password">Confirm Password <span
                    class="text-yellow">*</span></label>
            <a href="javascript:void(0);" class="password-icon">
                <i class="password-toggle flaticon-blind icon-margin-none"></i>
            </a>
        </div>
        <label class="custom_check">By creating an account, I accept the Terms & Conditions & Privacy Policy
            <input type="checkbox" name="is_terms">
            <span class="checkmark"></span>
        </label>
        <div class="form_footer mt-3">
            <button type="submit" name="register" class="food_btn" href="#">Continue <img src="images/btn_icon.png"
                    class="btn-arrow"></button>
        </div>
    </form>
</div>
<script type="text/javascript">
function checkcity(city) {
    if (city == "Other") {
        document.getElementById("othercity").style.display = "block";
    } else {
        document.getElementById("othercity").style.display = "none";
        document.getElementById("othercity").value = "";
    }
}

function validate() {
    var city = document.getElementById('city');
    var othercity = document.getElementById('othercity');
    var password = document.getElementById('password');
    var confirm_password = document.getElementById('confirm_password');

    if (password.value != confirm_password.value) {
        alert("Password and Confirm Password should be same");
        confirm_password.value = "";
        password.focus();
        return false;
    } else {
        if (password.value.length < 6) {
            alert("Please Enter Valid Length Of Password");
            password.value = "";
            confirm_password.value = "";
            return false;
        }
    }

    if (city.value == "Other") {
        if (othercity.value == "") {
            alert("Please Enter City");
            othercity.focus();
            return false;
        }
    }
}
</script>
<?php
   include('subfooter.php');
?>