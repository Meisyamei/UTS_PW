<?php 

namespace App\Http\Controllers;
use App\Models\Data;
use App\Models\Dosen;
use App\Models\Mhs;
use Illuminate\Cache\MemcachedStore;
use Illuminate\Http\Request;

class Frontend extends Controller 
{
    //
    public function home(){
        $modeldosen = New Data;
        $datadosen = $modeldosen -> get();
        
        $modeldosen = New Dosen;
        $datadosen= $modeldosen -> get();

        $modelmhs = New Mhs;
        $datamhs= $modelmhs -> get();
        
        return view('frontend.index', compact('datadata','datadosen','datamhs'));
    }
   
}