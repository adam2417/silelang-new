<?php
class SubkriteriaController extends Controller {
    function create(){
        if($this->f3->exists('POST.create')){
            $subkriteria = new SubKriteria($this->db);
            $subkriteria->add();
            $this->f3->reroute('/kriteria/detail/'.$this->f3->get('POST.id_kriteria').'/Data sub-kriteria created successfully');
        }else {
            $this->f3->set('page_head','Create New Sub-Kriteria');        
            $this->f3->set('view','sub-kriteria/add.htm');
        }
    }
    
    function delete(){
        if($this->f3->exists('PARAMS.subid'))
        {
            $subkriteria = new SubKriteria($this->db);            
            $sub_id = $this->f3->get('PARAMS.subid');
            $kriteria = $this->f3->get('PARAMS.kriteriaid');
            $subkriteria->delete($sub_id,$kriteria);
        }        
        $this->f3->reroute('/kriteria/detail/'.$this->f3->get('PARAMS.kriteriaid').'/Successfully deleted for sub-kriteria id '.$this->f3->get('PARAMS.subid'));
    }
    
    function update() {
        $skriteria = new SubKriteria($this->db);
        if($this->f3->exists('POST.update')){
            $sid = $this->f3->get('POST.id_sub');
            $skriteria->edit($sid);
            $this->f3->reroute('/kriteria/detail/'.$this->f3->get('POST.id_kriteria').'/Data updated successfully');
        }else {
            $skriteria->getById($this->f3->get('PARAMS.sid'));
            $this->f3->set('skriteria',$skriteria);
            $this->f3->set('page_head','Edit Sub-Kriteria');        
            $this->f3->set('view','sub-kriteria/update.htm');
        }
    }
}