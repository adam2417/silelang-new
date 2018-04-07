<?php
class Lelang extends DB\SQL\Mapper {
    function __construct(DB\SQL $db) {
        parent::__construct($db,'tb_lelang');
    }
    
    function all() {
        $this->load(null,array('order'=>'id_lelang'));
        return $this->query;
    }
    
    public function add() {
        $this->copyFrom('POST');
        $this->save();
    }
 
    public function getById($id) {
        $this->load(array('id_lelang=?',$id));        
        $this->copyTo('POST');        
    }
 
    public function edit($id) {
        $this->load(array('id_lelang=?',$id));
        $this->copyFrom('POST');
        $this->update();
    }
 
    public function delete($id) {
        $this->erase(array('id_lelang=?',$id));
    }
    
    function getAllLelang(){
        return $this->select('DISTINCT id_lelang,nama',null,array('order'=>'id_lelang'));        
    }
    
    function getNamaLelang($id){
        return $this->select('id_lelang,nama',array('id_lelang=?',$id),null); 
    }
}