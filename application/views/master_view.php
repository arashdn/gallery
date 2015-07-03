<?php
defined('BASEPATH') OR exit('No direct script access allowed');
?><!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<title>Gallery</title> 
    <link rel="stylesheet" href="<?php echo base_url(); ?>assets/css/bootstrap.min.css">
    <link rel="stylesheet" href="<?php echo base_url(); ?>assets/css/bootstrap-rtl.min.css">
    <link rel="stylesheet" href="<?php echo base_url(); ?>assets/css/login.css">

	
    <script src="<?php echo base_url(); ?>assets/js/jquery-1.11.0.js"></script>
    <script src="<?php echo base_url(); ?>assets/js/bootstrap.min.js"></script>
    </head>
    
    
    
    
<body>
	
	<?php echo $content; ?>

    
<nav class="navbar">
  <div class="container-fluid">
    <!-- Brand and toggle get grouped for better mobile display -->
    <div class="navbar-header">
      <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#bs-example-navbar-collapse-1" aria-expanded="false">
        <span class="sr-only">Toggle navigation</span>
        <span class="icon-bar"></span>
        <span class="icon-bar"></span>
        <span class="icon-bar"></span>
      </button>
    <li class="navbar-brand active" ><a  href="#">Galley</a></l> 
    </div>

    <!-- Collect the nav links, forms, and other content for toggling -->
    <div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
      <ul class="nav navbar-nav">
        <li><a href="#">پست جدید <span class="sr-only">(current)</span></a></li>
        <li><a href="#">notification</a></li>
          

      </ul>
        
      <form class="navbar-form navbar-left" role="search">
         
          <button type="submit" class="btn btn-default">بگرد</button>
        <div class="form-group">
          <input type="text" class="form-control" placeholder="جست و جو ...">
        </div>
         
      </form>
      <ul class="nav navbar-nav navbar-right">
        <li><a href="#">نام کاربری</a></li>
          

      </ul>
    </div><!-- /.navbar-collapse -->
  </div><!-- /.container-fluid -->
</nav>
    
</body>
</html>