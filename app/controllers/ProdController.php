<?php
defined('PREVENT_DIRECT_ACCESS') OR exit('No direct script access allowed');

/**
 * Controller: ProdController
 * 
 * Automatically generated via CLI.
 */
class ProdController extends Controller {
    public function __construct()
    {
        parent::__construct();
        $this->call->library('session');
        $this->call->model('ProdModel');
    }

    public function login()
    {
    $this->call->database();
    $this->call->model('ProdModel');
    $data['products'] = $this->ProdModel->All();
    $data['edit_product'] = null;
    $this->call->view('ProdManage', $data);
    }

       public function logout()
    {
        $this->session->unset_userdata(['name', 'logged_in']);
        redirect('auth/login');
    }

       public function index()
    {
        $data['products'] = $this->ProdModel->All();
        $data['edit_product'] = null;
        $this->call->view('ProdManage', $data);
    }

    public function create()
    {
        if ($this->io->method() == 'post') {
            $this->ProdModel->createProduct([
                'product_name' => $this->io->post('product_name'),
                'description'  => $this->io->post('description'),
                'price'        => $this->io->post('price'),
                'quantity'     => $this->io->post('quantity'),
            ]);
        }
        redirect('products');
    }

    public function edit($id)
    {
        $data['products'] = $this->ProdModel->All();
        $data['edit_product'] = $this->ProdModel->getProductById($id);

        if ($this->io->method() == 'post') {
            $this->ProdModel->updateProduct($id, [
                'product_name' => $this->io->post('product_name'),
                'description'  => $this->io->post('description'),
                'price'        => $this->io->post('price'),
                'quantity'     => $this->io->post('quantity'),
            ]);
            redirect('products');
        }

        $this->call->view('ProdManage', $data);
    }

    public function delete($id)
    {
        $this->ProdModel->deleteProduct($id);
        redirect('products');
    }
}

