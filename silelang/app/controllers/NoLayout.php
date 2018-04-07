<?php
use Dompdf\Dompdf;
class NoLayout extends Controller {
    function beforeroute() {
        // No Action
    }
    
    function afterroute() {
        // No Action
    }
    
    function getsubkriteriabyid(){
        header('Content-Type: application/json');
        $idkriteria = $this->f3->get('PARAMS.idkriteria');
        $subkriteriadb = new SubKriteria($this->db);
        $skriteria = $subkriteriadb->getByIdKriteria($idkriteria);
        
        $datajson = array();
        foreach($skriteria as $sub){
            $datajson[$sub->id_sub] = array(
                                        'id_sub' => $sub->id_sub,
                                        'deskripsi' => $sub->deskripsi
                                      );
        }
        echo json_encode($datajson);
    }
    
    function printpdf(){
        $hasilspkview = new HasilSPKView($this->db);
        $lelang = new Lelang($this->db);
        
        $id_lelang = $this->f3->get('PARAMS.lelangid');
        
        $namalelang = $lelang->getNamaLelang($id_lelang);
        $lshasil = $hasilspkview->getHasilByLelang($id_lelang);
        
        $paper_size  = 'A4';
        $orientation = 'portrait';

        $html = '<html>
                    <head>
                        <title>Hasil SPK</title>
                        <style>
                            table {
                                font-family:Arial, Helvetica, sans-serif;
                                font-size:12px;
                                border:1px solid;
                            }
                            table th {
                                background: #66b3ff;
                                color:#fff;
                                padding: 12px;
                                text-align: center;
                            }
                            nama_lelang {
                                font-size:7px;
                            }
                            h1 {
                                text-decoration :underline;
                            }
                        </style>
                    </head>
                    <body>
                        <h1>Laporan Hasil Penilaian</h1>
                        <h4>Nama Lelang: '.$namalelang[0]->nama.'</h4>
                        <table>
                            <thead>
                                <tr>                   
                                    <th>Kontraktor</th>
                                    <th>Hasil Akhir</th>
                                </tr>
                            </thead>
                            <tbody>';
        foreach($lshasil as $hsl){
                        $html .= '  <tr>
                                        <td>'.$hsl->kontraktor.'</td>
                                        <td>'.$hsl->hasilakhir.'</td>
                                    </tr>';
        }
        $html .= '  </tbody>
                </table>
            </body>
        </html>';

        $dompdf = new Dompdf();
        $dompdf->set_paper($paper_size, $orientation);

        $dompdf->load_html($html);
        $dompdf->render();
        $dompdf->stream('hasilspk.pdf',array('Attachment'=>0));
    }
    
    function printrekapnilaipdf(){
        $hasilspkview = new HslPenilaianView($this->db);
        $lelang = new Lelang($this->db);
        
        $id_lelang = $this->f3->get('PARAMS.lelangid');
        
        $namalelang = $lelang->getNamaLelang($id_lelang);
        $lshasil = $hasilspkview->getHasilByLelang($id_lelang);
        
        $paper_size  = 'A4';
        $orientation = 'portrait';

        $html = '<html>
                    <head>
                        <title>Hasil Rekap Nilai</title>
                        <style>
                            table {
                                font-family:Arial, Helvetica, sans-serif;
                                font-size:12px;
                                border:1px solid;
                            }
                            table th {
                                background: #66b3ff;
                                color:#fff;
                                padding: 12px;
                                text-align: center;
                            }
                            td {
                                padding: 8px;
                            }
                            nama_lelang {
                                font-size:7px;
                            }
                            h1 {
                                text-decoration :underline;
                            }
                        </style>
                    </head>
                    <body>
                        <h1>Laporan Rekap Penilaian</h1>
                        <h4>Nama Lelang: '.$namalelang[0]->nama.'</h4>
                        <table>
                            <thead>
                                <tr>                   
                                    <th>Kontraktor</th>
                                    <th>Kriteria</th>
                                    <th>Sub-Kriteria</th>
                                    <th>Nilai</th>
                                </tr>
                            </thead>
                            <tbody>';
        $i = 0;
        while($i < count($lshasil)){        
                    $html .= '<tr>';                                    
                
                    if(strcmp($lshasil[$i]['nama_kontraktor'],$lshasil[$i-1]['nama_kontraktor']) == 0) {
                        $html .= '<td>&nbsp;</td>';
                    } else {                        
                        $html .= '<td>'.$lshasil[$i]['nama_kontraktor'].'</td>';
                    }

                    if(strcmp($lshasil[$i]['kriteria'],$lshasil[$i-1]['kriteria']) == 0){
                        $html .= '<td>&nbsp;</td>';
                    } else {                        
                        $html .= '<td>'.$lshasil[$i]['kriteria'].'</td>';
                    }
                
                    $html .= '<td>'.$lshasil[$i]['sub_kriteria'].'</td>
                              <td>'.$lshasil[$i]['nilai'].'</td>';
                    $html .= '</tr>';
            $i++;
        }
        $html .= '  </tbody>
                </table>
            </body>
        </html>';
        
        $dompdf = new Dompdf();
        $dompdf->set_paper($paper_size, $orientation);

        $dompdf->load_html($html);
        $dompdf->render();
        $dompdf->stream('hasilrekapnilai.pdf',array('Attachment'=>0));
    }
}