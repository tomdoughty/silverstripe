<?php

use SilverStripe\ORM\DataExtension;
use SilverStripe\Forms\FieldList;
use SilverStripe\Forms\Tab;
use SilverStripe\Forms\CheckboxSetField;
use SilverStripe\Forms\HTMLEditor\HTMLEditorField;
use SilverStripe\Forms\TextField;

class SiteConfig extends DataExtension
{
  private static $db = [
    'EmergencyBannerEnabled' => 'Boolean',
    'EmergencyBannerContent' => 'HTMLText',
    'GoogleAnalyticsCode' => 'Varchar(200)'
  ];

  private static $defaults = [
    'EmergencyBannerEnabled' => false,
  ];

  public function updateCMSFields(FieldList $fields)
  {
    $fields->insertAfter(Tab::create(
      'Emergency Banner',
      CheckboxSetField::create('EmergencyBannerEnabled', 'Enabled?', [1 => 'Yes']),
      HTMLEditorField::create('EmergencyBannerContent', 'Content')
    ), 'Access');

    $fields->insertAfter(Tab::create(
      'Google Analytics',
      TextField::create('GoogleAnalyticsCode', 'Google Analytics Code')
    ), 'Emergency Banner');
  }
}
