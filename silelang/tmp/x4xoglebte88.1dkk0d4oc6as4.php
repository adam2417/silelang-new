<div class="col-lg-12">
    <div class="panel panel-default">
        <div class="panel-heading">
            Penilaian
        </div>
        <!-- /.panel-heading -->
        <div class="panel-body">
            <form method="post" action="<?= ($BASE. '/penilaian/get-list') ?>">
            <div class="navbar">
                <div class="col-lg-8">
                    <label>Pilih No Pendaftaran :</label>
                    <div class="form-group input-group">
                        <select class="form-control" name="pendlist">
                            <?php foreach (($pendaftaran?:[]) as $p): ?>   
                                <option value="<?= ($p['nopendaftaran']) ?>" <?php if ($p['nopendaftaran'] == $nodaftar): ?>selected<?php endif; ?> ><?= ($p['nopendaftaran'].' - '. $p['nama_lelang'] .' - ' .$p['nama_kontraktor']) ?></option>
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
            <div class="col-lg-8">
                <div class="panel panel-info">
                    <div class="panel-body">
                        <span class="title">No Pendaftaran : <?= ($nodaftar) ?></span><br/><br/>
                        <?php if ($daftarpenilaian): ?>
                            <table width="100%" class="table table-striped table-bordered table-hover" id="tbpenilaian">
                                <thead>
                                    <tr>
                                        <th>Kriteria</th>
                                        <th>Sub-Kriteria</th>
                                        <th>Penilaian</th>
                                        <th>&nbsp;</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <?php foreach (($daftarpenilaian?:[]) as $daftar): ?>
                                        <tr
                                            <?php if (($daftar['id_nilai'] % 2) == 0): ?>
                                                class="even"
                                                <?php else: ?>class="odd"
                                            <?php endif; ?>
                                        >
                                            <td><?= (trim($daftar['deskripsi'])) ?></td>
                                            <td><?= (trim($daftar['desk_sub'])) ?></td>
                                            <td><?= (trim($daftar['nilai'])) ?></td>
                                            <td>                                                
                                                <a href="<?= ($BASE.'/penilaian/delete/'. $daftar['nopendaftaran'].'/'.$daftar['id_kriteria']) ?>" class="btn btn-danger"><i class="fa fa-trash fa-fw"></i> Delete</a>
                                            </td>
                                        </tr>
                                    <?php endforeach; ?>
                                </tbody>
                            </table>
                        <?php endif; ?>
                    </div>
                    <div class="panel-footer">
                        <a href="<?= ($BASE.'/penilaian/create/'.$nodaftar) ?>"><button type="button" class="btn btn-primary btn-xl"><i class="fa fa-plus-circle"></i> Daftar Baru</button></a> 
                    </div>
                </div>
            </div>            
        </div>
        <!-- /.panel-body -->
    </div>
    <!-- /.panel -->
</div>
<!-- /.col-lg-12 -->