<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\NoticeModel;
use Illuminate\Support\Facades\DB;

class AdminController extends Controller
{
    public function index(){
        return view('admin.index');
    }
    
    public function Notice(){
        return view('admin.addnotice');
    }
    public function createNotice(Request $req){
        $notice= new notice;
        $notice->notice= $req->notice;
       echo( $notice->save());
        //return view('admin.addnotice');
    }
    
    
}
