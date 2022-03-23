<?php 

namespace App\Controllers;  
use CodeIgniter\Controller;

use App\Models\UserModel;

  
class RegisterController extends Controller
{
    public function index()
    {
        helper(['form']);
        $data = [];
        $UserModel = new UserModel();
        $data['users'] = $UserModel->where("id",session("id"))->findAll();
        echo view('templates/header',$data);
        echo view('templates/sidebar',$data);
        echo view('pages/user_register', $data);
        echo view('templates/footer',$data);
        
    }
  
    public function store()
    {
        helper(['form']);
        $rules = [
            'name'          => 'required|min_length[2]|max_length[50]',
            'email'         => 'required|min_length[4]|max_length[100]|valid_email|is_unique[users.email]',
            'password'      => 'required|min_length[4]|max_length[50]',
            'cpassword'  => 'matches[password]'
        ];
        
        $results = array();
          
        if($this->validate($rules)){
            $model = new UserModel();
            $data = [
                'name'     => $this->request->getVar('name'),
                'email'    => $this->request->getVar('email'),
                'status'    => $this->request->getVar('status'),
                'password' => password_hash($this->request->getVar('password'), PASSWORD_DEFAULT)
            ];
            $model->save($data);
            $results["status"] = 1;
            $results["msg"] = "Register successfully !!!";
           // return redirect()->to('/dashboard');
        }else{
            $data['validation'] = $this->validator;
            //echo view('user_register', $data);
            $results["status"] = 0;
            $results["msg"] = $this->validator;
        }
        
        echo json_encode($results);
          
    }
  
}