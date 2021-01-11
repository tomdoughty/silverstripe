<?php

use SilverStripe\CMS\Model\SiteTree;

class Page extends SiteTree 
{
  private static $db = [];

  private static $has_one = [];

  private static $has_many = [];

  public function getCMSFields()
  {
    $fields = parent::getCMSFields();      
    return $fields;
  }

  public function OneLess($num)
  {
    return $num - 1;
  }

  public function OneMore($num)
  {
    return $num + 1;
  }
}
