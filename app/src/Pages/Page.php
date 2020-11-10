<?php

namespace {

  use TomDoughty\Web\Models\Slide;
  use SilverStripe\Forms\GridField\GridField;
  use SilverStripe\Forms\GridField\GridFieldConfig_RelationEditor;
  use SilverStripe\CMS\Model\SiteTree;
  use UndefinedOffset\SortableGridField\Forms\GridFieldSortableRows;

  class Page extends SiteTree {
    private static $db = [];

    private static $has_one = [];

    private static $has_many = [
      'Slides' => Slide::class,
      'HeaderRolloverSections' => HeaderRolloverSection::class,
    ];
  
    public function getCMSFields() {
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
}
