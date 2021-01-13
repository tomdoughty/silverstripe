<?php

use SilverStripe\Forms\TextareaField;
use SilverStripe\Forms\TextField;
use SilverStripe\Forms\GridField\GridField;
use SilverStripe\Forms\GridField\GridFieldConfig_RelationEditor;
use UndefinedOffset\SortableGridField\Forms\GridFieldSortableRows;

class HomePage extends Page
{
  private static $db = [
    'BannerTitle' => 'Text',
    'BannerContent' => 'Text'
  ];

  private static $has_many = [
    'HomepageSlides' => HomepageSlide::class
  ];

  public function getCMSFields()
  {
    $fields = parent::getCMSFields();

    $fields->addFieldToTab('Root.Hero', TextField::create('BannerTitle', 'Title'));

    $fields->addFieldToTab('Root.Hero', TextareaField::create('BannerContent', 'Content'));

    $fields->addFieldToTab(
      'Root.Hero',
      GridField::create(
        'HomepageSlides',
        'Slides',
        $this->HomepageSlides(),
        GridFieldConfig_RelationEditor::create()->addComponents(
          new GridFieldSortableRows('SortOrder')
        )
      )
    );

    return $fields;
  }
}
