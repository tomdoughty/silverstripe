<?php

namespace {

  use SilverStripe\Forms\FieldList;
  use SilverStripe\Forms\TextField;
  use SilverStripe\Forms\EmailField;
  use SilverStripe\Forms\TextareaField;
  use SilverStripe\Forms\FormAction;
  use SilverStripe\Forms\Form;
  use SilverStripe\Forms\RequiredFields;
  use SilverStripe\Control\Email\Email;

  class ContactPageController extends PageController 
  {
      private static $allowed_actions = ['Form'];
      
      public function Form() 
      {
          $fields = new FieldList( 
              new TextField('Name'), 
              new EmailField('Email'), 
              new TextareaField('Message')
          ); 
          
          $actions = new FieldList( 
              new FormAction('submit', 'Submit') 
          ); 

          $validator = new RequiredFields('Name', 'Message');

          $form = new Form($this, 'Form', $fields, $actions, $validator);

          return $form;
      }

      public function submit($data, $form) 
      { 
          $email = new Email(); 
           
          $email->setTo('thomashdoughty@gmail.com'); 
          $email->setFrom($data['Email']); 
          $email->setSubject("Contact Message from {$data["Name"]}"); 
          $email->setBody(" 
            <p><strong>Name:</strong> {$data['Name']}</p> 
            <p><strong>Message:</strong> {$data['Message']}</p> 
          "); 
          $email->send(); 

          $submission = Contact::create();
          $form->saveInto($submission);
          $submission->write();

          $form->sessionMessage('Saved!', 'success');
          return $this->redirectBack();
      }
  }
}
