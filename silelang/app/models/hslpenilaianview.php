<?php
class HslPenilaianView extends DB\SQL\Mapper {
    function __construct(DB\SQL $db) {
        parent::__construct($db,'vw_hsl_penilaian');
    }
    
    function getAll() {
        $this->load();
        return $this->query;
    }
    
    function getHasilByLelang($lelangid){
        $this->load(array('id_lelang=?',$lelangid),array('order'=>'nama_kontraktor,kriteria'));
        return $this->query;
    }
}