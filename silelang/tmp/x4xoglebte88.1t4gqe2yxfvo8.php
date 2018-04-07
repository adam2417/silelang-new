<div class="col-lg-12">
    <div class="panel panel-default">
            <div class="panel-heading">
                Detail User
            </div>
            <div class="panel-body"> 
                <div class="panel-group" id="accordion">
                    <div class="panel panel-info">
                        <div class="panel-heading">
                            <h4 class="panel-title">
                                <a data-toggle="collapse" data-parent="#accordion" href="#detailone">Kontraktor</a>
                            </h4>
                        </div>
                        <!-- /.panel-heading -->
                        <div id="detailone" class="panel-collapse collapse">
                            <div class="panel-body">                                
                                <div class="input-prepend">
                                    <span class="add-on"><i class="fa fa-user-plus"></i> Nama</span>
                                    <input type="text" id="name" name="name" <?php if ($user['nama'] != ''): ?>value="<?= ($user['nama']) ?>"<?php else: ?>placeholder="No Name"<?php endif; ?> class="form-control" readonly="readonly"/>
                                </div><br/>
                                <div class="input-prepend">
                                    <span class="add-on"><i class="fa fa-street-view"></i> Alamat</span>
                                    <textarea class="form-control" id="alamat" name="alamat" <?php if ($user['alamat'] == ''): ?>placeholder="No Address"<?php endif; ?> rows="3" readonly="readonly"><?= ($user['alamat']) ?></textarea>
                                </div><br/>
                                <div class="input-prepend">
                                    <span class="add-on"><i class="fa fa-phone-square"></i> No. Telp</span>
                                    <input type="text" id="notelp" name="notelp" <?php if ($user['notelp'] != ''): ?>value="<?= ($user['notelp']) ?>"<?php else: ?>placeholder="No Phone number"<?php endif; ?> class="form-control" readonly="readonly"/>
                                </div><br/>
                                <div class="input-prepend">
                                    <span class="add-on"><i class="fa fa-list-ol"></i> NPWP</span>
                                    <input type="text" id="npwp" name="npwp" <?php if ($user['npwp'] != ''): ?>value="<?= ($user['npwp']) ?>"<?php else: ?>placeholder="No Tax holder number"<?php endif; ?> class="form-control" readonly="readonly"/>
                                </div><br/>
                                <div class="input-prepend">
                                    <span class="add-on"><i class="fa fa-bars"></i> Deskripsi</span>
                                    <textarea class="form-control" id="deskripsi" name="deskripsi" <?php if ($user['deskripsi'] == ''): ?>placeholder="No Description"<?php endif; ?> rows="5" readonly="readonly"><?= ($user['deskripsi']) ?></textarea>
                                </div><br/>
                                <div class="input-prepend">
                                    <span class="add-on"><i class="fa fa-phone"></i> Contact Person</span>
                                    <input type="text" id="notelp" name="notelp" <?php if ($user['contactperson'] != ''): ?>value="<?= ($user['contactperson']) ?>"<?php else: ?>placeholder="No Contact person phone number"<?php endif; ?> class="form-control" readonly="readonly"/>
                                </div><br/>
                                <div class="input-prepend">
                                    <span class="add-on"><i class="fa fa-user-plus"></i> Nama Pemilik</span>
                                    <input type="text" id="namapemilik" name="namapemilik" <?php if ($user['namapemilik'] != ''): ?>value="<?= ($user['namapemilik']) ?>"<?php else: ?>placeholder="No Owner name"<?php endif; ?> class="form-control" readonly="readonly"/>
                                </div>
                            </div>
                        </div>
                    </div><br/>
                    <div class="panel panel-primary">
                        <div class="panel-heading">
                            <h4 class="panel-title">
                                <a data-toggle="collapse" data-parent="#accordion" href="#detailtwo">User</a>
                            </h4>
                        </div>
                        <!-- /.panel-heading -->
                        <div id="detailtwo" class="panel-collapse collapse in">
                            <div class="panel-body">            
                                <div class="input-prepend">
                                    <span class="add-on"><i class="fa fa-user"></i> Username</span>
                                    <input type="text" id="username" name="username" value="<?= ($user['username']) ?>" class="form-control" readonly="readonly"/>
                                </div><br/>
                                <div class="input-prepend">
                                    <span class="add-on"><i class="fa fa-key"></i> Password</span>
                                    <input type="text" id="pass" name="pass" value="<?= ($user['pass']) ?>" class="form-control" readonly="readonly"/>
                                </div><br/>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="panel-footer">                
                <button type="button" name="bBack" value="Back" class="btn btn-success"><i class="fa fa-undo"></i> Back</button>
            </div>
        </div>
</div>
