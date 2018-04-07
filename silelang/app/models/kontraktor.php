<?php
class Kontraktor extends DB\SQL\Mapper {
    public function __construct(DB\SQL $db) {
        parent::__construct($db,'tb_kontraktor');
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
        $this->load(array('id_kontraktor=?',$id));        
        $this->copyTo('POST');        
    }
 
    public function edit($id) {
        $this->load(array('id_kontraktor=?',$id));
        $this->copyFrom('POST');
        $this->update();
    }
 
    public function delete($id) {
        $this->load(array('id_kontraktor=?',$id));
        $this->erase();
    }
}