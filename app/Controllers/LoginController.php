<?php 

namespace App\Controllers;  
use CodeIgniter\Controller;
use App\Models\UserModel;
  

class LoginController extends Controller
{
    public function index()
    {
        helper(['form']);
        helper('cookie');
        echo view('pages/login');
    } 
    
    public function process_login()
    {

        $session = session();
        $model = new UserModel();
        helper('cookie');

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
                
                // remember me
                    if($this->request->getVar('remember')) {
                      
                      set_cookie ("loginId", $email, time()+ (10 * 365 * 24 * 60 * 60));  
                      set_cookie ("loginPass", $password,  time()+ (10 * 365 * 24 * 60 * 60));
                    } else {
                      set_cookie ("loginId",""); 
                      set_cookie ("loginPass","");
                    }  
                
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
    //Lougout
    public function logout()
    {
        session_start();
        session_destroy();
        return redirect()->to('/login');
    }
}