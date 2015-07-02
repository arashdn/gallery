<div id="container">
<<<<<<< HEAD
    <div class="wrapper">
        <div class="col-sm-3" id="ss">
            <form class="form-signin" method="POST">
                <div style="color: red;border: #000 solid  2px;">
                    <?php echo validation_errors(); ?>
                </div>
                 <input type="text" class="form-control" name="email" placeholder="ایمیل خود را وارد کنید" required="" autofocus="" />
                <input type="password" class="form-control" name="password" placeholder="پسوورد خود را وارد کنید" required=""/>    
                <input type="password" class="form-control" name="password_conf" placeholder="Password Again" required=""/>   
                <input type="text" class="form-control" name="username" placeholder="نام کاربری خود را وارد کنید" required="" autofocus="" />
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
                <input type="text" class="form-control" name="captcha" placeholder="capthcha" required="" autofocus="" />
                <input type="submit" class="btn btn-lg btn-primary btn-block" id="sub" name="submit">
            </form>
        </div>
    </div>
</div>