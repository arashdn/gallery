<?php
defined('BASEPATH') OR exit('No direct script access allowed');
?><!DOCTYPE html>
<html>
<head>
    	<meta charset="UTF-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
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

    
<!-- <nav class="navbar">
  <div class="container-fluid">
    
    <div class="navbar-header">
      <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#bs-example-navbar-collapse-1" aria-expanded="false">
        <span class="sr-only">Toggle navigation</span>
        <span class="icon-bar"></span>
        <span class="icon-bar"></span>
        <span class="icon-bar"></span>
      </button>
    <li class="navbar-brand active" ><a  href="#"></a></l> 
    </div>

    
    
    
    
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
   
  </div>
</nav>-->
<!--<header>
<nav class="navbar navbar-default" role="navigation">
    <div class="container">
    <div class="navbar-header">
        <button type="button" class="navbar-toggle" data-toggle="collapse" data-target="#example-nav-collapse">
            <span class="sr-only">toggle navigation</span>
        <span class="icon-bar"></span>
        <span class="icon-bar"></span>
        <span class="icon-bar"></span> 
        </button>
        
        <a  href="#" class="navbar-brand">brand</a>  
        </div>
        <div class="collapse navabr-collapse" id ="example-nav-collapse">
        <ul class="nav navbar-nav">
            <li class="active"><a href="#">link1</a></li>
            <li><a href="#">link2</a></li>
            </ul>
        </div>
    
    
    </div>
    
    
    </nav>
</header>-->
    
    
    	<header>
		<!--header code goes here!-->
		<nav id="nav" class="navbar navbar-default navbar-fixed-top">
			<div class="container-fluid">
				<div class="navbar-header">
					<button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#bs-example-navbar-collapse-2">
						<span class="sr-only">Toggle navigation</span>
						<span class="icon-bar"></span>
						<span class="icon-bar"></span>
						<span class="icon-bar"></span>
					</button>
                    <a id="link" class="navbar-brand" href="#"> گالری  </a>

				</div>

				<div class="collapse navbar-collapse" id="bs-example-navbar-collapse-2">
					<ul class="nav navbar-nav">
						<li class="active"><a  class="navbar navbar-text" id="link"  href="#">پست جدید<span class="sr-only">(current)</span></a></li>
						<li><a class="navbar navbar-text" id="link" href="#">نام کاربری</a></li>
						<li><a  class="navbar navbar-text" id="link" href="#">notification</a></li>
					</ul>
                    <form action="" class="navbar-form navbar-left" role="search">
                    <div class="form-group">
                        <input type="text" class="form-control" placeholder="جست و جو ...">                        </div>
                        <button type="submit" class="btn btn-default" > بگرد</button>
                    </form>
                    
                    
                    
                    

					</ul>
				</div>
			</div>
		</nav>
	</header>

<footer>
    
    <div class="footer navbar-fixed-bottom">
    
    footer
        
        </div>
        </footer>


    
</body>
</html>