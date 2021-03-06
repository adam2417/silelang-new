<div class="col-lg-12">
    <div class="panel panel-default">
        <div class="panel-heading">
            Kontraktor List
        </div>
        <!-- /.panel-heading -->
        <div class="panel-body">
            <div class="navbar">
                <div class="navbar-inner">
                    <a href="<?= ($BASE.'/kontraktor/create') ?>"><button type="button" class="btn btn-primary btn-xl"><i class="fa fa-plus-circle"></i> Create</button></a>                    
                </div>
            </div>
            <?php if ($message): ?>
            <div id="success-message" name="success-message" class="alert alert-success">
                <button type="button" class="close" data-dismiss="alert">&times;</button>
                <strong><?= ($message) ?></strong>
            </div>
            <?php endif; ?>
            <table width="100%" class="table table-striped table-bordered table-hover" id="dataTables-example">
                    <thead>
                        <tr>
                            <th scope="col">ID</th>
                            <th scope="col">Nama</th>
                            <th scope="col">Alamat</th>
                            <th scope="col">No. Telp</th>
                            <th scope="col">NPWP</th>
                            <th scope="col">Nama Pemilik</th>
                        </tr>
                    </thead>
                    <tbody>
                        <!-- Kalo variabel kontraktors yang keluar-->
                        <?php if (!empty($kontraktors)): ?>
                        <?php $ctr=0; foreach (($kontraktors?:[]) as $kontraktor): $ctr++; ?>                        
                        <tr class="<?= ($ctr%2?'odd':'even') ?>">
                            <td><?= (trim($kontraktor['id_kontraktor'])) ?></td>
                            <td><?= (trim($kontraktor['nama'])) ?></td>
                            <td><?= (trim($kontraktor['alamat'])) ?></td>
                            <td><?= (trim($kontraktor['notelp'])) ?></td>
                            <td><?= (trim($kontraktor['npwp'])) ?></td>
                            <td><?= (trim($kontraktor['namapemilik'])) ?></td>
                            <td><a href="<?= ($BASE.'/kontraktor/detail/'. $kontraktor['id_kontraktor']) ?>" class="btn btn-info"><i class="fa fa-info-circle fa-fw"></i> Detail</a> <a href="<?= ($BASE.'/kontraktor/update/'. $kontraktor['id_kontraktor']) ?>" class="btn btn-primary"><i class="fa fa-edit fa-fw"></i> Edit</a>
                                  <a href="<?= ($BASE.'/kontraktor/delete/'. $kontraktor['id_kontraktor']) ?>" class="btn btn-danger"><i class="fa fa-trash fa-fw"></i>
                                    Delete</a> <?php if ($kontraktor['id_kontraktor'] != $userview['id_kontraktor']): ?> <a href="<?= ($BASE.'/user/create/cid/'. $kontraktor['id_kontraktor']) ?>" class="btn btn-default"><i class="fa fa-plus-circle fa-fw"></i> Create As New User</a><?php endif; ?>
                            </td>

                        </tr>
                        <?php endforeach; ?>
                        <?php endif; ?>
                        <!-- END-->
                        <!-- Kalo variabel kontraktor yang keluar-->
                        <?php if (!empty($notkontraktors)): ?>                      
                        <tr>
                            <td><?= (trim($notkontraktors['id_kontraktor'])) ?></td>
                            <td><?= (trim($notkontraktors['nama'])) ?></td>
                            <td><?= (trim($notkontraktors['alamat'])) ?></td>
                            <td><?= (trim($notkontraktors['notelp'])) ?></td>
                            <td><?= (trim($notkontraktors['npwp'])) ?></td>
                            <td><?= (trim($notkontraktors['namapemilik'])) ?></td>
                            <td><a href="<?= ($BASE.'/kontraktor/detail/'. $notkontraktors['id_kontraktor']) ?>" class="btn btn-info"><i class="fa fa-info-circle fa-fw"></i> Detail</a> <a href="<?= ($BASE.'/kontraktor/update/'. $notkontraktors['id_kontraktor']) ?>" class="btn btn-primary"><i class="fa fa-edit fa-fw"></i> Edit</a>
                                  <a href="<?= ($BASE.'/kontraktor/delete/'. $notkontraktors['id_kontraktor']) ?>" class="btn btn-danger"><i class="fa fa-trash fa-fw"></i>
                                    Delete</a> <?php if ($notkontraktors['id_kontraktor'] != $userview['id_kontraktor']): ?> <a href="<?= ($BASE.'/user/create/cid/'. $notkontraktors['id_kontraktor']) ?>" class="btn btn-default"><i class="fa fa-plus-circle fa-fw"></i> Create As New User</a><?php endif; ?>
                            </td>

                        </tr>
                        <?php endif; ?>
                        <!-- END-->
                </tbody>
            </table>
            </div>
        <!-- /.panel-body -->
    </div>
    <!-- /.panel -->
</div>
<!-- /.col-lg-12 -->