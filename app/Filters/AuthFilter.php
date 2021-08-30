<?php

namespace App\Filters;

use CodeIgniter\HTTP\RequestInterface;
use CodeIgniter\HTTP\ResponseInterface;
use CodeIgniter\Filters\FilterInterface;

class AuthFilter implements FilterInterface
{
    public function before(RequestInterface $request, $arguments = null)
    {
        // Do something here
        if (session()->get('log') != true) {
            session()->setFlashdata('gagal', 'Anda Belum Login, Silahkan Login Terlebih Dahulu');
            return redirect()->to('login');
        }
    }

    //--------------------------------------------------------------------

    public function after(RequestInterface $request, ResponseInterface $response, $arguments = null)
    {
        // Do something here
        if (session()->get('log') == true) {
            return redirect()->to('home');
        }
    }
}
