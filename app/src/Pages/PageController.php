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

    $homepage = Page::get()->Filter([
      'URLSegment' => 'home'
    ])->First();

    if ($this->ID != $homepage->ID) {
      $breadcrumbs->push($homepage);

      foreach ($this->getAncestors() as $ancestor) {
        $breadcrumbs->push($ancestor);
      }
    }

    return $breadcrumbs;
  }
}
