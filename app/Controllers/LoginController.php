<?php 

namespace App\Controllers;  
use CodeIgniter\Controller;
use App\Models\UserModel;
  

class LoginController extends Controller
{
    public function index()
    {
        helper(['form']);
        echo view('pages/login');
    } 
    
    public function process_login()
    {

        $session = session();
        $model = new UserModel();

        $email = $this->request->getVar('email');
        $password = $this->request->getVar('password');
        
        $data = $model->where('email', $email)->first();
        $results = array();
        
        if($data){
            
            $pass = $data['password'];
            $pwd_verify = password_verify($password, $pass);
            if($pwd_verify){
                $ses_data = [
                    'id' => $data['id'],
                    'name' => $data['name'],
                    'email' => $data['email'],
                    'status' => $data['status'],
                    'isSignedIn' => TRUE
                ];

                $session->set($ses_data);
                $results["status"] = 1;
                $results["msg"] = "Register successfully !!!";
               // return redirect()->to('/dashboard');
            }else{
                $session->setFlashdata('msg', 'wrong password.');
              //  return redirect()->to('/login');
                $results["status"] = 0;
                $results["msg"] = 'wrong password.';
            }
        }else{
            $session->setFlashdata('msg', 'wrong email.');
            $results["status"] = 0;
            $results["msg"] = 'wrong email.';
         
           // return redirect()->to('/login');
        }
        
        echo json_encode($results);
        
       
    }
}