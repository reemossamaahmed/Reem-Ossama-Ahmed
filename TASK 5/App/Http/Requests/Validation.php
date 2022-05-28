<?php

namespace App\Http\Requests;

use App\Database\Models\Model;

class Validation
{
    private array $errors = [];
    private string $value;
    private string $key;


    /**
     * Get the value of value
     */
    public function getValue()
    {
        return $this->value;
    }

    /**
     * Set the value of value
     *
     * @return  self
     */
    public function setValue($value)
    {
        $this->value = $value;

        return $this;
    }

    /**
     * Get the value of key
     */
    public function getKey()
    {
        return $this->key;
    }

    /**
     * Set the value of key
     *
     * @return  self
     */
    public function setKey($key)
    {
        $this->key = $key;

        return $this;
    }

    /**
     * Get the value of errors
     */
    public function getErrors()
    {
        return $this->errors;
    }
    public function getError(string $error)
    {
        if(isset($this->errors[$error]))
        {
            foreach($this->errors[$error] as $error)
            {
                return $error;
            }
        }
        else
        {
            return false;
        }
    }
    public function required()
    {
        if (empty($this->value)) {
            $this->errors[$this->key][__FUNCTION__] = GetError::messege("{$this->key} is Required");
        }
        return $this;
    }
    public function string()
    {
        if (!is_string($this->value)) {
            $this->errors[$this->key][__FUNCTION__] = GetError::messege("{$this->key} must be string");
        }
        return $this;
    }
    public function min($min)
    {
        if (strlen($this->value) < $min) {
            $this->errors[$this->key][__FUNCTION__] = GetError::messege("{$this->key} must be more than {$min} characters");
        }

        return $this;
    }
    public function max($max)
    {
        if (strlen($this->value) > $max) {
            $this->errors[$this->key][__FUNCTION__] = GetError::messege("{$this->key} must be less than {$max} characters");
        }
        return $this;
    }
    public function digits($digits)
    {
        if (strlen($this->value) != $digits) {
            $this->errors[$this->key][__FUNCTION__] = GetError::messege("{$this->key} must be equal {$digits} digits");
        }
        return $this;
    }
    public function in(array $array)
    {
        if (!in_array($this->value, $array)) {
            $this->errors[$this->key][__FUNCTION__] = GetError::messege("{$this->key} must be" . implode(',', $array));
        }
        return $this;
    }
    public function regex($patern, $messege = NULL)
    {
        if(!$messege)
        {
            $messege = "{$this->key} Invalid";
        }
        if (!preg_match($patern, $this->value)) {
            $this->errors[$this->key][__FUNCTION__] = GetError::messege($messege);
        }
        return $this;
    }
    public function confirmed(string $comparedValue)
    {
        if ($this->value != $comparedValue) {
            $this->errors[$this->key][__FUNCTION__] = GetError::messege("{$this->key} doesn't match {$this->key} confirmation");
        }
        return $this;
    }
    public function unique(string $table, string $column)
    {
        $model = new Model;
        $statement = $model->conn->prepare("SELECT * FROM `{$table}` WHERE `{$column}` = ?");
        $statement->bind_param('s',$this->value);
        $statement->execute();
        if($statement->get_result()->num_rows == 1)
        {
            $this->errors[$this->key][__FUNCTION__] = GetError::messege("{$column} is already exist!!");
        }
        return $this;
    }
    public function exist(string $table, string $column)
    {
        $model = new Model;
        $statement = $model->conn->prepare("SELECT * FROM `{$table}` WHERE `{$column}` = ?");
        $statement->bind_param('s',$this->value);
        $statement->execute();
        if($statement->get_result()->num_rows == 0)
        {
            $this->errors[$this->key][__FUNCTION__] = GetError::messege("{$column} is doesn't exist!!");
        }
        return $this;
    }
}
