<?php

namespace denis909\yii;

use Exception;

trait SaveOrFailTrait
{

    public function saveOrFail($runValidation = true, $attributeNames = null)
    {
        if (!$this->save($runValidation, $attributeNames))
        {
            $errors = $this->firstErrors;

            $error = array_shift($errors);

            throw new Exception($error);
        }
    }

}