<select name = "reg_university" class="form-control">
    <?php
    foreach ($categories as $key => $value) 
    {
        echo '<option value="'.$value['id'].'">'.$value['title'].'</option>';
    }

    ?>
</select>