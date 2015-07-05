
<div class="demo-area">

    <div class="container" >

        <?php 
            $row = 2;//2 is for init , so first time row will be printed
            $rowPrinted;
        ?>
        <?php foreach ($posts as $value): ?>
        <?php
            $row++;
            $rowPrinted = false;
            if($row == 3)
            {
                echo '<div class="row">';
                
                $row = 0;
                $rowPrinted = true;
            }
        ?>
            <div class="col-sm-12  col-xs-12   col-md-4">

                <div class="panel panel-default">
                    <div class="panel-heading" id="panel-heading">
                        <h4 class="panel-title">
                            <?php echo $value['username']; ?>
                        </h4>
                    </div>
                    <div class="panel-body">
                        <img width="200" height="200" src="<?php echo $value['picture'];?>"/>

                    </div>
                    <div class="panel-footer" id="panel-footer">
                        <div class="row">

                            <div class="col-sm-9 col-md-6 col-xs-6">
                                <a href="#" data-toggle="modal" data-target="#myModal" data-pid="<?php echo $value['id'];?>"> more details...</a>

                            </div>
                            <div class="col-sm-3 col-md-6  col-xs-6">
                                <button class="btn btn-default" id="like">like </button>

                            </div>

                        </div>


                    </div>
                </div>
            </div>


        <?php if($row==2)
            echo '</div> <!-- row -->'
       ?>
        <?php endforeach;?>
        </div> <!-- row -->



        <!-- صفحه نمایش پست -->             


        <!— Modal —>
        <div class="modal fade" id="myModal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
            <div class="modal-dialog" role="document">
                <div class="modal-content">
                    <div class="modal-header">
                        عنوان
                        <button type="button" class="close pull-right" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                    </div>
                    <div class="modal-body">
<!--                        <img src="#" />
                        <p> توضیحات عکس</p>
                    </div>
                    <div class="modal-footer">

                        <p> نمایش نظرات</p>
                        <input type="text" class="form-control" placeholder="نظر خود را بنویسید">       
                        <button type="button" class="btn btn-primary">ارسال</button>
                        <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>   -->
                    </div>

                </div>
            </div>
        </div>



        <!-- شماره صفحات -->          
        <?php echo $paging ?>


    </div>
<script>
    
$("#myModal").on("show.bs.modal", function(e) {
    var id = e.relatedTarget.dataset.pid;
    console.log(id);
    $(this).find(".modal-body").load("<?php echo site_url('post/minidisplay') ?>/"+id);
});

</script>
</div>
