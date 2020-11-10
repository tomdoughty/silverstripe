<?php

namespace {
  
  use SilverStripe\Admin\ModelAdmin;
  use SilverStripe\Forms\GridField\GridField;
  use UndefinedOffset\SortableGridField\Forms\GridFieldSortableRows;
  
  class ContactAdmin extends ModelAdmin {
    
    private static $managed_models = [
      'Contact'
    ];
    
    private static $url_segment = 'contacts';
    
    private static $menu_title = 'Contacts';

    public function getEditForm($id = null, $fields = null) {
      $form=parent::getEditForm($id, $fields);
      
      if ($this->modelClass === 'Contact') {
        $gridField = $form->Fields()->dataFieldByName($this->sanitiseClassName($this->modelClass));
        
        if($gridField instanceof GridField) {
          $gridField->getConfig()->addComponent($sortable = new GridFieldSortableRows('SortOrder'));
          $sortable->setAppendToTop(true);
        }
      }

      return $form;
    }
  }
}
