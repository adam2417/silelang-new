<?php
class Penilaian extends DB\SQL\Mapper {
    public function __construct(DB\SQL $db) {
        parent::__construct($db,'tb_penilaian');
    }
    
    function all() {
        $this->load();
        return $this->query;
    }
    
    function add($lsdata = array()) {
        //var_dump($lsdata);
        $column_array = "";
        $row = "";
        $i = 0;
        foreach($lsdata as $col=>$val){
            $column .= $col;
            if(!empty($col) && ($i < count($lsdata)-1)){
                $column .= ',';
            }
            $row .= "'".$val."'";
            if(!empty($row) && ($i < count($lsdata)-1)){
                $row .= ',';
            }            
            $i++;
        }
        //var_dump('INSERT INTO tb_penilaian('.$column.') VALUES ('.$row.')');
        $this->db->exec('INSERT INTO tb_penilaian('.$column.') VALUES ('.$row.')');        
    }
    
    function delete($nodaftar,$idkriteria) {
        //$this->load();        
        $this->erase(array('nopendaftaran=? and id_kriteria=?',$nodaftar,$idkriteria));
    }
}