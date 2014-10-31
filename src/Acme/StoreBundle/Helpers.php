<?php

namespace Acme\StoreBundle;


class Helpers
{

    public function firstNameToUpperCase($fullName)
    {
        $name_array = explode(' ', $fullName);
        $firstName = $name_array[0];
        $firstNameUpperCase = ucfirst($firstName);

        return $firstNameUpperCase;
    }
} 