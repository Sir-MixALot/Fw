<?php

namespace Fw\Core;

use Fw\Core\Config;
use Fw\Core\Page;
use Fw\Core\Request;
use Fw\Core\Server;
use Exception;

class Application
{

    use Traits\Singleton;

    private $__components = [];
    public $pager;
    private $template = 'null';
    public $request;
    public $server;

    public function __construct()
    {
        $this->pager = Page::getInstance();
        $this->template = Config::getConfig('template/id');
        $this->request = new Request();
        $this->server = new Server();
    }
    
    public function header()
    {
        $this->startBuffer();
        include($_SERVER['DOCUMENT_ROOT'] . '/Fw/Templates/' . ucfirst($this->template) . '/header.php');
    }

    public function footer()
    {
        include($_SERVER['DOCUMENT_ROOT'] . '/Fw/Templates/' . ucfirst($this->template) . '/footer.php');
        echo $this->endBuffer();
    }
    
    public function startBuffer()
    {
        ob_start();
    }

    public function endBuffer()
    {
        $content = ob_get_contents();
        $macrosAndReplacement = $this->pager->getAllReplace();
        $content = str_replace(array_keys($macrosAndReplacement), $macrosAndReplacement, $content);

        $this->restartBuffer();

        return $content;
    }

    public function restartBuffer()
    {
        ob_end_clean();
        $this->startBuffer();
    }

    public function getRequest()
    {
        return $this->request;
    }

    public function getServer()
    {
        return $this->server;
    }

    public function includeComponent(string $component, string $template, array $params)
    {
        $componentInfo = explode(":", $component); 
        $namespace = $componentInfo[0]; 
        $id = $componentInfo[1];
        if(!isset($this->__components[$component])){
            $path = $namespace . "\\" . $id . "\\class";
            $wholePath = ($this->getServer()->container['DOCUMENT_ROOT'] . str_replace("\\", "/", $path) . ".php");
            $classesBeforeComponentConnection = get_declared_classes();
            
            if(file_exists($wholePath)){
                include($wholePath);
            }else{
                throw new Exception("Component is not detected! Please, check the namespace and id of component!");
                die;
            }

            $classesAfterComponentConnection = get_declared_classes();
            
            if(array_diff($classesAfterComponentConnection, $classesBeforeComponentConnection) != []){
                $componentAndBasePath = array_values(array_diff($classesAfterComponentConnection, $classesBeforeComponentConnection));

                foreach($componentAndBasePath as $componentPath){
                    if(get_parent_class($componentPath) == 'Fw\Core\Component\Base'){
                        $this->__components[$component] = $componentPath;
                        break;
                    }
                }
            }
        }

        if(get_parent_class($this->__components[$component]) == 'Fw\Core\Component\Base'){
            $componentName = $this->__components[$component];
        }

        $component = new $componentName($namespace ,$id, $template, $params);
        $component->executeComponent();
    }
    
}

