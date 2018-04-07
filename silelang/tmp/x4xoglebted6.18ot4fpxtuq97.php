<!-- Navigation -->
<nav class="navbar navbar-default navbar-static-top" role="navigation" style="margin-bottom: 0">
    <div class="navbar-header">
        <!--<button type="button" class="navbar-toggle" data-toggle="collapse" data-target=".navbar-collapse">
            <span class="sr-only">Toggle navigation</span>
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
        </button>-->
        <a class="navbar-brand" href="#"><?= ($site) ?></a>
    </div>
    <!-- /.navbar-header -->

    <?php echo $this->render($top_nav,NULL,get_defined_vars(),0); ?>
    <?php echo $this->render($left_nav,NULL,get_defined_vars(),0); ?>
</nav>