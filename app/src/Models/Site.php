<?php

use SilverStripe\ORM\DataObject;
use SilverStripe\Forms\FieldList;
use SilverStripe\Forms\CheckboxSetField;

class Site extends DataObject
{
  private static $db = [
    'Code' => 'Varchar(255)',
    'Name' => 'Varchar(255)',
    'AddressOne' => 'Varchar(255)',
    'AddressTwo' => 'Varchar(255)',
    'Town' => 'Varchar(255)',
    'City' => 'Varchar(255)',
    'Postcode' => 'Varchar(255)',
    'Latitude' => 'Varchar(255)',
    'Longitude' => 'Varchar(255)',
    'FirstDose' => 'Boolean',
    'AstraZenecaDoseTwo' => 'Boolean',
    'PfizerDoseTwo' => 'Boolean',
    'ModernaDoseTwo' => 'Boolean',
    'BoosterDose' => 'Boolean',
    'DoseThree' => 'Boolean',
  ];

  private static $summary_fields = [
    'Name'
  ];

  private static $default_sort = 'Name';

  // public function getCMSFields()
  // {
  //   return FieldList::create(
  //     CheckboxSetField::create('FirstDose', 'First Dose', [1 => 'Yes'])
  //   );
  // }
  
  public function Address()
  {
    $fields = [];
    foreach (['AddressOne', 'AddressTwo', 'Town', 'City', 'Postcode'] as $part) {
      if (!empty($this->$part)) {
        $fields[] = $this->$part;
      }
    }
    return implode(', ', $fields);
  }

  public function onBeforeWrite()
  {
    $postcodeData = json_decode(file_get_contents(sprintf(
      'https://api.postcodes.io/postcodes/%s',
      $this->owner->Postcode
    )));
    
    $this->owner->Latitude = $postcodeData->result->latitude;
    $this->owner->Longitude = $postcodeData->result->longitude;

    parent::onBeforeWrite();
  }
}
