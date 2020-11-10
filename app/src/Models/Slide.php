<?php

namespace TomDoughty\Web\Models;

use SilverStripe\CMS\Model\SiteTree;
use SilverStripe\ORM\DataObject;
use SilverStripe\Assets\Image;
use SilverStripe\Forms\FieldList;
use SilverStripe\AssetAdmin\Forms\UploadField;
use SilverStripe\Forms\CheckboxSetField;

class Slide extends DataObject {
  
  private static $table_name = 'Slide';

  private static $db = [
    'Display' => 'Boolean',
    'SortOrder' => 'Int'
  ];
  
  private static $has_one = [
    'Page' => 'Page',
    'Image' => Image::class,
  ];

  private static $summary_fields = [
      'Image.CMSThumbnail' => 'Image',
      'Display.Nice' => 'Enabled?',
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
      UploadField::create('Image', 'Image')->setFolderName('Slides'),
      CheckboxSetField::create('Display', 'Enabled?', [1 => 'Yes'])
    );
  }

}
