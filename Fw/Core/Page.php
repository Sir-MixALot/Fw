<?php

namespace Fw\Core;

class Page
{

    use Traits\Singleton;
    
    private $salt = '15654987';
    public $cssLinks = [];
    public $jsLinks = [];
    public $tagLinks = [];
    public $macros = ['&#35FW_PAGE_JS&#35', '&#35FW_PAGE_CSS&#35', '&#35FW_PAGE_TAG&#35'];
    public $customMacros = [];
    public $customReplacements = [];
    

    public function addJs(string $src)
    {
        if (!isset($this->jsLinks[sha1($src . $this->salt)])) {
            $this->jsLinks[sha1($src . $this->salt)] = $src;
        }
    }

    public function addCss(string $link)
    {
        if (!isset($this->cssLinks[sha1($link . $this->salt)])) {
            $this->cssLinks[sha1($link . $this->salt)] = $link;
        }
        
        
    }

    public function addString(string $str)  
    {
        $this->tagLinks[] = $str;
    }

    public function setProperty(string $id, $value)
    {
        if(!isset($customReplacements[$id])){
            $this->customReplacements[$id] = $value;
        }
    }
    
    public function getProperty(string $id)
    {
        if(isset($this->customReplacements[$id])){
            return $this->customReplacements[$id];
        }
    }

    public function showProperty(string $id)
    {
        $this->customMacros[] = '#FW_PAGE_PROPERTY_' . $id . '#';
        echo '#FW_PAGE_PROPERTY_' . $id . '#';
    }

    public function getAllReplace()
    {
        $outputMacros =[
            $this->getMacros('JS') => $this->getJsReplacement(),
            $this->getMacros('CSS') => $this->getCssReplacement(),
            $this->getMacros('TAG') => $this->getTagReplacement()
        ];

        foreach ($this->customMacros as $macros){
            $macrosPieces = explode('_', trim($macros, '#'));
            $outputMacros[$macros] = $this->getProperty(end($macrosPieces));
        }
        
        return $outputMacros;
        
    }

    public function getJsReplacement()
    {
        $outputJs = '';
        if(!empty($this->jsLinks)){
            foreach($this->jsLinks as $jsLink){
                $outputJs .= '<script src=' . $jsLink . '></script>';
            }
        }

        return $outputJs;    
    }

    public function getCssReplacement()
    {
        $outputCss = '';
        if(!empty($this->cssLinks)){
            foreach($this->cssLinks as $cssLink){
                $outputCss .= '<link rel="stylesheet" type="text/css" href="' . $cssLink . '">';
            }
        }
        
        return $outputCss;
    }

    public function getTagReplacement()
    {
        $outputTags = '';
        if(!empty($this->tagLinks)){
            foreach($this->tagLinks as $tagLink){
                $outputTags .= $tagLink;
            }
        }
        
        return $outputTags;
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