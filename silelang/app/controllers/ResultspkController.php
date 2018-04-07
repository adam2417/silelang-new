<?php
class ResultspkController extends Controller
{
    function index() {
        $hasilspkview = new HasilSPKView($this->db);
        $idlelang = $this->f3->get('PARAMS.lelangid');
        $hasil = $hasilspkview->getHasilByLelang($idlelang);
        
        $this->f3->set('lshasil',$hasil);
        $this->f3->set('message',$this->f3->get('PARAMS.message'));
        $this->f3->set('page_head','Hasil SPK');        
        $this->f3->set('view','result-spk/resultview.htm');
    }
    
    function respdf() {
        $this->f3->set('page_head','Hasil SPK');        
        $this->f3->set('view','result-spk/respdf.htm');
    }
}