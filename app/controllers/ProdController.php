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
    }

    public function index()
{
    $this->call->database();
    $this->call->model('ProdModel');
    $data['products'] = $this->ProdModel->getAll();
    $this->call->view('ProdManage', $data);
}

public function edit($id)
{
    $this->call->database();
    $this->call->model('ProdModel');
    $data['products'] = $this->ProdModel->getAll();
    $data['edit_product'] = $this->ProdModel->getById($id);

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
}

