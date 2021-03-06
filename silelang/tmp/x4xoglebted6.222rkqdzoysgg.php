<form action="<?= ($BASE.'/lelang/create') ?>" method="post" class="form-horizontal" name="frmTambahLelang">
<div class="col-lg-12">
    <div class="panel panel-primary">
            <div class="panel-heading">
                New Lelang
            </div>
            <div class="panel-body">                
                <div id="detailone" class="panel-collapse collapse in">
                    <div class="panel-body">                                
                        <div class="input-prepend">
                            <label><i class="fa fa-user-plus"></i> Id Lelang</label>
                            <input type="text" id="id_lelang" name="id_lelang" placeholder="Id Lelang" class="form-control"/>
                        </div><br/>
                        <div class="input-prepend">
                            <label><i class="fa fa-user-plus"></i> Nama</label>
                            <input type="text" id="nama" name="nama" placeholder="Nama" class="form-control"/>
                        </div><br/>
                        <div class="input-prepend">
                            <label><i class="fa fa-bars"></i> Deskripsi</label>
                            <textarea class="form-control" id="deskripsi" name="deskripsi" placeholder="Deskripsi" rows="5"></textarea>
                        </div><br/>
                        <div class="input-prepend">
                            <label><i class="fa fa-money"></i> Anggaran</label>
                            <input type="text" id="anggaran" name="anggaran" placeholder="Anggaran" class="form-control" onmousehover/>
                        </div><br/>
                        <div class="input-prepend">
                            <div class="col-xs-4">
                                <label><i class="fa fa-hourglass"></i> Estimasi Waktu</label>
                                <div class="form-group input-group">                                    
                                    <input type="text" id="estimasi_waktu" name="estimasi_waktu" placeholder="Estimasi Waktu" class="form-control"/>
                                    <span class="input-group-addon"> Hari</span>
                                </div>
                            </div>
                        </div><br/><br/><br/><br/>
                        <div class="input-prepend">
                            <label><i class="fa fa-user-plus"></i> Lokasi</label>
                            <input type="text" id="lokasi" name="lokasi" placeholder="Lokasi" class="form-control"/>
                        </div><br/>
                        <div class="input-prepend">
                            <div class="col-lg-8">
                                <label><i class="fa fa-calendar"></i> Tanggal Mulai</label>
                                <div class="form-group input-group">                                
                                    <input type="text" class="form-control" id="tgl_mulai" name="tgl_mulai">
                                    <span class="input-group-addon"> 
                                        <script type="text/javascript">
                                            new tcal ({
                                                // form name
                                                'formname': 'frmTambahLelang',
                                                // input name
                                                'controlname': 'tgl_mulai'
                                            });
                                        </script>
                                    </span>
                                </div>
                            </div>
                        </div>
                        <br/>
                        <div class="input-prepend">
                            <div class="col-lg-8">
                                <label><i class="fa fa-calendar"></i> Tanggal Selesai</label>
                                <div class="form-group input-group">                                
                                    <input type="text" class="form-control" id="tgl_selesai" name="tgl_selesai">
                                    <span class="input-group-addon">
                                        <script type="text/javascript">
                                            new tcal ({
                                                // form name
                                                'formname': 'frmTambahLelang',
                                                // input name
                                                'controlname': 'tgl_selesai'
                                            });
                                        </script>
                                    </span>
                                </div>
                            </div>
                        </div>
                    </div>
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