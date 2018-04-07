<div class="col-lg-12">
    <div class="panel panel-default">
        <div class="panel-heading">
            Penilaian
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
                                <span class="add-on"><i class="fa fa-list"></i> Pilih Kriteria: </span>
                                <?php if ($kriterials): ?>
                                    <select name="id_kriteria" id="id_kriteria">
                                        <?php foreach (($kriterials?:[]) as $kriteria): ?>
                                        <option value="<?= ($kriteria['id_kriteria']) ?>"><?= ($kriteria['deskripsi']) ?></option>
                                        <?php endforeach; ?>
                                    </select>
                                <?php endif; ?>
                            </div>
                        </div>
                    </div>
                </div><br/>
                <form action="<?= ($BASE.'/penilaian/create') ?>" method="post" class="form-horizontal">
                    <div class="panel panel-primary">
                        <div class="panel-heading">
                            <h4 class="panel-title">
                                <a data-toggle="collapse" data-parent="#accordion" href="#detailtwo">Sub Kriteria</a>
                            </h4>
                        </div>
                        <!-- /.panel-heading -->
                        <div id="detailtwo" class="panel-collapse collapse in">
                            <div class="panel-body">
                                <table width="100%" class="table table-striped table-bordered table-hover" id="tbskriteria">
                                    <thead>
                                        <tr>
                                            <th scope="col">Id Sub-Kriteria</th>
                                            <th scope="col">Deskripsi</th>
                                            <th scope="col">Nilai</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>
            </div>
            <div class="panel-footer">
                <input type="hidden" name="create" value="create" />
                <input type="hidden" name="nodaftar" value="<?= ($PARAMS['nodaftar']) ?>" />
                <button type="submit" name="bSubmit" value="submit" class="btn btn-primary"><i class="fa fa-save"></i> Simpan</button>
                <button type="button" name="bClear" value="Clear" class="btn btn-danger"><i class="fa fa-repeat"></i> Clear</button>
            </div>
            </form>
        </div>
    </div>
</div>