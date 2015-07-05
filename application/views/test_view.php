Test only
<br>
<div id = "res"></div>
<input type="button" value="submit" id=btn>


<script>
    $("#btn").click(function(){
    
        $.ajax(
           {
               url: "<?php echo site_url('like/dolike/1'); ?>", 
               success: function(result)
               {
                    $("#res").html(result);
               }
    
        });
}); 
</script>