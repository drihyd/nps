<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class Graphs extends Controller
{
    public function graphs_list()
    {
         
            $pageTitle="Graphs";
            return view('admin.graphs.graphs_lists',compact('pageTitle'));   
         
    }
}
