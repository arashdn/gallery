

    
<div id="container">
	  <div class="wrapper">
          
    
 
<div class="col-sm-3" id="ss">
    <form class="form-signin" method="post" action="<?php echo site_url('/member/dologin');?>" >  
      <div style="color: red;border: #000 solid  2px;"><?php echo $loginMsg;?></div>
      <input type="text" class="form-control" name="login_user" placeholder="ایمیل یا نام کاربری" required="" autofocus="" />
      <input type="password" class="form-control" name="login_pass" placeholder="پسوورد" required=""/>
      <?php if($showLoginCaptcha) : ?>
        <div class="form-group" id="captcha_display">
            <script type="text/javascript">

                function createCaptcha()
                {
                    $.get("<?php echo site_url('captcha/') ?>",'',function (data)
                    {
                        $('#captcha_display').html(data);
                    });
                }

                $(document).ready(function()
                {
                    createCaptcha();
                });
            </script>
        </div>
        <div class="form-group">
            <input type="text" name = "captcha" class="form-control" id="captcha" placeholder="Captcha">
        </div>
      <?php endif; ?>
      <label class="checkbox">
        <input type="checkbox" value="remember-me" id="rememberMe" name="login_rem">مرا بخاطر بسپار      </label>
        <div class="col-sm-5">
      <button class="btn btn-lg btn-block" id="sub" type="submit">ورود</button> 
            </div>
    </form>
           </div>
    </div>
  

    
    
    
    

</div>
