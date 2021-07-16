<?php

namespace App\Http\Controllers;

use App\Models\bookshow;
use App\Models\Movie;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class bookshowcontroller extends Controller
{
    public function bookshow()
    {
        return view('bookshow');
    }

    
    
    public function bookslot(Request $request) {
        
       
        $$slot = $request->session()->get('id');
       
        
        return $slot; 
        
       
    }

}


    


