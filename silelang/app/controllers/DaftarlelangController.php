<?php
class DaftarlelangController extends Controller {
    function index() {
        $daftarlelangdb = new DaftarLelang($this->db);        
        $daftarlelangviewdb = new DaftarLelangView($this->db);
        
        $lelangdb = new Lelang($this->db);
        $this->f3->set('lelanglist',$lelangdb->getAllLelang());
        
        if($this->f3->exists('POST.slelanglist')){            
            //implementation for param lelang            
            $lelangid = $this->f3->get('POST.slelanglist');
            $this->f3->set('idlelang',$lelangid);
            $this->f3->set('daftarlelangs',$daftarlelangviewdb->getByNoPendaftaran($lelangid));
        } else {            
            $this->f3->set('daftarlelangs',$daftarlelangviewdb->getAll());
        }
        
        $this->f3->set('message',$this->f3->get('PARAMS.message'));
        $this->f3->set('page_head','Daftar Lelang');        
        $this->f3->set('view','daftar-lelang/list.htm');
    }
    
    function create() {
        $kontraktordb = new Kontraktor($this->db);
        $web = Web::instance();
        
        if($this->f3->exists('POST.create')){
            // implementation when the value posted
            $daftarlelangdb = new DaftarLelang($this->db);
            
            $web = Web::instance();
            
            $overwrite = false; // set to true, to overwrite an existing file; Default: false
            $files = $web->receive(function($file, $formFieldName) {
                    if ($file['type'] != 'application/pdf') return false;
                    // maybe you want to check the file size
                    if($file['size'] > (F3::instance()->get("max_file_size") * 1024 * 1024)) // if bigger than max_file_size MB
                        return false; // this file is not valid, return false will skip moving it
                
                    $this->f3->set('POST.proposal',$file['name']);
                
                    return true; // allows the file to be moved from php tmp dir to your defined upload dir
                },
                $overwrite,
                function($fileBaseName,$formFieldName){
                    $idlelang = $this->f3->get('POST.id_lelang');
                    $nodaftar = $this->f3->get('POST.nopendaftaran');
                    $kontraktor = $this->f3->get('POST.id_kontraktor');
                    
                    $fileBaseName = 'proposals/'.'proposal_'.$idlelang.$nodaftar.$kontraktor.'_'.base_convert(time(), 10, 16).'.pdf';
                    return $fileBaseName;
                }
            );            
            
            $daftarlelangdb->add();
            $this->f3->reroute('/daftar-lelang');
        } else if(!($this->f3->exists('PARAMS.lelangid'))){
            $lelangdb = new Lelang($this->db);      
            
            $this->f3->set('lelanglist',$lelangdb->getAllLelang());
        }
        
        $username = $this->f3->get('SESSION.username');
        $role = $this->f3->get('SESSION.role');
        
        if($role <> 1){
            $userview = new UserView($this->db);
            $userview->getByUsername($username);
            $this->f3->set('kontraktor_id',$userview->id_kontraktor);
        }
        $this->f3->set('kontraktorlist',$kontraktordb->all());
        $this->f3->set('page_head','Daftar Baru');
        $this->f3->set('view','daftar-lelang/add.htm');
    }
}