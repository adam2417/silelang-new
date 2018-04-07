<div class="col-lg-12">
    <div class="panel panel-default">
        <div class="panel-heading">
            Kriteria List
        </div>
        <!-- /.panel-heading -->
        <div class="panel-body">
            <div class="navbar">
                <div class="navbar-inner">
                    <a href="<?= ($BASE.'/kriteria/create') ?>"><button type="button" class="btn btn-primary btn-xl"><i class="fa fa-plus-circle"></i> Create</button></a>                    
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
                            <th scope="col">Id Kriteria</th>                            
                            <th scope="col">Deskripsi</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php $ctr=0; foreach (($kriteria?:[]) as $kr): $ctr++; ?>   
                            <tr class="<?= ($ctr%2?'odd':'even') ?>">
                                <td><?= (trim($kr['id_kriteria'])) ?></td>
                                <td><?= (trim($kr['deskripsi'])) ?></td>
                                <td><a href="<?= ($BASE.'/kriteria/detail/'. $kr['id_kriteria']) ?>" class="btn btn-info"><i class="fa fa-info-circle fa-fw"></i> Detail</a> <a href="<?= ($BASE.'/kriteria/update/'. $kr['id_kriteria']) ?>" class="btn btn-primary"><i class="fa fa-edit fa-fw"></i> Edit</a>
                                      <a href="<?= ($BASE.'/kriteria/delete/'. $kr['id_kriteria']) ?>" class="btn btn-danger"><i class="fa fa-trash fa-fw"></i>
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