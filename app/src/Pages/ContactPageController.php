<?php

use SilverStripe\Forms\FieldList;
use SilverStripe\Forms\TextField;
use SilverStripe\Forms\EmailField;
use SilverStripe\Forms\TextareaField;
use SilverStripe\Forms\FormAction;
use SilverStripe\Forms\Form;
use SilverStripe\Forms\RequiredFields;
use SilverStripe\Control\Email\Email;
use SilverStripe\ORM\ValidationResult;

class ContactPageController extends PageController 
{
  private static $allowed_actions = [
    'Form'
  ];
  
  public function Form() 
  {
    $fields = FieldList::create( 
        TextField::create('Name', 'Name')
          ->addExtraClass('nhsuk-input')
          ->setFieldHolderTemplate('Forms/FormField_holder'),
        TextField::create('Email', 'Email')
          ->addExtraClass('nhsuk-input')
          ->setFieldHolderTemplate('Forms/FormField_holder'),
        TextareaField::create('Message', 'Message')
          ->addExtraClass('nhsuk-textarea')
          ->setFieldHolderTemplate('Forms/FormField_holder')
    );

    $actions = FieldList::create( 
        FormAction::create('Submit', 'Submit')
          ->addExtraClass('nhsuk-button')
    );

    $form = Form::create($this, 'Form', $fields, $actions);
    $form->setTemplate('Forms/Form');

    return $form;
  }

  public function Submit($data, $form) 
  {
    $formValidator = new FormValidator();
    $validationResult = $formValidator->Validate($data, $form, [
      'Name' => [
        'required' => 'Please enter your name',
      ],
      'Email' => [
        'required' => 'Please enter your email address',
        'email_address' => 'Please enter a valid email address'
      ],
    ]);

    if(!is_null($validationResult)) {
      $form->setSessionValidationResult($validationResult);
      $form->setSessionData($form->getData());
      return $this->redirectBack();
    }
          
    $email = Email::create(); 
      
    $email->setTo('thomashdoughty@gmail.com'); 
    $email->setFrom($data['Email']); 
    $email->setSubject('Contact Message from {$data["Name"]}'); 
    $email->setBody('
      <p><strong>Name:</strong> {$data["Name"]}</p> 
      <p><strong>Message:</strong> {$data["Message"]}</p> 
    '); 
    $email->send(); 

    $submission = Contact::create();
    $form->saveInto($submission);
    $submission->write();

    $form->sessionMessage('Saved!', 'Your enquiry has been sent, we will be in touch as soon as possible.');
    return $this->redirectBack();
  }
}
