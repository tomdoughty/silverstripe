<?php

use SilverStripe\ORM\DataObject;
use SilverStripe\Assets\Image;
use SilverStripe\Control\Director;

class Consultant extends DataObject
{

  private static $table_name = 'Consultant';

  private static $db = [
    'Honorific' => 'Varchar(255)',
    'FirstName' => 'Varchar(255)',
    'LastName' => 'Varchar(255)',
    'Email' => 'Varchar(255)',
    'Message' => 'Text',
    'Slug' => 'Varchar(100)'
  ];

  private static $has_one = [
    'Image' => Image::class,
  ];

  private static $summary_fields = [
    'Name',
    'Email'
  ];

  private static $owns = ['Image'];

  private static $default_sort = 'LastName ASC, FirstName ASC';

  private static $indexes = [
    'SearchFields' => [
      'type' => 'fulltext',
      'columns' => [
        'Honorific', 'FirstName', 'LastName', 'Message'
      ],
    ],
  ];

  public static function FormSlug($value, $separator = '-')
  {
    $slug = str_replace(' ', $separator, strtolower($value));
    $slug = str_replace('&', 'and', $slug);
    $slug = preg_replace('/[^a-z0-9\\' . $separator . ']?/', '', $slug);
    while (stripos($slug, $separator . $separator) !== false) {
      $slug = str_replace($separator . $separator, $separator, $slug);
    }
    return $slug;
  }

  public function Name()
  {
    $names = [];
    foreach (['Honorific', 'FirstName', 'LastName'] as $part) {
      if (!empty($this->$part)) {
        $names[] = $this->$part;
      }
    }
    return implode(' ', $names);
  }

  public function Title()
  {
    return $this->Name();
  }

  public function Link()
  {
    $page = ConsultantsPage::get()->first();
    if (!is_null($page)) {
      return $page->Link($this->Slug);
    }
    return null;
  }

  public function AbsoluteLink()
  {
    $link = $this->Link();
    if (!is_null($link)) {
      return Director::absoluteURL($link);
    }
    return null;
  }

  public function onBeforeWrite()
  {
    $slugged = [
      'Honorific', 'FirstName', 'LastName',
    ];
    $slug = [];
    foreach ($slugged as $field) {
      $slug[] = $this->owner->$field;
    }
    $slug = trim(implode(' ', $slug));
    $this->owner->Slug = $this->FormSlug($slug);

    parent::onBeforeWrite();
  }
}
