<?php
namespace Carlos\Auth\App;
class Application
{

	public function send(){
		$this->router->send();

	}
	function __construct(protected Router $router)
	{
		$this->router=$router;	}
}