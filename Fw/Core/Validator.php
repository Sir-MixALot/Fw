<?php

namespace Fw\Core;

class Validator
{

    private $type;
    private $rule;
    private $validators = [];
    private $result = true;

    public function __construct($type, $rule = null, $validators = [])
    {
       
        $this->type = $type;
        $this->rule = $rule;
        $this->validators = $validators;
    }

    public function exec($value)
    {
        $type = $this->type;
        return $this->$type($value);
    }


    private function chain($value)
    {
        foreach($this->validators as $key => $validator){
            $this->validators[$key] = $validator->exec($value);
            if($this->validators[$key] != $this->rule){
                return false;
            }
        }

        return true;
    }

    private function minLength($value)
    {
        if(strlen($value) >= $this->rule){
            return true;
        }else{
            return false;
        }
    }

    private function regexp($value)
    {
        return !!preg_match($this->rule, $value);
    }

    private function upperCase($value)
    {
        if(ctype_upper($value)){
            return true;
        }else{
            return false;
        }
    }

    private function in($value)
    {
        return in_array($value, $this->rule);
    }

    private function email($value)
    {
        if(filter_var($value, FILTER_VALIDATE_EMAIL)){
            return true;
        }else{
            return false;
        }
    }

}