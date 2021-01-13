<?php

use SilverStripe\CMS\Controllers\ContentController;
use SilverStripe\ORM\ArrayList;

class PageController extends ContentController
{
  protected function init()
  {
    parent::init();
  }

  public function Breadcrumbs()
  {
    $breadcrumbs = ArrayList::create();

    if ($this->ClassName != 'HomePage') {
      $breadcrumbs->push(HomePage::get()->First());

      foreach ($this->getAncestors() as $ancestor) {
        $breadcrumbs->push($ancestor);
      }
    }

    return $breadcrumbs;
  }
}
