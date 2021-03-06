<div class="col-lg-12">
    <div class="panel panel-default">
        <div class="panel-heading">
            Users List
        </div>
        <!-- /.panel-heading -->
        <div class="panel-body">
            <?php if ($message): ?>
            <div id="success-message" name="success-message" class="alert alert-success">
                <button type="button" class="close" data-dismiss="alert">&times;</button>
                <strong><?= ($message) ?></strong>
            </div>
            <?php endif; ?>            
            <table width="100%" class="table table-striped table-bordered table-hover" id="dataTables-example">
                    <thead>
                        <tr>
                            <th scope="col">Username</th>                            
                            <th scope="col">Nama Kontraktor</th>
                            <th scope="col">Status</th>
                        </tr>
                    </thead>
                    <tbody>
                        <!-- Kalo variabel users yang keluar-->
                        <?php if (!empty($users)): ?>
                        <?php $ctr=0; foreach (($users?:[]) as $user): $ctr++; ?>   
                            <tr class="<?= ($ctr%2?'odd':'even') ?>">
                                <td><?= (trim($user['username'])) ?></td>
                                <td><?= (trim($user['nama'])) ?></td>
                                <td><?php if (trim($user['status'])=='1'): ?>Aktif<?php endif; ?></td>
                                <td>
                                <?php if ($user['role'] != '1'): ?>
                                <a href="<?= ($BASE.'/user/detail/'. $user['id']) ?>" class="btn btn-info"><i class="fa fa-info-circle fa-fw"></i> Detail</a> <a href="<?= ($BASE.'/user/update/'. $user['id']) ?>" class="btn btn-primary"><i class="fa fa-edit fa-fw"></i> Edit</a>
                                      <a href="<?= ($BASE.'/user/delete/'. $user['id']) ?>" class="btn btn-danger"><i class="fa fa-trash fa-fw"></i>
                                        Delete</a>
                                <?php endif; ?>&nbsp;
                                </td>
                            </tr>
                        <?php endforeach; ?>
                        <?php endif; ?>
                        <!-- END-->
                        <!-- Kalo variabel user yang keluar-->
                        <?php if (!empty($notusers)): ?>
                            <tr class="<?= ($ctr%2?'odd':'even') ?>">
                                <td><?= (trim($notusers['username'])) ?></td>
                                <td><?= (trim($notusers['nama'])) ?></td>
                                <td><?php if (trim($notusers['status'])=='1'): ?>Aktif<?php endif; ?></td>
                                <td>
                                <a href="<?= ($BASE.'/user/detail/'. $notusers['id']) ?>" class="btn btn-info"><i class="fa fa-info-circle fa-fw"></i> Detail</a> <a href="<?= ($BASE.'/user/update/'. $notusers['id']) ?>" class="btn btn-primary"><i class="fa fa-edit fa-fw"></i> Edit</a>
                                      <a href="<?= ($BASE.'/user/delete/'. $notusers['id']) ?>" class="btn btn-danger"><i class="fa fa-trash fa-fw"></i>
                                        Delete</a>
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