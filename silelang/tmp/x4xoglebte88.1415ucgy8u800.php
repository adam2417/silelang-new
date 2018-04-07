<div class="navbar-default sidebar" role="navigation">
    <div class="sidebar-nav navbar-collapse">
        <ul class="nav" id="side-menu">
            <li class="sidebar-search">                
                <div class="image" style="width: 75px; height: 75px; border-radius: 50%; background-image: url('<?= ($BASE.'/'.$media_images) ?>/profile/profile3.png');background-position: center center; background-size: cover; "></div>
                <span><?= ($username) ?></span>
            </li>
            <li>
                <a href="<?= ($BASE.'/home') ?>"><i class="fa fa-home fa-fw"></i> Home</a>
            </li>
            <li>
                <a href="<?= ($BASE.'/lelang') ?>"><i class="fa fa-bullhorn fa-fw"></i> Lelang</a>
            </li>
            <li>
                <a href="<?= ($BASE.'/daftar-lelang') ?>"><i class="fa fa-list-alt fa-fw"></i> Daftar Lelang</a>
            </li>
            <li>
                <a href="<?= ($BASE.'/penilaian') ?>"><i class="fa fa-table fa-fw"></i> Penilaian</a>
            </li>
            <?php if ($SESSION['role'] == 1): ?>
            <li>
                <a href="#"><i class="fa fa-cogs fa-fw"></i> Settings<span class="fa arrow"></span></a>
                <ul class="nav nav-second-level">
                    <li>
                        <a href="<?= ($BASE.'/user') ?>"><i class="fa fa-users fa-fw"></i> User</a>
                    </li>
                    <li>
                        <a href="<?= ($BASE.'/kontraktor') ?>"><i class="fa fa-sticky-note fa-fw"></i> Kontraktor</a>
                    </li>                    
                    <li>
                        <a href="<?= ($BASE.'/kriteria') ?>"><i class="fa fa-check-square fa-fw"></i> Kriteria</a>
                    </li>
                </ul>
                <!-- /.nav-second-level -->
            </li>
            <?php endif; ?>
        </ul>
    </div>
    <!-- /.sidebar-collapse -->
</div>
<!-- /.navbar-static-side -->
