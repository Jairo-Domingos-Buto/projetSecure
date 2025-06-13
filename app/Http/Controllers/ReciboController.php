<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Fatura;
use Barryvdh\DomPDF\Facade\Pdf;


class ReciboController extends Controller
{
    public function gerarReciboPDF($id)
    {
        $fatura = Fatura::with('cliente')->findOrFail($id);
    
        $pdf = PDF::loadView('fatura-detalhe', ['fatura' => $fatura]);

        return $pdf->stream("fatura_{$fatura->id}.pdf");
    }
}
