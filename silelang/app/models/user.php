<?php
class User extends DB\SQL\Mapper {
 
    public function __construct(DB\SQL $db) {
        parent::__construct($db,'tb_user');
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
        $this->load(array('id=?',$id));
        $this->copyTo('POST');
    }
    
    function getByUsername($uname){
        $this->load(array('username=?',$uname));
        $this->copyTo('POST');
    }
 
    public function edit($id) {
        $this->load(array('id=?',$id));
        $this->copyFrom('POST');
        $this->update();
    }
 
    public function delete($id) {
        $this->load(array('id=?',$id));
        $this->erase();
    }
    
    function deleteByKontraktor($id_kontraktor){
        $this->load(array('id_kontraktor=?',$id_kontraktor));
        $this->erase();
    }
    
    function verify($username,$pass){
        $auth = new \Auth($this,array('id'=>'username','pw'=>'pass'));
        $res = $auth->login($username,$pass);
        
        return $res;
    }
}