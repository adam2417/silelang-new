<form action="<?= ($BASE.'/daftar-lelang/create') ?>" method="post" class="form-horizontal" enctype="multipart/form-data">
<div class="col-lg-12">
    <div class="panel panel-primary">
            <div class="panel-heading">
                Daftar Baru
            </div>
            <div class="panel-body">
                <div class="input-prepend">
                    <span class="add-on"><i class="fa fa-retweet"></i> Id Lelang</span>
                    <?php if ($PARAMS['lelangid']): ?>
                        <input type="text" id="id_lelang" name="id_lelang" class="form-control" value="<?= ($PARAMS['lelangid']) ?>" readonly="readonly"/>
                        <?php else: ?><select class="form-control" name="id_lelang">
                            <?php foreach (($lelanglist?:[]) as $l): ?>   
                                <option value="<?= ($l['id_lelang']) ?>"><?= ($l['id_lelang'].' - '.$l['nama']) ?></option>
                            <?php endforeach; ?>
                        </select>
                    <?php endif; ?>
                </div><br/>
                <div class="input-prepend">
                    <span class="add-on"><i class="fa fa-phone-square"></i> No. Pendaftaran</span>
                    <input type="text" id="nopendaftaran" name="nopendaftaran" class="form-control" />
                </div><br/>
                <div class="input-prepend">
                    <span class="add-on"><i class="fa fa-user-plus"></i> Kontraktor</span><br/>
                    <!--<input type="text" id="id_kontraktor" name="id_kontraktor" class="form-control" />-->
                    <select name="id_kontraktor">
                        <?php foreach (($kontraktorlist?:[]) as $kid): ?>
                            <option value="<?= ($kid['id_kontraktor']) ?>"><?= ($kid['id_kontraktor'].' - '.$kid['nama']) ?></option>
                        <?php endforeach; ?>
                    </select>
                </div><br/>
                <div class="input-prepend">
                    <span class="add-on"><i class="fa fa-file"></i> Proposal</span>
                    <input type="file" name="proposal" id="proposal">
                </div><br/>
            </div>
            <div class="panel-footer">
                <input type="hidden" name="create" value="create" />
                <input type="hidden" name="lelangid" value="<?= ($PARAMS['lelangid']) ?>" />
                <button type="submit" name="bSubmit" value="submit" class="btn btn-primary"><i class="fa fa-save"></i> Simpan</button>
                <button type="button" name="bClear" value="Clear" class="btn btn-danger"><i class="fa fa-repeat"></i> Clear</button>
            </div>            
        </div>
</div>
</form>