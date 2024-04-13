<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\domain;
class DomainController extends Controller
{
    public function index(){
        $domains = domain::latest()->Paginate(1);
        return view("domains.index" , compact('domains'));
    }

    public function create(){
        return view("domains.create");
    }
}
