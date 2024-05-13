<?php

namespace App\Http\Controllers;

use App\Models\User;
use Barryvdh\DomPDF\Facade\Pdf as FacadePdf;
use Barryvdh\DomPDF\PDF as DomPDFPDF;
use PDF;
use Illuminate\Http\Request;
use PhpOffice\PhpSpreadsheet\Writer\Pdf as WriterPdf;

class PdfGeneratorController extends Controller
{
    //
    public function pdfMake(){
        

        $users=User::all();

        $data=[
            'title'=>'welcome to coding',
            'date'=>date(format:'m/d/y'),
            'users'=>$users
        ];
        $pdf=PDF::loadView('layouts.app',$data);
        return $pdf->download(filename:'coding.pdf');
    }
}
