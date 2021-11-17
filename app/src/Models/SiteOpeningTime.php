<?php

use SilverStripe\ORM\DataObject;
use SilverStripe\Forms\DateField;
use SilverStripe\Forms\TimeField;
use SilverStripe\Forms\FieldList;
use SilverStripe\Forms\RequiredFields;
use SilverStripe\ORM\FieldType\DBTime;

class SiteOpeningTime extends DataObject
{
  private static $table_name = 'SiteOpeningTime';

  private static $db = [
    'Date' => 'Date',
    'OpeningTime' => 'Time',
    'ClosingTime' => 'Time',
    'SortOrder' => 'Int'
  ];

  private static $has_one = [
    'Site' => Site::class
  ];

  private static $indexes = [
    'SortOrder' => true,
  ];

  private static $summary_fields = [
    'Date'
  ];

  private static $default_sort = 'SortOrder';

  public function getCMSFields()
  {
    return FieldList::create(
      DateField::create('Date', 'Date'),
      TimeField::create('OpeningTime', 'Opening time'),
      TimeField::create('ClosingTime', 'Closing time')
    );
  }

  public function FormatTime($field)
  {
    $formatedTime = $this->obj($field)->Format('h.mma');

    return strtolower(str_replace('.00', '', $formatedTime));
  }
}
