<?php
namespace Carlos\Auth\App;
class Router
{
	protected $get;
	protected $post;

	function __construct()
	{
		$this->get=array();
		$this->post=array();
		# code...
	}
	public function get($path, $page){
		$this->get[$path]=$page;
	}
	public function post($path, $page){
		$this->post[$path]=$page;
	}
	public function send(){
		$path=isset($_SERVER['PATH_INFO'])? $_SERVER['PATH_INFO']:'/';
		$metodo=$_SERVER['REQUEST_METHOD'];

		if(isset($path, $metodo)){
			if($metodo==='GET'){
				if(array_key_exists($path, $this->get)){
					include_once __DIR__.'/../'.$this->get[$path];
					exit();
				}
			}else if($metodo==='POST'){
				if(array_key_exists($path, $this->post)){
					include_once __DIR__.'/../'.$this->post[$path];
					exit();
				}
			}
			header('Location: /error');
			exit();
			
		}
	}
}