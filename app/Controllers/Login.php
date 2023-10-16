<?php

namespace App\Controllers;

use App\Models\Users;

class Login extends BaseController
{
    public function index(): string
    {
        return view('login/index');
    }

    public function register(): string
    {
        return view('login/register');
    }

    public function guardar(){
        $musers = new Users();
        $nombres = $this->request->getPost('nombres');
        $username = $this->request->getPost('username');
        $email = $this->request->getPost('email');
        $password = $this->request->getPost('password');
        $estado = 1;
        $newPassword = password_hash($password, PASSWORD_DEFAULT);

        $data = [
            'nombres' => $nombres,
            'username' => $username,
            'email' => $email,
            'password' => $newPassword,
            'estado' => $estado,
        ];
    
        $musers->save($data);
        //return view('login/index');
        return "se guardo";
    }

    public function iniciar1(){
        $musers = new Users();

        $username = $this->request->getPost('username');
        $password = $this->request->getPost('password');
        
        $newPassword = password_hash($password, PASSWORD_DEFAULT);

        $data = [
            'nombres' => $nombres,
            'username' => $username,
            'email' => $email,
            'password' => $newPassword,
            'estado' => $estado,
        ];
    
        $musers->save($data);
        return redirect()->to(base_url()."public/login/index");
    }

public function iniciar(){
    $musers = new Users();

    $username = $this->request->getPost('username');
    $password = $this->request->getPost('password');

    if (! $this->validate([
        'username'  => 'required',
        'password' => 'required|min_length[4]',
    
    ])){
        return redirect ()->to(base_url()."public/login/index");
    }

    $datosUsuario = $musers->obtenerUsuario($username);

    if(!$datosUsuario){
        return redirect()->to(base_url()."public/login/index");

    }

    if($datosUsuario != null && password_verify($password, $datosUsuario['password'])){
        $data = ["usuario" => $datosUsuarios[0]['username'], "type" => $datosUsuario[0]['type']];
        $session = session();
        $session->set($data);
        return redirect()->to(base_url()."public/dashboard/index");
        
    }else{
        return redirect()->to(base_url()."public/login/1");
    }
}
public function salir(){
    $session = session();
    $session->destroy();
    return redirect()->to(base_url()."public/login/index");
}
}
