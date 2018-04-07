<div class="col-lg-12">
    <div class="panel panel-default">
            <div class="panel-heading">
                Detail Contractor
            </div>
            <div class="panel-body">                
                    <div class="panel panel-primary">
                        <div class="panel-heading">
                            Kontraktor
                        </div>
                        <!-- /.panel-heading -->
                        <div class="panel-body">
                            <div class="input-prepend">
                                <span class="add-on"><i class="fa fa-retweet"></i> Id</span>
                                <input type="text" id="id_kontraktor" name="id_kontraktor" <?php if ($kontraktor['id_kontraktor'] != ''): ?>value="<?= ($kontraktor['id_kontraktor']) ?>"<?php else: ?>placeholder="Enter a contractor id"<?php endif; ?> class="form-control" readonly="readonly" />
                            </div><br/>
                            <div class="input-prepend">
                                <span class="add-on"><i class="fa fa-user-plus"></i> Nama</span>
                                <input type="text" id="nama" name="nama" <?php if ($kontraktor['nama'] != ''): ?>value="<?= ($kontraktor['nama']) ?>"<?php else: ?>placeholder="Enter a name"<?php endif; ?> class="form-control" readonly="readonly" />
                            </div><br/>
                            <div class="input-prepend">
                                <span class="add-on"><i class="fa fa-street-view"></i> Alamat</span>
                                <textarea class="form-control" id="alamat" name="alamat" <?php if ($kontraktor['alamat'] == ''): ?>placeholder="Enter an address"<?php endif; ?> rows="3" readonly="readonly"><?= ($kontraktor['alamat']) ?></textarea>
                            </div><br/>
                            <div class="input-prepend">
                                <span class="add-on"><i class="fa fa-phone-square"></i> No. Telp</span>
                                <input type="text" id="notelp" name="notelp" <?php if ($kontraktor['notelp'] != ''): ?>value="<?= ($kontraktor['notelp']) ?>"<?php else: ?>placeholder="Enter a phone number"<?php endif; ?> class="form-control" readonly="readonly" />
                            </div><br/>
                            <div class="input-prepend">
                                <span class="add-on"><i class="fa fa-list-ol"></i> NPWP</span>
                                <input type="text" id="npwp" name="npwp" <?php if ($kontraktor['npwp'] != ''): ?>value="<?= ($kontraktor['npwp']) ?>"<?php else: ?>placeholder="Enter a tax holder number"<?php endif; ?> class="form-control" readonly="readonly" />
                            </div><br/>
                            <div class="input-prepend">
                                <span class="add-on"><i class="fa fa-bars"></i> Deskripsi</span>
                                <textarea class="form-control" id="deksripsi" name="deskripsi" <?php if ($kontraktor['deskripsi'] == ''): ?>placeholder="Enter a description"<?php endif; ?> rows="5"  readonly="readonly"><?= ($kontraktor['deskripsi']) ?></textarea>
                            </div><br/>
                            <div class="input-prepend">
                                <span class="add-on"><i class="fa fa-phone"></i> Contact Person</span>
                                <input type="text" id="contactperson" name="contactperson" <?php if ($kontraktor['contactperson'] != ''): ?>value="<?= ($kontraktor['contactperson']) ?>"<?php else: ?>placeholder="Enter a contact person phone number"<?php endif; ?> class="form-control" readonly="readonly" />
                            </div><br/>
                            <div class="input-prepend">
                                <span class="add-on"><i class="fa fa-user-plus"></i> Nama Pemilik</span>
                                <input type="text" id="namapemilik" name="namapemilik" <?php if ($kontraktor['namapemilik'] != ''): ?>value="<?= ($kontraktor['namapemilik']) ?>"<?php else: ?>placeholder="Enter an owner name"<?php endif; ?> class="form-control" readonly="readonly"/>
                            </div>
                        </div>
                    </div>                    
            </div>
            <div class="panel-footer">
                <button type="button" name="bBack" value="Back" class="btn btn-success"><i class="fa fa-undo"></i> Back</button>
            </div>            
        </div>
</div>