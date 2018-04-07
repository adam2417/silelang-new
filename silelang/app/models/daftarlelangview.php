<?php
class DaftarLelangView extends DB\SQL\Mapper {
    function __construct(DB\SQL $db) {
        parent::__construct($db,'vw_daftar_lelang');
    }
    
    function getAll() {
        $this->load();
        return $this->query;
    }
    
    function getByNoPendaftaran($id) {        
        $this->load(array('id_lelang=?',$id));
        return $this->query;
    }
    
    function getByKontraktorId($id) {
        $this->load(array('id_kontraktor=?',$id));
        return $this->query;
    }
}