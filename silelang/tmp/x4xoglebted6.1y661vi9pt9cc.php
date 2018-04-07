<?php
require(BASE.'/vendor/dompdf/src/autoloader.php');
$paper_size  = 'A4'; //paper size
$orientation = 'landscape'; //tipe format kertas

$html = '<html>
    <head>
        <title>Hasil SPK</title>
    </head>
    <body>
        <h1>Laporan Hasil SPK</h1>
        <table>
            <thead>
                <tr>
                    <th scope="col">Id Lelang</th>
                    <th scope="col">Kontraktor</th>
                    <th scope="col">Hasil Akhir</th>
                </tr>
            </thead>
            <tbody>
            </tbody>
        </table>
    </body>
</html>';

$dompdf = new DomPdf();

$dompdf->set_paper($paper_size, $orientation);

//Convert to PDF
$dompdf->load_html($html);
$dompdf->render();
$dompdf->stream('hasilspk.pdf',array('Attachment'=>0));