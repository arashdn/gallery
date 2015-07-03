<form method="post" enctype="multipart/form-data">
    
    <div style="color: red;border: #000 solid  2px;">
        <?php echo validation_errors(); ?>
        <?php echo isset($upload_error)? $upload_error.'<br>':'' ; ?>
        <?php echo isset($send_error)? $send_error:'' ; ?>
    </div>
    
    <select name = "category">
        <?php
        foreach ($categories as $key => $value) 
        {
            echo '<option value="'.$value['id'].'">'.$value['title'].'</option>';
        }
        ?>
    </select>


    <input type="text" name = "subject" placeholder="subject">
    <textarea type="text" name="description" placeholder="description"></textarea>
    <input type="file" name = "pic" >
    <input type="submit" name="submit">
</form>