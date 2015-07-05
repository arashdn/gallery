
<div class="container"id="addpost" >
    
<form method="post" enctype="multipart/form-data" class="form-horizontal" >
    
    <div style="color: red;border: #000 solid  2px;">
        <?php echo validation_errors(); ?>
        <?php echo isset($upload_error)? $upload_error.'<br>':'' ; ?>
        <?php echo isset($send_error)? $send_error:'' ; ?>
    </div>
    
 <div class="col-sm-6  col-lg-9 col-md-7 ">
    
<div class="form-group" id="form-group" >
<div id="sendform" >
  
     <input type="text" name = "subject" placeholder="موضوع" class="form-control" style="margin-bottom:40px;" >
        <textarea type="text" name="description" placeholder="توضیحات" class="form-control" style="margin-bottom:40px;"></textarea>
    
    <input type="file" name = "pic" class="form-control" style="padding:8px;" style="margin-bottom:40px;">

   
  
    <label>
        نوع دسته :
 
      
       <select name = "category">
        <?php
        foreach ($categories as $key => $value) 
        {
            echo '<option value="'.$value['id'].'">'.$value['title'].'</option>';
        }
        ?>
    </select>
  </label>
    
    
        <input type="submit" name="submit" class="btn btn-defaultS " >
      
    </div>
        </div>
    </div>
       
</form>

    </div>
