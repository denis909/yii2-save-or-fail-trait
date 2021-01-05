<?php

namespace denis909\yii;

use Exception;
use Yii;

trait SaveOrFailTrait
{

    public function saveOrFail($runValidation = true, $attributeNames = null)
    {
        if (!$this->save($runValidation, $attributeNames))
        {
            $errors = $this->firstErrors;

            Yii::error($errors, __CLASS__ . '::' . __FUNCTION__);

            $error = array_shift($errors);

            throw new Exception($error);
        }
    }

}