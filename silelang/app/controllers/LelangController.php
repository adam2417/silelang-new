<?php
class LelangController extends Controller {
    function index() {
        /*$username = $this->f3->get('SESSION.username');
        $role = $this->f3->get('SESSION.role');        
        
        if($role == 1){
            
        } else{
            $daftarlelangview = new DaftarLelangView($this->db);            
            $userview = new UserView($this->db);
            
            $userview->getByUsername($username);
            $lelanglist = $daftarlelangview->getByKontraktorId($userview->id_kontraktor);
        }*/
        
        $lelangdb = new Lelang($this->db);
        $lelanglist = $lelangdb->all();
        $this->f3->set('lelangs',$lelanglist);
        
        $this->f3->set('message',$this->f3->get('PARAMS.message'));
        $this->f3->set('page_head','Lelang');        
        $this->f3->set('view','lelang/list.htm');
    }
    
    function create(){
        if($this->f3->exists('POST.create')){
            $lelangdb = new Lelang($this->db);
            $fdate = new Filters();
            $tglmulai = $this->f3->get('POST.tgl_mulai');
            $tglselesai = $this->f3->get('POST.tgl_selesai');
            $anggaran = $this->f3->get('POST.anggaran');
            
            list($d,$m,$y) = explode('/',$tglmulai);
            list($d1,$m1,$y1) = explode('/',$tglselesai);
            
            $tgmulai = mktime(null,null,0,$m,$d,$y);
            $tgselesai = mktime(null,null,0,$m1,$d1,$y1);
            
            $anggaran_nocommas = str_replace(',','',$anggaran);
            
            $this->f3->set('POST.tgl_mulai',$fdate->date($tgmulai));
            $this->f3->set('POST.tgl_selesai',$fdate->date($tgselesai));
            $this->f3->set('POST.anggaran',$anggaran_nocommas);
            $lelangdb->add();
            $this->f3->reroute('/lelang/Data created successfully');
        }else {
            $this->f3->set('page_head','Create New Lelang');        
            $this->f3->set('view','lelang/add.htm');
        }        
    }
    
    function update(){
        $lelangdb = new Lelang($this->db);
        if($this->f3->exists('POST.update')){
            $tglmulai = $this->f3->get('POST.tgl_mulai');
            $tglselesai = $this->f3->get('POST.tgl_selesai');
            $anggaran = $this->f3->get('POST.anggaran');
            
            $fdate = new Filters();
            
            list($d,$m,$y) = explode('/',$tglmulai);
            list($d1,$m1,$y1) = explode('/',$tglselesai);
            
            $tgmulai = mktime(null,null,0,$m,$d,$y);
            $tgselesai = mktime(null,null,0,$m1,$d1,$y1);
            
            $anggaran_nocommas = str_replace(',','',$anggaran);
            
            $this->f3->set('POST.tgl_mulai',$fdate->date($tgmulai));
            $this->f3->set('POST.tgl_selesai',$fdate->date($tgselesai));
            $this->f3->set('POST.anggaran',$anggaran_nocommas);
            
            $lelangdb->edit($this->f3->get('POST.id_lelang'));
            $this->f3->reroute('/lelang/Data updated successfully');
        }else {
            $lelangdb->getById($this->f3->get('PARAMS.lelangid'));
            $this->f3->set('lelangs',$lelangdb);
            $this->f3->set('page_head','Edit Data Lelang');        
            $this->f3->set('view','lelang/update.htm');
        }
    }
    
    function detail(){
        $lelangdb = new Lelang($this->db);
        
        $cid = $this->f3->get('PARAMS.lelangid');
            
        $lelangdb->getById($cid);
        $this->f3->set('lelangs',$lelangdb);
        $this->f3->set('page_head','Detail Lelang');        
        $this->f3->set('view','lelang/detail.htm');        
    }
    
    function delete(){
        if($this->f3->exists('PARAMS.lelangid'))
        {
            $lelangdb = new Lelang($this->db);            
            $lelang_id = $this->f3->get('PARAMS.lelangid');            
            $lelangdb->delete($lelang_id);
        }        
        $this->f3->reroute('/lelang/Successfully deleted for lelang id '.$this->f3->get('PARAMS.lelangid'));
    }
}