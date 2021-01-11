<?php

use SilverStripe\ORM\DataObject;;
use SilverStripe\Assets\Image;
use SilverStripe\AssetAdmin\Forms\UploadField;
use SilverStripe\Forms\FieldList;
use SilverStripe\Forms\CheckboxSetField;
use SilverStripe\Forms\RequiredFields;

class HomepageSlide extends DataObject {
  
  private static $table_name = 'HomepageSlide';

  private static $db = [
    'Display' => 'Boolean',
    'SortOrder' => 'Int'
  ];
  
  private static $has_one = [
    'Page' => HomePage::class,
    'Image' => Image::class
  ];

  private static $summary_fields = [
      'Image.CMSThumbnail' => 'Image',
      'Display.Nice' => 'Enabled?'
  ];

  private static $defaults = [
    'Display' => true,
  ];

  private static $owns = [
    'Image'
  ];

  private static $indexes = [
    'SortOrder' => true,
  ];
  
  private static $default_sort = 'SortOrder';

  public function getCMSFields() {
    return FieldList::create(
      UploadField::create('Image', 'Image')
        ->setFolderName('Slides')
        ->setCustomValidationMessage('You must upload an image.'),
      CheckboxSetField::create('Display', 'Enabled?', [1 => 'Yes'])
    );
  }
    
  public function getCMSValidator() {
    return new RequiredFields([
      'Image'
    ]);
  }

}
