<?php
class Init{
    protected $currentController = 'Controller';
	protected $currentMethod = 'Index';
	protected $params = [];
    protected $url;

 public function getUrl() {
    if (isset($_GET['url'])) {
        $url = rtrim($_GET['url'], '/');
        $url = filter_var($url, FILTER_SANITIZE_URL);
        $url = explode('/', $url);

        return $url;
    }
}
public function __construct(){
$this->url=$this->getUrl();
if (isset($this->url[0])) {
if (file_exists('app/Controllers/' .($this->url[0]) . '.php')) {
    $this->currentController=($this->url[0]);
    unset($this->url[0]);
}
}
require_once 'app/Controllers/' . $this->currentController . '.php';
$this->currentController = new $this->currentController;
spl_autoload_register(function($className) {
    require_once 'app/Models/'.$className . '.php';
});

// Set method
if (isset($this->url[1])) {
    if (method_exists($this->currentController, $this->url[1])) {
        $this->currentMethod = $this->url[1];
        unset($this->url[1]);
    }
}
$this->params = $this->url ? array_values($this->url) : [];
call_user_func_array([$this->currentController, $this->currentMethod], $this->params);
}
}
