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
    if ($this->io->method() == 'post') {
        $name = $this->io->post('name');
        $user = $this->ProdModel->finduser($name);

        if ($user) {
            $this->session->set_userdata([
                'name'      => $user->name,
                'logged_in' => true
            ]);
            redirect('products');
        } else {
            $data['error'] = 'Name not recognized';
            return $this->call->view('Login', $data);
        }
    }
    $this->call->view('Login');
}

       public function logout()
    {
        $this->session->unset_userdata(['name', 'logged_in']);
        redirect('/login');
    }
//----------------------------------------

       public function index()
    {
        $data['products'] = $this->ProdModel->All();
        $data['updateProd'] = null;
        $this->call->view('ProdManage', $data);
    }

    public function create()
    {
        if ($this->io->method() == 'post') {
            $this->ProdModel->createProd([
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
        $data['updateProd'] = $this->ProdModel->getById($id);

        if ($this->io->method() == 'post') {
            $this->ProdModel->updateProd($id, [
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
        $this->ProdModel->deleteProd($id);
        redirect('products/table');
    }
}

