<?php

namespace App\Rules;

use Illuminate\Contracts\Validation\Rule;

class RequiredConditional implements Rule
{
    /**
     * Create a new rule instance.
     *
     * @return void
     */
    private $external_attribute;
    private $required_values;
    private $min;
    private $max;
    private $message;
    private $is_input;

    public function __construct($external_attribute, $required_values, $min, $max, $own_message, $is_input = false)
    {
        $this->external_attribute = $external_attribute;
        $this->required_values = $required_values; 
        $this->min = $min;
        $this->max = $max;
        $this->message = $own_message;
        $this->is_input = $is_input;
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
        if (is_null($value)) {
            if(in_array($this->external_attribute,$this->required_values)){
                $this->message = 'Este campo es obligatorio';
                return false;
            }else {
                return true;
            }                            
        } elseif (in_array($this->external_attribute,$this->required_values)) {
            if ($this->is_input){
                $value = strlen($value);
            }
            if (($value > $this->min) && ($value <= $this->max)) {
                return true;
            } else {
                $this->message = 'La opci&oacute;n seleccionada no es v&aacute;lida';
                return false;
            }            
        } else {
            return false;
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
