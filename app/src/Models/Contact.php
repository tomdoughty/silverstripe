<?php

namespace {

  use SilverStripe\CMS\Model\SiteTree;
  use SilverStripe\ORM\DataObject;

  class Contact extends DataObject {

    private static $create_table_options = [
        'MySQLDatabase' => 'ENGINE=MyISAM'
    ];
    
    private static $db = [
      'Name' => 'Varchar(255)',
      'Email' => 'Varchar(255)',
      'Message' => 'Text',
      'SortOrder' => 'Int'
    ];
    
    private static $summary_fields = [
        'Name',
        'Email'
    ];

    private static $indexes = [
      'SortOrder' => true,
    ];
    
    private static $default_sort = 'SortOrder';
  
  }
}