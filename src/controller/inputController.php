<?php

namespace App\controller;

class inputController
{

    /**
     * recive request
     */
    public function inputHandle($request)
    {
        $senitizeInput = $this->senitizeInput($request);

        $validateInput = $this->validateInput($senitizeInput);

        return $validateInput;
    }

    /**
     * sanitize input user
     */
    public function senitizeInput($request)
    {

        $filter = [
            'name'  => FILTER_SANITIZE_SPECIAL_CHARS,
            'email' => FILTER_SANITIZE_EMAIL,
        ];

        return filter_var_array($request, $filter);
    }

    /**
     * validate input user
     */
    public function validateInput($input)
    {
        $error = [];

        // check name is empty
        if (empty($input['name'])) {
            $error['name'] = 'name is requred';
        }

        // check email is empty
        if (!filter_var($input['email'], FILTER_VALIDATE_EMAIL)) {
            $error['email'] = 'email is invalid';
        }

        return $input;
    }
}
