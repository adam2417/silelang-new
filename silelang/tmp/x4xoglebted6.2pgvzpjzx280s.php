<?php echo $this->render($header,NULL,get_defined_vars(),0); ?>

<div id="page-wrapper">
    <div class="row">
        <div class="col-lg-12">
            <h1 class="page-header"><?= ($page_head) ?></h1>
        </div>
        <!-- /.col-lg-12 -->
    </div>
    <!-- /.row -->

    <div class="row">
        <?php echo $this->render($view,NULL,get_defined_vars(),0); ?>
    </div>
    <!-- /.row -->
    
</div>
<!-- /#page-wrapper -->

<?php echo $this->render($footer,NULL,get_defined_vars(),0); ?>