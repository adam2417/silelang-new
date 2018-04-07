<?php
class MenuMatriksView extends DB\SQL\Mapper
{
    function __construct(DB\SQL $db){
        parent::__construct($db,'vw_mnu_matriks');
    }
    
    function getMenuByRole($roleid){
        $this->load(array('role_id=?',$roleid));
        return $this->query;
    }
}