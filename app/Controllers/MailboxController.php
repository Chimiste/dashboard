<?php 

namespace App\Controllers;  
use CodeIgniter\Controller;
use App\Models\UserModel;

class MailboxController extends Controller
{
    public function mail_box()
    {
        $UserModel = new UserModel();
        $data['users'] = $UserModel->where("id",session("id"))->findAll();

        echo view('templates/header',$data);
        echo view('templates/sidebar',$data);
        echo view('pages/mailbox',$data);
        echo view('templates/footer',$data);
    } 
    public function read_mail()
    {
        $UserModel = new UserModel();
        $data['users'] = $UserModel->where("id",session("id"))->findAll();

        echo view('templates/header',$data);
        echo view('templates/sidebar',$data);
        echo view('pages/readmail',$data);
        echo view('templates/footer',$data);
    } 
    public function compose()
    {
        $UserModel = new UserModel();
        $data['users'] = $UserModel->where("id",session("id"))->findAll();

        echo view('templates/header',$data);
        echo view('templates/sidebar',$data);
        echo view('pages/compose',$data);
        echo view('templates/footer',$data);;
    } 
}
