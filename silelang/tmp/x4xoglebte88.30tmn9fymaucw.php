<div class="col-lg-12">
    <div class="panel panel-default">
            <div class="panel-heading">
                Detail Kriteria
            </div>
            <div class="panel-body"> 
                <div class="panel-group" id="accordion">
                    <div class="panel panel-info">
                        <div class="panel-heading">
                            <h4 class="panel-title">
                                <a data-toggle="collapse" data-parent="#accordion" href="#detailone">Kriteria</a>
                            </h4>
                        </div>
                        <!-- /.panel-heading -->
                        <div id="detailone" class="panel-collapse collapse in">
                            <div class="panel-body">                                
                                <div class="input-prepend">
                                    <span class="add-on"><i class="fa fa-user-plus"></i> Id Kriteria</span>
                                    <input type="text" id="id_kriteria" name="id_kriteria" <?php if ($kriteria['id_kriteria'] != ''): ?>value="<?= ($kriteria['id_kriteria']) ?>"<?php else: ?>placeholder="No Id"<?php endif; ?> class="form-control" readonly="readonly"/>
                                </div><br/>                                
                                <div class="input-prepend">
                                    <span class="add-on"><i class="fa fa-bars"></i> Deskripsi</span>
                                    <textarea class="form-control" id="deskripsi" name="deskripsi" <?php if ($kriteria['deskripsi'] == ''): ?>placeholder="No Description"<?php endif; ?> rows="5" readonly="readonly"><?= ($kriteria['deskripsi']) ?></textarea>
                                </div><br/>
                            </div>
                        </div>
                    </div><br/>
                    <div class="panel panel-primary">
                        <div class="panel-heading">
                            <h4 class="panel-title">
                                <a data-toggle="collapse" data-parent="#accordion" href="#detailtwo">Sub Kriteria</a>
                            </h4>
                        </div>
                        <!-- /.panel-heading -->
                        <div id="detailtwo" class="panel-collapse collapse">
                            <div class="panel-body">            
                                <div class="navbar">
                                    <div class="navbar-inner">
                                        <a href="<?= ($BASE.'/kriteria/'.$kriteria['id_kriteria'].'/sub/create') ?>"><button type="button" class="btn btn-primary btn-xl"><i class="fa fa-plus-circle"></i> Create Sub-Kriteria</button></a>                    
                                    </div>
                                </div>
                                <?php if ($message): ?>
                                <div id="success-message" name="success-message" class="alert alert-success">
                                    <button type="button" class="close" data-dismiss="alert">&times;</button>
                                    <strong><?= ($message) ?></strong>
                                </div>
                                <?php endif; ?>            
                                <table width="100%" class="table table-striped table-bordered table-hover" id="dataTables-example">
                                        <thead>
                                            <tr>
                                                <th scope="col">Id Sub-Kriteria</th>                            
                                                <th scope="col">Deskripsi</th>
                                            </tr>
                                        </thead>
                                        <tbody>                                            
                                            <?php foreach (($subkriteria?:[]) as $skr): ?>
                                                <tr <?php if (($skr['id_sub'] % 2) == 0): ?>class="even"<?php else: ?>class="odd"<?php endif; ?>>
                                                    <td><?= (trim($skr['id_sub'])) ?></td>
                                                    <td><?= (trim($skr['deskripsi'])) ?></td>
                                                    <td><a href="<?= ($BASE.'/kriteria/'.$kriteria['id_kriteria'] .'/sub/update/'. $skr['id_sub']) ?>" class="btn btn-primary"><i class="fa fa-edit fa-fw"></i> Edit</a> <a href="<?= ($BASE.'/kriteria/'.$kriteria['id_kriteria'] .'/sub/delete/'. $skr['id_sub']) ?>" class="btn btn-danger"><i class="fa fa-trash fa-fw"></i> Delete</a>                                
                                                    </td>
                                                </tr>
                                            <?php endforeach; ?>
                                    </tbody>
                                </table>
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
