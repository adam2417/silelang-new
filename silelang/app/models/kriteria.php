<?php
class Kriteria extends DB\SQL\Mapper {
    public function __construct(DB\SQL $db) {
        parent::__construct($db,'tb_kriteria');
    }
    
    public function all() {
        $this->load();
        return $this->query;
    }
 
    public function add() {
        $this->copyFrom('POST');
        $this->save();
    }
 
    public function getById($id) {
        $this->load(array('id_kriteria=?',$id));        
        $this->copyTo('POST');        
    }
 
    public function edit($id) {
        $this->load(array('id_kriteria=?',$id));
        $this->copyFrom('POST');
        $this->update();
    }
 
    public function delete($id) {        
        $this->erase(array('id_kriteria=?',$id));
    }
}