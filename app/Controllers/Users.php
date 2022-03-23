<?php namespace App\Controllers;

    use App\Models\ProductModel;

    class Users extends BaseController
    {
        public function index()
        {
            $UserModel = new ProductModel();
            $data['products'] = $UserModel->findAll();
            return view('demo/index', $data);
        }
    }