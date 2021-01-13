<?php

use SilverStripe\ORM\ValidationResult;

class FormValidator
{
  public function Validate($data, $form, $rules)
  {
    $validationResult = null;

    foreach ($rules as $field => $checks) {
      if (array_key_exists($field, $data)) {
        $value = $data[$field];
        $value_valid = true;
        if (count($checks) > 0) {
          $methods = $checks;
          $messages = null;

          $keys = array_keys($checks);
          if (is_string($keys[0])) {
            $methods = $keys;
            $messages = $checks;
          }

          foreach ($methods as $method) {
            $value_valid = $this->$method(
              $value,
              $value_valid,
              $form->Fields()->dataFieldByName($field)
            );
            if (!$value_valid) {
              if (is_null($validationResult)) {
                $validationResult = ValidationResult::create()
                  ->addError('We have been unable to complete your submission due to the following errors. Please fix them and try again.');;
              }
              $validationResult->addFieldError($field, $messages[$method]);
            }
          }
        }
      }
    }
    return $validationResult;
  }

  public function fieldIsRequired($name)
  {
    if (array_key_exists($name, $this->rules)) {
      $keys = array_keys($this->rules[$name]);
      if (is_string($keys[0])) {
        return array_key_exists('required', $this->rules[$name]);
      } else {
        return in_array('required', $this->rules[$name]);
      }
    } elseif (is_a($this->form->Fields()->dataFieldByName($name), 'NocaptchaField')) {
      return true;
    }
    return false;
  }

  public function required($value)
  {
    if (is_null($value)) {
      return false;
    } elseif (is_string($value)) {
      return (strlen($value) > 0);
    } elseif (is_array($value) && array_key_exists('size', $value)) {
      return $value['size'] > 0;
    } else {
      return true;
    }
  }

  public function email_address($value)
  {
    if (strlen($value) > 0) {
      return preg_match("/^([a-zA-Z0-9])+([a-zA-Z0-9\._-])*@([a-zA-Z0-9_-])+([a-zA-Z0-9\._-]+)+$/", $value);
    } else {
      return true;
    }
  }
}
