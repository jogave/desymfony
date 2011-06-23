<?php

namespace Desymfony\DesymfonyBundle\Validator;

use Symfony\Component\Validator\Constraint;
use Symfony\Component\Validator\ConstraintValidator;

class DNIValidator extends ConstraintValidator
{
    public function isValid($value, Constraint $constraint)
    {
        $this->setMessage($constraint->message);
        if (preg_match('/\d{1,8}[A-Za-z]/', $value, $matches)){
            return ($this->letra_nif($value) == strtoupper($matches[1]));
        } else {
            return false;
        }
    }

    protected function letra_nif($dni)
    {
        return substr("TRWAGMYFPDXBNJZSQVHLCKE", strtr($dni, "XYZ", "012")%23, 1);
    }
}
