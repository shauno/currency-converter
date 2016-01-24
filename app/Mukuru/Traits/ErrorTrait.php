<?php

namespace Mukuru\Traits;

use Illuminate\Support\MessageBag;

trait ErrorTrait
{
    protected $errors;

    /**
     * @param \Illuminate\Support\MessageBag $errors
     * @return void
     */
    protected function setErrors(MessageBag $errors)
    {
        $this->errors = $errors;
    }

    /**
     * @return \Illuminate\Support\MessageBag
     */
    public function getErrors()
    {
        return $this->errors;
    }
}