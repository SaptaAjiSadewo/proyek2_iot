<?php
  
namespace App\Http\Controllers;
   
use Illuminate\Http\Request;
use App\Models\User;
use Barryvdh\DomPDF\Facade\Pdf;
    
class PDFController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function generatePDF(Request $request)
    {
        $users = User::get();
        $data = [
            'title' => 'Selamat datang di Kasir Yu Yanti',
            'date' => date('m/d/y'),
            'users' => $users
        ];
        
        $pdf = PDF::loadView('myPDF', $data);
       
        return $pdf->stream('YuYanti.pdf');
}
}
