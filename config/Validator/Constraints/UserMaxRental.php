<?php

namespace App\Validator\Constraints;

use Symfony\Component\Validator\Constraint;

class UserMaxRental extends Constraint
{
    public $message = 'xyz';
    
    public function validatedBy()
    {
        return \get_class($this).'Validator';
    }
}
