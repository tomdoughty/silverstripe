<?php

use SilverStripe\Forms\GridField\GridField;
use SilverStripe\Forms\GridField\GridFieldConfig_RelationEditor;
use UndefinedOffset\SortableGridField\Forms\GridFieldSortableRows;

class HomePage extends Page 
{
  private static $has_many = [
    'Slides' => Slide::class
  ];

  public function HideBreadcrumb()
  {
    return true;
  }

  public function getCMSFields()
  {
    $fields = parent::getCMSFields();

    $fields->addFieldToTab(
      'Root.Slides',
      GridField::create('Slides', 'Slides', $this->Slides(),
        GridFieldConfig_RelationEditor::create()->addComponents(
          new GridFieldSortableRows('SortOrder')
        )
      )
    );
    
    return $fields;
  }
}
