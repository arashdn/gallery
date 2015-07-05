
<div class="container">
<form method="post" enctype="multipart/form-data" class="form-horizontal">
    
    <div style="color: red;border: #000 solid  2px;">
        <?php echo validation_errors(); ?>
        <?php echo isset($upload_error)? $upload_error.'<br>':'' ; ?>
        <?php echo isset($send_error)? $send_error:'' ; ?>
    </div>
    
 <div class="col-sm-6  col-lg-6 col-md-3 " style="margin-right:300px; margin-top:60px;">
<div class="form-group">

  
    <input type="file" name = "pic" class="form-control" style="padding:8px;">

    <input type="text" name = "subject" placeholder="subject" class="form-control">
    
       <select name = "category">
        <?php
        foreach ($categories as $key => $value) 
        {
            echo '<option value="'.$value['id'].'">'.$value['title'].'</option>';
        }
        ?>
    </select>

    <textarea type="text" name="description" placeholder="description" class="form-control"></textarea>
    
    
    
    
        <input type="submit" name="submit" class="btn btn-defaultS ">
    
    </div>
</form>
    </div>
    </div>
