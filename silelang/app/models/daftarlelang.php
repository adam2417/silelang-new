<?php
class DaftarLelang extends DB\SQL\Mapper {
    function __construct(DB\SQL $db) {
         parent::__construct($db,'tb_daftar_lelang');
    }
    
    function all() {
        $this->load();
        return $this->query;
    }
    
    function getAllNoPendaftaran(){
        return $this->select('DISTINCT nopendaftaran',null,array('order'=>'nopendaftaran,id_kontraktor'));        
    }
    
    function getAllLelangById($lelangId){
        $this->load(array('id_lelang=?',$lelangId));
        return $this->query;
    }
    
    function add() {
        $this->copyFrom('POST');
        $this->save();
    }
}