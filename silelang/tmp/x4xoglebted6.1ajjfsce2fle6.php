<div class="col-lg-12">
    <div class="panel panel-default">
            <div class="panel-heading">
                Create New User
            </div>
            <div class="panel-body"> 
                <div class="panel-group" id="accordion">
                    <div class="panel panel-info">
                        <div class="panel-heading">
                            <h4 class="panel-title">
                                <a data-toggle="collapse" data-parent="#accordion" href="#collapseOne">Kontraktor</a>
                            </h4>
                        </div>
                        <!-- /.panel-heading -->
                        <div id="collapseOne" class="panel-collapse collapse">
                            <div class="panel-body">
                                <div class="input-prepend">                                
                                    <span class="add-on"><i class="fa fa-retweet"></i> Id</span>
                                    <input type="text" id="id_kontraktor" name="id_kontraktor" <?php if ($kontraktors['id_kontraktor'] != ''): ?>value="<?= ($kontraktors['id_kontraktor']) ?>"<?php else: ?>placeholder="Enter a contractor id"<?php endif; ?> class="form-control" readonly="readonly"/>                                
                                </div><br/>
                                <div class="input-prepend">
                                    <span class="add-on"><i class="fa fa-user-plus"></i> Nama</span>
                                    <input type="text" id="name" name="name" <?php if ($kontraktors['nama'] != ''): ?>value="<?= ($kontraktors['nama']) ?>"<?php else: ?>placeholder="No Name"<?php endif; ?> class="form-control" readonly="readonly"/>
                                </div><br/>
                                <div class="input-prepend">
                                    <span class="add-on"><i class="fa fa-street-view"></i> Alamat</span>
                                    <textarea class="form-control" id="alamat" name="alamat" <?php if ($kontraktors['alamat'] == ''): ?>placeholder="No Address"<?php endif; ?> rows="3" readonly="readonly"><?= ($kontraktors['alamat']) ?></textarea>
                                </div><br/>
                                <div class="input-prepend">
                                    <span class="add-on"><i class="fa fa-phone-square"></i> No. Telp</span>
                                    <input type="text" id="notelp" name="notelp" <?php if ($kontraktors['notelp'] != ''): ?>value="<?= ($kontraktors['notelp']) ?>"<?php else: ?>placeholder="No Phone number"<?php endif; ?> class="form-control" readonly="readonly"/>
                                </div><br/>
                                <div class="input-prepend">
                                    <span class="add-on"><i class="fa fa-list-ol"></i> NPWP</span>
                                    <input type="text" id="npwp" name="npwp" <?php if ($kontraktors['npwp'] != ''): ?>value="<?= ($kontraktors['npwp']) ?>"<?php else: ?>placeholder="No Tax holder number"<?php endif; ?> class="form-control" readonly="readonly"/>
                                </div><br/>
                                <div class="input-prepend">
                                    <span class="add-on"><i class="fa fa-bars"></i> Deskripsi</span>
                                    <textarea class="form-control" id="deskripsi" name="deskripsi" <?php if ($kontraktors['deskripsi'] == ''): ?>placeholder="No Description"<?php endif; ?> rows="5" readonly="readonly"><?= ($kontraktors['deskripsi']) ?></textarea>
                                </div><br/>
                                <div class="input-prepend">
                                    <span class="add-on"><i class="fa fa-phone"></i> Contact Person</span>
                                    <input type="text" id="notelp" name="notelp" <?php if ($kontraktors['contactperson'] != ''): ?>value="<?= ($kontraktors['contactperson']) ?>"<?php else: ?>placeholder="No Contact person phone number"<?php endif; ?> class="form-control" readonly="readonly"/>
                                </div><br/>
                                <div class="input-prepend">
                                    <span class="add-on"><i class="fa fa-user-plus"></i> Nama Pemilik</span>
                                    <input type="text" id="namapemilik" name="namapemilik" <?php if ($kontraktors['namapemilik'] != ''): ?>value="<?= ($kontraktors['namapemilik']) ?>"<?php else: ?>placeholder="No Owner name"<?php endif; ?> class="form-control" readonly="readonly"/>
                                </div>
                            </div>
                        </div>
                    </div><br/>
<form action="<?= ($BASE.'/user/create') ?>" method="post" class="form-horizontal">
                    <div class="panel panel-primary">
                        <div class="panel-heading">
                            <h4 class="panel-title">
                                <a data-toggle="collapse" data-parent="#accordion" href="#collapseTwo">User</a>
                            </h4>
                        </div>
                        <!-- /.panel-heading -->
                        <div id="collapseTwo" class="panel-collapse collapse in">
                            <div class="panel-body">            
                                <div class="input-prepend">
                                    <span class="add-on"><i class="fa fa-user"></i> Username</span>
                                    <input type="text" id="username" name="username" value="<?= ($POST['username']) ?>" class="form-control" />
                                </div><br/>
                                <div class="input-prepend">
                                    <span class="add-on"><i class="fa fa-key"></i> Password</span>
                                    <input type="text" id="pass" name="pass" value="<?= ($POST['password']) ?>" class="form-control" />
                                </div><br/>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="panel-footer">
                <input type="hidden" name="id_kontraktor" value="<?= ($kontraktors['id_kontraktor']) ?>" />
                <input type="hidden" name="create" value="create" />
                <button type="submit" name="bSubmit" value="submit" class="btn btn-primary"><i class="fa fa-save"></i> Simpan</button>
                <button type="button" name="bClear" value="Clear" class="btn btn-danger"><i class="fa fa-repeat"></i> Clear</button>
            </div>
</form>
        </div>
</div>
