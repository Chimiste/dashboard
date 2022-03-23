<?php 

namespace App\Controllers;  
use CodeIgniter\Controller;
use App\Models\UserModel;

  
class DashboardController extends Controller
{
    public function index()
    {
        
        helper(['form']);
        $UserModel = new UserModel();
        $data['users'] = $UserModel->where("id",session("id"))->findAll();

        echo view('templates/header',$data);
        echo view('templates/sidebar',$data);
        echo view('pages/dashboard',$data);
        echo view('templates/footer',$data);
    }

}