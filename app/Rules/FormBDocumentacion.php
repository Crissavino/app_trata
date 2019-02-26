<?php

namespace App\Rules;

use Illuminate\Contracts\Validation\Rule;

class FormBDocumentacion implements Rule
{
    /**
     * Create a new rule instance.
     *
     * @return void
     */
    public function __construct($external_attribute, $min, $max, $is_input = false)
    {
        $this->external_attribute = $external_attribute;
        $this->min = $min;
        $this->max = $max;
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
        if ($this->is_input){
            $value = strlen($value);
        }
        switch ($this->external_attribute) {
            case 1:
            case 2:
            case 4:
            case 5:
                if (is_null($value)) {
                    $this->message = 'Este campo es obligatorio';
                    return false;
                } elseif (($value > $this->min) && ($value <= $this->max)) {
                    return true;
                } else {
                    $this->message = 'La opci&oacute;n seleccionada no es v&aacute;lida';
                    return false;
                }
                break;
            case 3:
                if (is_null($value)) {
                    $this->message = 'Este campo es obligatorio';
                    return false;
                } elseif ($value = 8) {
                    return true;
                } else {
                    $this->message = 'La opci&oacute;n seleccionada no es v&aacute;lida';
                    return false;
                }
                break;
            case 6:
                if (is_null($value)) {
                    $this->message = 'Este campo es obligatorio';
                    return false;
                } elseif ($value = 7) {
                    return true;
                } else {
                    $this->message = 'La opci&oacute;n seleccionada no es v&aacute;lida';
                    return false;
                }
                break;
            default:
                $this->message = 'La opci&oacute;n seleccionada en documentaci&oacute;n no es v&aacute;lida';
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
