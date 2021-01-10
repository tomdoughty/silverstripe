<?php

use SilverStripe\CMS\Controllers\ContentController;

class PageController extends ContentController
{
  private static $allowed_actions = [];

  protected function init() 
  {
      parent::init();
  }

  public function Breadcrumbs()
  {
    if ($this->HideBreadcrumb() == true) 
    {
      return false;
    }
    if ($this->ParentID == 0) 
    {
      return HomePage::get();
    }
    return $this->getAncestors();
  }

}
