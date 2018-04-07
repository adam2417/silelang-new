<div class="col-lg-12">
    <div class="panel panel-default">
        <div class="panel-heading">
            Lelang List
        </div>
        <!-- /.panel-heading -->
        <div class="panel-body">
            <div class="navbar">
                <div class="navbar-inner">
                    <a href="<?= ($BASE.'/lelang/create') ?>"><button type="button" class="btn btn-primary btn-xl"><i class="fa fa-plus-circle"></i> Create</button></a>                    
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
                            <th scope="col">Deskripsi</th>
                            <th scope="col">Lokasi</th>
                            <th scope="col">Anggaran</th>
                            <th scope="col">Tanggal Mulai</th>
                            <th scope="col">Tanggal Selesai</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php foreach (($lelangs?:[]) as $lelang): ?>   
                            <tr <?php if (($lelang['id_lelang'] % 2) == 0): ?>class="even"<?php else: ?>class="odd"<?php endif; ?>>
                                <td><?= (trim($lelang['id_lelang'])) ?></td>
                                <td><?= (trim($lelang['nama'])) ?></td>
                                <td><?= (trim($lelang['deskripsi'])) ?></td>
                                <td><?= (trim($lelang['lokasi'])) ?></td>                                
                                <td><?= (Filters::date($lelang['tgl_mulai'],'d/m/Y')) ?></td>
                                <td><?= (Filters::date($lelang['tgl_selesai'],'d/m/Y')) ?></td>
                                <td><a href="<?= ($BASE.'/lelang/detail/'. $lelang['id_lelang']) ?>" class="btn btn-info"><i class="fa fa-info-circle fa-fw"></i> Detail</a> <a href="<?= ($BASE.'/lelang/update/'. $lelang['id_lelang']) ?>" class="btn btn-primary"><i class="fa fa-edit fa-fw"></i> Edit</a>
                                      <a href="<?= ($BASE.'/lelang/delete/'. $lelang['id_lelang']) ?>" class="btn btn-danger"><i class="fa fa-trash fa-fw"></i>
                                        Delete</a>
                                </td>

                            </tr>
                        <?php endforeach; ?>
                </tbody>
            </table>
            </div>
        <!-- /.panel-body -->
    </div>
    <!-- /.panel -->
</div>
<!-- /.col-lg-12 -->