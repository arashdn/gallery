<div id="container">

	<?php
         if($this->loginlib->isLoggedIn())
             echo 'وارد شده '.$this->loginlib->getUserName().'  <a href="'.site_url('/member/logout').'">خروج</a>';
         else
             echo 'وارد نشده '.'<a href="'.site_url('/member/login').'">ورود</a>  '.'<a href="'.site_url('/member/register').'">ثبت نام</a>  ';
        
        ?>
</div>