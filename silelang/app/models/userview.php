<?php
class UserView extends DB\SQL\Mapper {    
    function __construct(DB\SQL $db) {
        parent::__construct($db,'vw_user');
    }
    
    function getView(){
        $this->load();
        return $this->query;
    }
    
    function getById($id) {
        $this->load(array('id=?',$id));
        $this->copyTo('POST');
    }
    
    function getByUsername($uname){
        $this->load(array('username=?',$uname));
        $this->copyTo('POST');
    }
}