<?php

use SilverStripe\Forms\GridField\GridField;
use SilverStripe\Forms\GridField\GridFieldConfig_RecordEditor;

class NewsHolderPage extends Page
{
  private static $has_many = [
    'Categories' => NewsCategory::class,
  ];

	private static $allowed_children = [
		NewsPage::class
	];

  public function getCMSFields()
  {
    $fields = parent::getCMSFields();
    $fields->addFieldToTab('Root.Categories', GridField::create(
      'Categories',
      'News categories',
      $this->Categories(),
      GridFieldConfig_RecordEditor::create()
    ));

    return $fields;
  }
}