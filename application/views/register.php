<?php
defined('BASEPATH') OR exit('No direct script access allowed');
?><!DOCTYPE html>
<html>
    <head>
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <meta charset="utf-8">
        <title>Gallery</title> 
        <link rel="stylesheet" href="<?php echo base_url(); ?>assets/css/bootstrap.min.css">
        <link rel="stylesheet" href="<?php echo base_url(); ?>assets/css/bootstrap-rtl.min.css">
        <link rel="stylesheet" href="<?php echo base_url(); ?>assets/css/login.css">


        <script src="<?php echo base_url(); ?>assets/js/jquery-1.11.0.js"></script>
        <script src="<?php echo base_url(); ?>assets/js/bootstrap.min.js"></script>
    </head>



    <body class="pack">

        <div id="container">
            <div class="wrapper">
                <div class="col-sm-3" id="form-group">
                    <form class="form-signin" method="POST" id="reg_form">
                        <div style="color: red;border: #000 solid  2px;">
                            <?php echo validation_errors(); ?>
                        </div>
                        <input type="text" id = "email" class="form-control" name="email" placeholder="ایمیل خود را وارد کنید" required="" autofocus="" />
                        <input type="password" id="pass" class="form-control" name="password" placeholder="پسوورد خود را وارد کنید" required=""/>    
                        <input type="password" id="pass_conf" class="form-control" name="password_conf" placeholder="تکرار پسورد" required=""/>   
                        <input id="username" type="text" class="form-control" name="username" placeholder="نام کاربری خود را وارد کنید" required="" autofocus="" />
                        <div class="form-group" id="captcha_display">
                            <script type="text/javascript">

                                function createCaptcha()
                                {
                                    $.get("<?php echo site_url('captcha/') ?>", '', function(data)
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
                        <input type="text" class="form-control" name="captcha" placeholder="حروف تصویر را وارد کنید" required="" autofocus="" />

                        <div class="col-sm-5">
                            <input type="submit" class="btn btn-lg btn-primary btn-block" id="sub" name="submit" value="ثبت نام" >
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </body>

    <script>
    $("#username").blur(function()
    {
        $("#username").css('border-width','2px');
        if($("#username").val().length < 4)
        {
            $("#username").css('border-color','red');
            //$("#username").addClass( "has-error" );
        }
        else
        {
            $("#username").css('border-color','green');
        }
    });
    
    $("#pass").blur(function ()
    {
        $("#pass").css('border-width','2px');
        $("#pass_conf").css('border-width','2px');
        var p1 = $("#pass").val()
        var p2 = $("#pass_conf").val();
        if( p1 == p2 && p1 != "")
        {
            
            $("#pass").css('border-color','green');
            $("#pass_conf").css('border-color','green');
        }
        else
        {
            $("#pass").css('border-color','red');
            $("#pass_conf").css('border-color','red');
        }
    });
    $("#pass_conf").blur(function ()
    {
        $("#pass").css('border-width','2px');
        $("#pass_conf").css('border-width','2px');
        var p1 = $("#pass").val()
        var p2 = $("#pass_conf").val();
        if( p1 == p2 && p1 != "")
        {
            
            $("#pass").css('border-color','green');
            $("#pass_conf").css('border-color','green');
        }
        else
        {
            $("#pass").css('border-color','red');
            $("#pass_conf").css('border-color','red');
        }
    });
    
    
    
    function validateEmail(email) 
    { 
        var re = /^(([^<>()[\]\\.,;:\s@\"]+(\.[^<>()[\]\\.,;:\s@\"]+)*)|(\".+\"))@((\[[0-9]{1,3}\.[0-9]{1,3}\.[0-9]{1,3}\.[0-9]{1,3}\])|(([a-zA-Z\-0-9]+\.)+[a-zA-Z]{2,}))$/;
        return re.test(email);
    } 
    
    $("#email").blur(function()
    {
        $("#email").css('border-width','2px');
        if(validateEmail($("#email").val()))
        {
            $("#email").css('border-color','green');
        }
        else
        {
            $("#email").css('border-color','red');
        }
    });
    
    
    </script>
    
</html>