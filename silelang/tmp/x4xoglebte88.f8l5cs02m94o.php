<div class="col-lg-12">
    <div class="panel panel-default">
        <div class="panel-heading">
            Daftar Lelang
        </div>
        <!-- /.panel-heading -->
        <div class="panel-body">
            <form method="post" action="<?= ($BASE. '/daftar-lelang/get-list') ?>">
            <div class="navbar">
                <div class="col-lg-8">
                    <label>Pilih Lelang :</label>
                    <div class="form-group input-group">
                        <select class="form-control" name="slelanglist">
                            <?php foreach (($lelanglist?:[]) as $l): ?>   
                                <option value="<?= ($l['id_lelang']) ?>"<?php if ($l['id_lelang'] == $idlelang): ?>selected<?php endif; ?>><?= ($l['id_lelang'].' - '.$l['nama']) ?></option>
                            <?php endforeach; ?>
                        </select>                        
                    </div>
                    <button type="submit" class="btn btn-info">Lihat Daftar</button>
                </div>                
            </div>
            </form>
            <?php if ($message): ?>
            <div id="success-message" name="success-message" class="alert alert-success">
                <button type="button" class="close" data-dismiss="alert">&times;</button>
                <strong><?= ($message) ?></strong>
            </div>
            <?php endif; ?>
            <br/>            
            <div class="col-lg-12">
                <div class="panel panel-info">
                    <div class="panel-body">
                        <?php if ($daftarlelangs): ?>
                            <table width="100%" class="table table-striped table-bordered table-hover" id="dataTables-example">
                                <thead>
                                    <tr>
                                        <th>No. Pendaftaran</th>
                                        <th>Kontraktor</th>
                                        <th>Anggaran</th>
                                        <th>Proposal</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <?php foreach (($daftarlelangs?:[]) as $daftar): ?>
                                        <tr 
                                            <?php if (($daftar['id_daftar'] % 2) == 0): ?>
                                                class="even"
                                                <?php else: ?>class="odd"
                                            <?php endif; ?>
                                        >
                                            <td><?= (trim($daftar['nopendaftaran'])) ?></td>
                                            <td><?= (trim($daftar['nama_kontraktor'])) ?></td>
                                            <td><?= ('Rp. '.number_format(trim($daftar['anggaran']),2,'.',',')) ?></td>
                                            <td><a href="<?= ($BASE.'/'.$daftar['proposal']) ?>" target="_blank"><?= (trim($daftar['proposal'])) ?></a></td>
                                        </tr>
                                    <?php endforeach; ?>
                                </tbody>
                            </table>
                        <?php endif; ?>
                    </div>
                    <div class="panel-footer">
                        <a href="<?= ($BASE.'/daftar-lelang/create/'.$idlelang) ?>"><button type="button" class="btn btn-primary btn-xl"><i class="fa fa-plus-circle"></i> Daftar Baru</button></a>
                    </div>
                </div>
            </div>            
        </div>
        <!-- /.panel-body -->
    </div>
    <!-- /.panel -->
</div>
<!-- /.col-lg-12 -->