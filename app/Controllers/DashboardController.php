<?php 

namespace App\Controllers;  
use CodeIgniter\Controller;

  
class DashboardController extends Controller
{
    public function index()
    {
        //$session = session();
        //echo "Hey User : ".$session->get('name');
        
        helper(['form']);
        echo view('templates/header');
        echo view('templates/sidebar');
        echo view('pages/dashboard');
        echo view('templates/footer');
    }

}