<?php
class SubKriteria extends DB\SQL\Mapper {
    function __construct(DB\SQL $db) {
        parent::__construct($db,'tb_sub_kriteria');
    }
    
    function all() {
        $this->load();
        return $this->query;
    }
 
    function add() {
        $this->copyFrom('POST');
        $this->save();
    }
 
    function getById($id) {
        $this->load(array('id_sub=?',$id));        
        $this->copyTo('POST');        
    }
    
    function getByIdKriteria($idkriteria) {
        $this->load(array('id_kriteria=?',$idkriteria));        
        return $this->query;      
    }
 
    function edit($id) {
        $this->load(array('id_sub=?',$id));
        $this->copyFrom('POST');
        $this->update();
    }
 
    function delete($id,$idkriteria) {
        $this->erase(array('id_sub=? and id_kriteria=?',$id,$idkriteria));
    }
    
    function deleteByKriteria($kriteriaid){
        $this->erase(array('id_kriteria=?',$kriteriaid));
    }
}