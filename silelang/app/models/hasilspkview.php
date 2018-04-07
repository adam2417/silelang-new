<?php
class HasilSPKView extends DB\SQL\Mapper
{
    function __construct(DB\SQL $db) {
        parent::__construct($db, 'vw_hasil_akhir_spk');
    }
    
    function getAll() {
        $this->load();
        return $this->query;
    }
    
    function getHasilByLelang($lelangid){
        $this->load(array('id_lelang=?',$lelangid));
        return $this->query;
    }
}