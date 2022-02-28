<?php

namespace Fw\Core;

class Validator
{

    private $type;
    private $rule;
    private $validators = [];
    private $result = 'true';

    public function __construct($type, $rule, $validators)
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
        }

        foreach($this->validators as $validator){
            if($validator !== $this->rule){
                $this->result = 'false';
            }
        }

        return $this->result;
    }

    private function minLength($value)
    {
        if(strlen($value) >= $this->rule){
            return 'true';
        }else{
            return 'false';
        }
    }

    private function regexp($value)
    {
        if(preg_match($this->rule, $value)){
            return 'true';
        }else{
            return 'false';
        }
    }

    private function upperCase($value)
    {
        if(ctype_upper($value)){
            return 'true';
        }else{
            return 'false';
        }
    }

}