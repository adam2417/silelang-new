<form action="<?= ($BASE.'/kriteria/create') ?>" method="post" class="form-horizontal">
<div class="col-lg-12">
    <div class="panel panel-default">
            <div class="panel-heading">
                Create New Kriteria
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
                                    <input type="text" id="id_kriteria" name="id_kriteria" placeholder="Id Kriteria"class="form-control"/>
                                </div><br/>                                
                                <div class="input-prepend">
                                    <span class="add-on"><i class="fa fa-bars"></i> Deskripsi</span>
                                    <textarea class="form-control" id="deskripsi" name="deskripsi" placeholder="Description" rows="5"></textarea>
                                </div><br/>
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