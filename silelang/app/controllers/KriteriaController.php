<?php
class KriteriaController extends Controller {
    function index() {
        $kriteria = new Kriteria($this->db);
        $this->f3->set('kriteria',$kriteria->all());
        
        $this->f3->set('page_head','Kriteria');
        $this->f3->set('message',$this->f3->get('PARAMS.message'));
        $this->f3->set('view','kriteria/list.htm');
    }
    
    function detail(){
        if($this->f3->exists('PARAMS.id')){
            $kriteria = new Kriteria($this->db);
            $kriteria->getById($this->f3->get('PARAMS.id'));
            $this->f3->set('kriteria',$kriteria);
            
            $skr = new SubKriteria($this->db);
            $skriteria = $skr->getByIdKriteria($this->f3->get('PARAMS.id'));
            $this->f3->set('subkriteria',$skriteria);
            $this->f3->set('message',$this->f3->get('PARAMS.message'));
            $this->f3->set('view','kriteria/detail.htm');
        }        
    }
    
    function delete(){
        if($this->f3->exists('PARAMS.kriteriaid'))
        {
            $kriteria = new Kriteria($this->db);
            $subkriteria = new SubKriteria($this->db);
            
            $kriteria_id = $this->f3->get('PARAMS.kriteriaid');
            
            $kriteria->delete($kriteria_id);
            $subkriteria->deleteByKriteria($kriteria_id);
        }        
        $this->f3->reroute('/kriteria/Successfully deleted for kriteria id '.$this->f3->get('PARAMS.kriteriaid'));
    }
    
    function update(){
        $kriteria = new Kriteria($this->db);
        if($this->f3->exists('POST.update')){            
            $kriteria->edit($this->f3->get('POST.id_kriteria'));
            $this->f3->reroute('/kriteria/Data updated successfully');
        }else {
            $kriteria->getById($this->f3->get('PARAMS.kriteriaid'));
            $this->f3->set('kriteria',$kriteria);
            $this->f3->set('page_head','Edit Kriteria');        
            $this->f3->set('view','kriteria/update.htm');
        }
    }
    
    function create(){
        if($this->f3->exists('POST.create')){
            $kriteria = new Kriteria($this->db);
            $kriteria->add();
            $this->f3->reroute('/kriteria/Data created successfully');
        }else {
            $this->f3->set('page_head','Create New Kriteria');        
            $this->f3->set('view','kriteria/add.htm');
        }
    }
}