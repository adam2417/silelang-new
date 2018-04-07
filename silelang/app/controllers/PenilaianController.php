<?php
class PenilaianController extends Controller {
    function index() {
        $daftarlelangdb = new DaftarLelangView($this->db);
        $this->f3->set('pendaftaran',$daftarlelangdb->getAll());
        
        $penilaianviewdb = new PenilaianByKriteriaView($this->db);
        
        if($this->f3->exists('POST.pendlist')){            
            //implementation for param lelang            
            $nodaftar = $this->f3->get('POST.pendlist');
            $this->f3->set('nodaftar',$nodaftar);
            $daftarlist = $penilaianviewdb->getByNoPendaftaran($nodaftar);            
            $this->f3->set('daftarpenilaian',$daftarlist);
        }
        
        $this->f3->set('message',$this->f3->get('PARAMS.message'));
        $this->f3->set('page_head','Penilaian');        
        $this->f3->set('view','penilaian/list.htm');
    }
    
    function getSubKriteriaById(){
        header('Content-Type: application/json');
        $idkriteria = $this->f3->get('PARAMS.idkriteria');
        $subkriteriadb = new SubKriteria($this->db);
        $skriteria = $subkriteriadb->getByIdKriteria($idkriteria);
        //var_dump($skriteria->cast());exit;
        echo json_encode($skriteria);
    }
    
    function create() {
        $penilaiandb = new Penilaian($this->db);
        $nodaftar = "";
        $idkriteria = 0;
        
        if($this->f3->exists('PARAMS.nodaftar')) {
            $kriteriadb = new Kriteria($this->db);           
            
            $this->f3->set('kriterials',$kriteriadb->all());            
        } else if($this->f3->exists('POST.create')) {
            $penilaianviewdb = new PenilaianByKriteriaView($this->db);
            
            $nodaftar = $this->f3->get('POST.nodaftar');
            $lsdata = array();
            
            $nilails = $this->f3->get('POST.nilai');
            
            foreach($nilails as $key=>$val){                
                foreach($val as $sub=>$nilai){
                    //var_dump($nodaftar.'-'.$idkriteria);
                    $data = array(
                        'nopendaftaran' => $nodaftar,
                        'id_sub_kriteria' => $sub,
                        'id_kriteria' => $key,
                        'nilai' => $nilai
                    );
                    $penilaiandb->add($data);
                    unset($data);
                }          
            }
            
            $this->f3->set('nodaftar',$nodaftar);
            $daftarlist = $penilaianviewdb->getByNoPendaftaran($nodaftar);
            $this->f3->set('daftarpenilaian',$daftarlist);
            $this->f3->reroute('/penilaian/get-list/Successfully added new Penilaian');            
        }
        
        $this->f3->set('page_head','Daftar Baru');
        $this->f3->set('view','penilaian/add.htm');
    }
    
    function delete(){
        if($this->f3->exists('PARAMS.nodaftar') && $this->f3->exists('PARAMS.idkriteria'))
        {
            $penilaiandb = new Penilaian($this->db);            
            $nodaftar = $this->f3->get('PARAMS.nodaftar');
            $kriteria = $this->f3->get('PARAMS.idkriteria');
            $penilaiandb->delete($nodaftar,$kriteria);
        }        
        $this->f3->reroute('/penilaian/Successfully deleted for nomor pendaftaran '.$this->f3->get('PARAMS.nodaftar').' dengan kriteria '.$this->f3->get('PARAMS.idkriteria'));
    }
}
