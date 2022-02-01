<?php

namespace Fw\Core;

class Page
{

    use Traits\ApplicationTrait;
    public $cssLinks = [];
    public $jsLinks = [];
    public $tagLinks = [];
    public $macros = ['&#35FW_PAGE_JS&#35', '&#35FW_PAGE_CSS&#35', '&#35FW_PAGE_TAG&#35'];
    public $customMacros = [];
    public $customTags = [];
    

    public function addJs(string $src)
    {
        if (!in_array($src, $this->jsLinks, true)) {
            $this->jsLinks[] = $src;
        }
    }

    public function addCss(string $link)
    {
        if (!in_array($link, $this->cssLinks, true)) {
            $this->cssLinks[] = $link;
        }
    }

    public function addString(string $str)  
    {
        if (!in_array($str, $this->tagLinks, true)) {
            $this->tagLinks[] = $str;
        }
    }

    public function setProperty(string $id, $value)
    {
        if(!in_array($id, $this->customTags, true)){
            $this->customTags[$id] = $value;
        }
    }
    
    public function getProperty(string $id)
    {
        foreach($this->customTags as $tag=>$value){
            if($tag===$id){
                return '<' . $tag . '>' . $value . '</' . $tag . '>';
            }
        }
    }

    public function showProperty(string $id)
    {
        $this->customMacros[] = '#FW_PAGE_PROPERTY_' . $id . '#';
        echo '#FW_PAGE_PROPERTY_' . $id . '#';
    }

    public function getAllReplace()
    {
        $outputMacros = [];
        $allLinks = ['JS' => $this->jsLinks, 'CSS' => $this->cssLinks, 'TAG' => $this->tagLinks];

        foreach ($allLinks as $key => $values){
            foreach ($values as $value){
                    switch ($key){
                        case 'JS' : $outputMacros[$this->getMacros($key)][] = '<script src=' . $value . '></script>'; break;
                        case 'CSS' : $outputMacros[$this->getMacros($key)][] = '<link rel="stylesheet" type="text/css" href="' . $value . '">'; break;
                        case 'TAG' : $outputMacros[$this->getMacros($key)][] = '<meta ' . $value . '>'; break;
                }
            }
        }
        
        foreach ($this->customMacros as $macros){
            $macrosPieces = explode('_', trim($macros, '#'));
            $outputMacros[$macros] = $this->getProperty(end($macrosPieces));
        }
        return $outputMacros;
        
    }

    public function getMacros(string $substring)
    {
        foreach ($this->macros as $macros){
            if(strpos($macros, $substring) !== false){
                return '<!-- ' . $macros . ' -->';
            }
        }
    }

    public function showHead()
    {
        foreach($this->macros as $mac){
            echo '<!-- ' . $mac . ' -->';
        }
    }

}