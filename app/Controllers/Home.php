<?php

namespace App\Controllers;

class Home extends BaseController
{
	public function index()
	{
		if (session()->get('log') != true) {
			return redirect()->to('login');
		}

		$data = [
			'title' => 'Home',
			'isi' => 'v_home'
		];
		return view('layout/v_wrapper', $data);
	}

	//--------------------------------------------------------------------

}
