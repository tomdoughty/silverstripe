<?php

use SilverStripe\ORM\DataObject;
use SilverStripe\Forms\FieldList;
use SilverStripe\Forms\CheckboxField;
use SilverStripe\Forms\TextField;
use SilverStripe\Forms\FieldGroup;
use SilverStripe\Forms\GridField\GridField;
use SilverStripe\Forms\GridField\GridFieldConfig_RelationEditor;
use UndefinedOffset\SortableGridField\Forms\GridFieldSortableRows;

class Site extends DataObject
{
  private static $db = [
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
    'AgeGroup' => 'Varchar(255)'
  ];

  private static $has_many = [
    'OpeningTimes' => SiteOpeningTime::class
  ];

  private static $summary_fields = [
    'Name'
  ];

  private static $default_sort = 'Name';

  private static $defaults = [
    'AgeGroup' => '18 to 90'
  ];

  public function getCMSFields()
  {
    return FieldList::create(
      TextField::create('Name'),
      TextField::create('AddressOne'),
      TextField::create('AddressTwo'),
      TextField::create('Town'),
      TextField::create('City'),
      TextField::create('Postcode'),
      TextField::create('AgeGroup'),
      FieldGroup::create(
        CheckboxField::create('FirstDose', 'Available')
      )->setTitle('First dose availability'),
      FieldGroup::create(
        CheckboxField::create('AstraZenecaDoseTwo', 'AstraZeneca available'),
        CheckboxField::create('PfizerDoseTwo', 'Pfizer available'),
        CheckboxField::create('ModernaDoseTwo', 'Moderna available')
      )->setTitle('Second dose availability'),
      FieldGroup::create(
        CheckboxField::create('BoosterDose', 'Available')
      )->setTitle('Booster availability'),
      FieldGroup::create(
        CheckboxField::create('DoseThree', 'Available')
      )->setTitle('Third dose availability'),
      GridField::create(
        'OpeningTimes',
        'Opening times',
        $this->OpeningTimes(),
        GridFieldConfig_RelationEditor::create()->addComponents(
          new GridFieldSortableRows('SortOrder')
        )
      )
    );
  }
  
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

  public function Link()
  {
    $page = SitesPage::get()->first();
    if (!is_null($page)) {
      return $page->Link(sprintf('profile/%s', $this->ID));
    }
    return null;
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
