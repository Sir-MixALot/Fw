<?php

namespace Fw\Core;

use Fw\Core\Config;
use Fw\Core\Page;

class Application
{

    use Traits\ApplicationTrait;

    private $__components = [];
    public $pager;
    private $template = 'null';

    public function __construct()
    {
        $this->pager = Page::getInstance();
        $this->template = Config::getConfig('template/id');
    }
    
    public function getHeader()
    {
        $this->startBuffer();
        include($_SERVER['DOCUMENT_ROOT'] . '/Fw/Templates/' . ucfirst($this->template) . '/header.php');
    }

    public function getFooter()
    {
        include($_SERVER['DOCUMENT_ROOT'] . 'Fw/Templates/' . ucfirst($this->template) . '/footer.php');
        echo $this->endBuffer();
    }
    
    public function startBuffer()
    {
        ob_start();
    }

    public function endBuffer()
    {
        $links = $this->pager->getAllReplace();
        $content = ob_get_contents();

        foreach($links as $macros=>$replacement){
            if(is_array($replacement)){
                $content = str_replace($macros, implode($replacement), $content);
            }else{
                $content = str_replace($macros, $replacement, $content);
            }
        }

        $this->restartBuffer();

        return $content;
    }

    public function restartBuffer()
    {
        ob_get_clean();
    }

    
}

