<div class="col-lg-12">
    <div class="panel panel-primary">
            <div class="panel-heading">
                Detail Lelang
            </div>
            <div class="panel-body">                
                <div id="detailone" class="panel-collapse collapse in">
                    <div class="panel-body">                                
                        <div class="input-prepend">
                            <span class="add-on"><i class="fa fa-user-plus"></i> Id Lelang</span>
                            <input type="text" id="id_lelang" name="id_lelang" placeholder="Id Lelang" class="form-control" value="<?= ($lelangs['id_lelang']) ?>" readonly="readonly"/>
                        </div><br/>
                        <div class="input-prepend">
                            <span class="add-on"><i class="fa fa-user-plus"></i> Nama</span>
                            <input type="text" id="nama" name="nama" placeholder="Nama" class="form-control" value="<?= ($lelangs['nama']) ?>" readonly="readonly"/>
                        </div><br/>
                        <div class="input-prepend">
                            <span class="add-on"><i class="fa fa-bars"></i> Deskripsi</span>
                            <textarea class="form-control" id="deskripsi" name="deskripsi" placeholder="Deskripsi" rows="5" readonly="readonly"><?= ($lelangs['deskripsi']) ?></textarea>
                        </div><br/>
                        <div class="input-prepend">
                            <span class="add-on"><i class="fa fa-user-plus"></i> Anggaran</span>
                            <input type="text" id="anggaran" name="anggaran" placeholder="Anggaran" class="form-control" value="<?= ($lelangs['anggaran']) ?>" readonly="readonly"/>
                        </div><br/>
                        <div class="input-prepend">
                            <span class="add-on"><i class="fa fa-user-plus"></i> Estimasi Waktu</span>
                            <input type="text" id="estimasi_waktu" name="estimasi_waktu" placeholder="Estimasi Waktu" class="form-control" value="<?= ($lelangs['estimasi_waktu']) ?>" readonly="readonly"/>
                        </div><br/>
                        <div class="input-prepend">
                            <span class="add-on"><i class="fa fa-user-plus"></i> Lokasi</span>
                            <input type="text" id="lokasi" name="lokasi" placeholder="Lokasi" class="form-control" value="<?= ($lelangs['lokasi']) ?>" readonly="readonly"/>
                        </div><br/>
                        <div class="input-prepend">
                            <span class="add-on"><i class="fa fa-user-plus"></i> Tanggal Mulai</span>
                            <input type="text" id="tgl_mulai" name="tgl_mulai" placeholder="Tanggal Mulai" class="form-control" value="<?= (Filters::date($lelangs['tgl_mulai'],'d/m/Y')) ?>" readonly="readonly"/>
                        </div><br/>
                        <div class="input-prepend">
                            <span class="add-on"><i class="fa fa-user-plus"></i> Tanggal Selesai</span>
                            <input type="text" id="tgl_selesai" name="tgl_selesai" placeholder="Tanggal Selesai" class="form-control" value="<?= (Filters::date($lelangs['tgl_selesai'],'d/m/Y')) ?>" readonly="readonly"/>
                        </div><br/>
                    </div>
                </div>           
            </div>
            <div class="panel-footer">
                <a href="<?= ($BASE. '/lelang') ?>"><button type="button" name="bBack" value="Back" class="btn btn-success"><i class="fa fa-undo"></i> Back</button></a>
            </div>
        </div>
</div>