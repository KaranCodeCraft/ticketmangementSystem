<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class PermissionController extends Controller
{
    public function index(){

    }
    public function create(){
        return  view("permissions.view");
    }
    public function store(Request $request){}
    public function show($id){}
    public function edit($id){}
    public function update(Request $request, $id){}

    
    public function destroy($id){}

}
