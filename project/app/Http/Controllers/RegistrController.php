<?php

namespace App\Http\Controllers;
use Illuminate\Http\Request;
use App\Http\Requests\LoginRequest;
use Illuminate\Support\Facades\DB;

class RegistrController extends Controller
{
    public function registr(LoginRequest $rec){
      $name=$rec->input('name');
      $surname=$rec->input('surname');
      $email=$rec->input('email');
      $password=$rec->input('password');
      DB::insert('insert into logins(id,name,surname,email,password) values (?,?,?,?,?)',[null,$name,$surname,$email,$password]);
      return redirect()->route('login')->with('success','User authorized successfully!');
    }
}
