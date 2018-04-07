<form action="<?= ($BASE.'/kontraktor/create') ?>" method="post" class="form-horizontal">
<div class="col-lg-12">
    <div class="panel panel-primary">
            <div class="panel-heading">
                New Contractor
            </div>
            <div class="panel-body">
                <div class="input-prepend">
                    <span class="add-on"><i class="fa fa-retweet"></i> Id</span>
                    <input type="text" id="id_kontraktor" name="id_kontraktor" <?php if ($POST['id_kontraktor'] != ''): ?>value="<?= ($POST['id_kontraktor']) ?>"<?php else: ?>placeholder="Enter a contractor id"<?php endif; ?> class="form-control" />
                </div><br/>
                <div class="input-prepend">
                    <span class="add-on"><i class="fa fa-user-plus"></i> Nama</span>
                    <input type="text" id="nama" name="nama" <?php if ($POST['nama'] != ''): ?>value="<?= ($POST['nama']) ?>"<?php else: ?>placeholder="Enter a name"<?php endif; ?> class="form-control" />
                </div><br/>
                <div class="input-prepend">
                    <span class="add-on"><i class="fa fa-street-view"></i> Alamat</span>
                    <textarea class="form-control" id="alamat" name="alamat" <?php if ($POST['alamat'] == ''): ?>placeholder="Enter an address"<?php endif; ?> rows="3"><?= ($POST['alamat']) ?></textarea>
                </div><br/>
                <div class="input-prepend">
                    <span class="add-on"><i class="fa fa-phone-square"></i> No. Telp</span>
                    <input type="text" id="notelp" name="notelp" <?php if ($POST['notelp'] != ''): ?>value="<?= ($POST['notelp']) ?>"<?php else: ?>placeholder="Enter a phone number"<?php endif; ?> class="form-control" />
                </div><br/>
                <div class="input-prepend">
                    <span class="add-on"><i class="fa fa-list-ol"></i> NPWP</span>
                    <input type="text" id="npwp" name="npwp" <?php if ($POST['npwp'] != ''): ?>value="<?= ($POST['npwp']) ?>"<?php else: ?>placeholder="Enter a tax holder number"<?php endif; ?> class="form-control" />
                </div><br/>
                <div class="input-prepend">
                    <span class="add-on"><i class="fa fa-bars"></i> Deskripsi</span>
                    <textarea class="form-control" id="deksripsi" name="deskripsi" <?php if ($POST['deskripsi'] == ''): ?>placeholder="Enter a description"<?php endif; ?> rows="5"><?= ($POST['deskripsi']) ?></textarea>
                </div><br/>
                <div class="input-prepend">
                    <span class="add-on"><i class="fa fa-phone"></i> Contact Person</span>
                    <input type="text" id="contactperson" name="contactperson" <?php if ($POST['contactperson'] != ''): ?>value="<?= ($POST['contactperson']) ?>"<?php else: ?>placeholder="Enter a contact person phone number"<?php endif; ?> class="form-control" />
                </div><br/>
                <div class="input-prepend">
                    <span class="add-on"><i class="fa fa-user-plus"></i> Nama Pemilik</span>
                    <input type="text" id="namapemilik" name="namapemilik" <?php if ($POST['namapemilik'] != ''): ?>value="<?= ($POST['namapemilik']) ?>"<?php else: ?>placeholder="Enter an owner name"<?php endif; ?> class="form-control" />
                </div>                                       
            </div>
            <div class="panel-footer">
                <input type="hidden" name="create" value="create" />
                <button type="submit" name="bSubmit" value="submit" class="btn btn-primary"><i class="fa fa-save"></i> Simpan</button>
                <button type="button" name="bClear" value="Clear" class="btn btn-danger"><i class="fa fa-repeat"></i> Clear</button>
            </div>            
        </div>
</div>
</form>