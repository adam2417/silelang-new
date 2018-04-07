<?php
class PenilaianByKriteriaView extends DB\SQL\Mapper {
    function __construct(DB\SQL $db){
        parent::__construct($db,'vw_penilaian_by_kriteria');
    }
    
    function getAll(){
        $this->load();
        return $this->query();
    }
    
    function getByNoPendaftaran($nodaftar) {
        $this->load(array('nopendaftaran=?',$nodaftar));
        return $this->query;
    }
}