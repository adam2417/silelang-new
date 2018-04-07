<?php
class KontraktorController extends Controller {
    function index(){
        $username = $this->f3->get('SESSION.username');
        $role = $this->f3->get('SESSION.role');
        
        $kontraktor = new Kontraktor($this->db);
        $userview = new UserView($this->db);
        
        if($role == 1){
            $userview->getView();
            $kontraktor_ls = $kontraktor->all();
            $this->f3->set('kontraktors',$kontraktor_ls);
        } else {
            $userview->getByUsername($username);
            $kontraktor->getById($userview->id_kontraktor);
            $this->f3->set('notkontraktors',$kontraktor);
        }        
        $this->f3->set('userview',$userview);
        
        $this->f3->set('message',$this->f3->get('PARAMS.message'));
        $this->f3->set('page_head','Kontraktor');        
        $this->f3->set('view','kontraktor/list.htm');
    }
    
    function create(){
        if($this->f3->exists('POST.create')){
            $kontraktor = new Kontraktor($this->db);
            $kontraktor->add();
            $this->f3->reroute('/kontraktor/Data created successfully');
        }else {
            $this->f3->set('page_head','Create New Kontraktor');        
            $this->f3->set('view','kontraktor/add.htm');
        }        
    }
    
    function update(){
        $kontraktor = new Kontraktor($this->db);
        if($this->f3->exists('POST.update')){            
            $kontraktor->edit($this->f3->get('POST.id_kontraktor'));
            $this->f3->reroute('/kontraktor/Data updated successfully');
        }else {
            $kontraktor->getById($this->f3->get('PARAMS.cid'));
            $this->f3->set('kontraktors',$kontraktor);
            $this->f3->set('page_head','Edit Kontraktor');        
            $this->f3->set('view','kontraktor/update.htm');
        }
    }
    
    function detail(){
        $kontraktor = new Kontraktor($this->db);
        
        $cid = $this->f3->get('PARAMS.cid');
        
        $kontraktor->getById($cid);
        $this->f3->set('kontraktor',$kontraktor);
        $this->f3->set('page_head','Detail Kontraktor');        
        $this->f3->set('view','kontraktor/detail.htm');        
    }
    
    function delete(){
        if($this->f3->exists('PARAMS.cid'))
        {
            $kontraktor = new Kontraktor($this->db);
            $user = new User($this->db);
            
            $kontraktor_id = $this->f3->get('PARAMS.cid');
            
            $kontraktor->delete($kontraktor_id);
            $user->deleteByKontraktor($kontraktor_id);
        }        
        $this->f3->reroute('/kontraktor/Successfully deleted for contractor id '.$this->f3->get('PARAMS.cid'));
    }
}