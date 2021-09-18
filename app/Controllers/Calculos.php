<?php

namespace App\Controllers;

class Calculos extends BaseController
{
	public function index()
	{
		return view('create');
	}

    public function recebe_dados()
	{
		
		$this->a_vlr = $this->request->getPost()['valor_a'];
		$this->b_vlr = $this->request->getPost()['valor_b'];
		$this->c_vlr = $this->request->getPost()['valor_c'];
	}
       
    public function delta()
	{
		$this->delta = ($this->b_vlr * $this->b_vlr) - (4 * $this->a_vlr * $this->c_vlr);

		return $this->delta;
	}

	public function x1()
	{
		$this->x1 = (-$this->b_vlr + sqrt($this->delta())) / (2 * $this->a_vlr);

		return $this->x1;
	}

	public function x2()
	{
		$this->x2 = (-$this->b_vlr - sqrt($this->delta())) / (2 * $this->a_vlr);

		return $this->x2;
	}

	public function bhaskara()
    {
        $this->a_vlr ;
        $this->b_vlr;
        $this->c_vlr;
        $this->delta();
        $this->x1();
        $this->x2();
        $this->insert($id = null);
        
    }
    public function insert()
	{
		$bhaskaraModel = new \App\Models\CalculosModel();

		$this->primaryKey = 'id';

		$data = [
			'a' => $this->a_vlr,
			'b' => $this->b_vlr,
			'c' => $this->c_vlr,
			'delta' => $this->delta(),
			'x1' => $this->x1(),
			'x2' => $this->x2()
		];	
		$bhaskaraModel->save($data);
	}


	
}