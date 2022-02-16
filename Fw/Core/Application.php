<?php

namespace Fw\Core;

use Fw\Core\Config;
use Fw\Core\Page;
use Fw\Request;
use Fw\Server;
use Exception;

class Application
{

    use Traits\Singleton;

    private $__components = [];
    public $pager;
    private $template = 'null';
    protected $request;
    protected $server;

    public function __construct()
    {
        $this->pager = Page::getInstance();
        $this->template = Config::getConfig('template/id');
        // $this->request = $this->getRequest();
        // $this->server = $this->getServer();
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
        return new Request;
    }

    public function getServer()
    {
        return new Server;
    }

    public function includeComponent(string $component, string $template, array $params)
    {
        $componentInfo = explode(":", $component); 
        $namespace = $componentInfo[0]; 
        $id = $componentInfo[1];
        if(!isset($this->__components[$component])){
            $path = $namespace . "\\" . $id . "\\class";
            $wholePath = ($_SERVER['DOCUMENT_ROOT'] . str_replace("\\", "/", $path) . ".php");
            $componentsBeforeConnection = get_declared_classes();
            
            if(file_exists($wholePath)){
                include($wholePath);
            }else{
                throw new Exception("Component is not detected! Please, check the namespace and id of component!");
                die;
            }

            $componentsAfterConnection = get_declared_classes();
            
            if(array_diff($componentsAfterConnection, $componentsBeforeConnection) != []){
                $componentDiffArray = array_values(array_diff($componentsAfterConnection, $componentsBeforeConnection));

                foreach($componentDiffArray as $componentDiff){
                    if(get_parent_class($componentDiff) == 'Fw\Core\Component\Base'){
                        $this->__components[$component] = $componentDiff;
                        break;
                    }
                }
            }
        }

        if(get_parent_class($this->__components[$component]) == 'Fw\Core\Component\Base'){
            $className = $this->__components[$component];
        }

        $component = new $className($id, $template, $params);
        $component->executeComponent();
    }
    
}

