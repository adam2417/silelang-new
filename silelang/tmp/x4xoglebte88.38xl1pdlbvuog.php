<form action="<?= ($BASE.'/kriteria/update') ?>" method="post" class="form-horizontal">
<div class="col-lg-12">
    <div class="panel panel-primary">
            <div class="panel-heading">
                Kriteria
            </div>
            <div class="panel-body">                          
                <div class="input-prepend">
                    <span class="add-on"><i class="fa fa-user-plus"></i> Id Kriteria</span>
                    <input type="text" id="id_kriteria" name="id_kriteria" <?php if ($kriteria['id_kriteria'] != ''): ?>value="<?= ($kriteria['id_kriteria']) ?>"<?php else: ?>placeholder="Enter a criteria id"<?php endif; ?> class="form-control" readonly="readonly"/>
                </div><br/>                                
                <div class="input-prepend">
                    <span class="add-on"><i class="fa fa-bars"></i> Deskripsi</span>
                    <textarea class="form-control" id="deskripsi" name="deskripsi" <?php if ($kriteria['deskripsi'] == ''): ?>placeholder="Enter a description"<?php endif; ?> rows="5"><?= ($kriteria['deskripsi']) ?></textarea>
                </div>                            
            </div>
            <div class="panel-footer">                
                <input type="hidden" name="update" value="update" />
                <button type="submit" name="bSubmit" value="submit" class="btn btn-primary"><i class="fa fa-save"></i> Simpan</button>
                <button type="button" name="bClear" value="Clear" class="btn btn-danger"><i class="fa fa-repeat"></i> Clear</button>
            </div>
        </div>
</div>
</form>