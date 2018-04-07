<?php
class MenuNav extends DB\SQL\Mapper
{
    function __construct(DB\SQL $db) {
        parent::__construct($db,'tb_mnu_list');
    }
    
    function getAll(){
        $this->load(array('is_active=?','1'));
        return $this->query;
    }
}