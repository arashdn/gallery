<div class="container">


    <div class="row">
        <div class="col-sm-6 col-md-4">
            <p>ارسال شده توسط <?php echo $username; ?> در <?php echo $displayDate; ?></p>
            <!--<div class="thumbnail">-->
            <div>
                <img src="<?php echo $picture; ?>" alt="" width="640" height="480">
                <div class="caption">
                    <h3>توضیحات</h3>
                    <p><?php echo $description; ?></p>
                </div>
            </div>
        </div>
    </div>


</div>  
<div class="modal-footer">

    <?php if ($login) : ?>
        <div class="row"> 
            
            <button type="button" class="btn btn-default"  id="like_btn"><?php echo $like?' no like':'like';?>
            </button>
            <span class="badge" id="like_count"><?php echo $likeCount; ?></span>
        </div>  

        <div class="row">
            <ul class="list-group pull-right col-md-2">
                <li class="list-group-item">اسم  </li>
            </ul>

            <ul class="list-group pull-right col-md-10">
                <li class="list-group-item">نظر <span class="badge">1</span>  </li>
            </ul>

        </div>

        <div class="row">
            <div class="col-md-10 col-sm-10 col-xs-10">
                <input  type="text" class="form-control navbar-text" placeholder="نظر خود را بنویسید">
            </div>
            <div class="col-md-2 col-sm-2 col-xs-2">
                <button  type="button" class="btn btn-primary navbar-btn">ارسال</button>
            </div>
        </div>

    <?php endif; ?>
</div>


<script>
    $("#like_btn").click(function(e){
    
        e.preventDefault();
        $.ajax(
           {
               url: "<?php echo site_url('like/dolike/'.$id); ?>", 
               success: function(result)
               {
                   if(result == "<?php echo LIKE_OK ?>")
                   {
                       $("#like_btn").html('نمی پسندم');
                       var cnt = $("#like_count").html();
                       cnt++;
                       $("#like_count").html(cnt);
                   }
                   else if(result == "<?php echo LIKE_NO_LIKE ?>")
                   {
                       $("#like_btn").html('می پسندم');
                       var cnt = $("#like_count").html().valueOf();
                       $("#like_count").html(cnt-1);
                   }
               }
    
        });
}); 
</script>