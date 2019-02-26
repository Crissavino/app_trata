<?php

namespace App\Rules;

use Illuminate\Contracts\Validation\Rule;

class RequiredCheckbox implements Rule
{
    /**
     * Create a new rule instance.
     *
     * @return void
     */
    private $message;
    private $radiobutton;
    private $min;
    private $max;
    private $is_input;
    private $external_attribute;
    private $select;
    private $options_select;
    public function __construct($message,$radiobutton,$min,$max,$is_input = false,$external_attribute = null, $select = false, $options_select = -1)
    {        
        $this->message = $message;
        $this->radiobutton = $radiobutton;
        $this->min = $min;
        $this->max = $max;
        $this->is_input = $is_input;
        $this->external_attribute = $external_attribute;
        $this->select = $select;
        $this->options_select = $options_select;
    }

    /**
     * Determine if the validation rule passes.
     *
     * @param  string  $attribute
     * @param  mixed  $value
     * @return bool
     */
    public function passes($attribute, $value)
    {
        if ($this->is_input){
            if (is_null($value)){
                $value = -1;    
            } else {
                $value = strlen($value);
            }
            if (is_null($this->external_attribute)){
                if ($value > 0) {
                    $this->message = 'Opci&oacute;n invalida';
                    return false;
                } else {
                    return true;
                }                
            }
            if (in_array($this->radiobutton,$this->external_attribute)){
                if (($value > $this->min) && ($value <= $this->max)) {
                    return true;
                } else {
                    $this->message = 'Este campo es obligatorio, maximo 255 caracteres';
                    return false;
                }
            } elseif ($value > 0) {
                return false;
            } else {
                return true;
            }              
        } elseif ($this->select && !(in_array($this->external_attribute,$this->options_select)) && (count($value) > 0)){
            $this->message = "Opci&oacute;n invalida";
            return false;  
        } elseif (count($value) == 0){
            $this->message = "Este campo es obligatorio";
            return false;
        } else {
            $ok = false;
            foreach ($this->radiobutton as $radio_value) {
                if(in_array($radio_value,$value)){
                    $ok = true;
                }
            }
            if(($ok) && (count($value) > 1)) {
                return false;
            } else {
                foreach ($value as $value_checks) {
                    if ($value_checks <= $this->min || $value_checks > $this->max) {
                        $this->message = 'La opci&oacute;n seleccionada no es v&aacute;lida';
                        return false;
                    }
                }
                return true;
            }
        }
    }

    /**
     * Get the validation error message.
     *
     * @return string
     */
    public function message()
    {
        return $this->message;
    }
}
