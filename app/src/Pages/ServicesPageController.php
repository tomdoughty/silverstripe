<?php

use SilverStripe\ORM\ArrayList;
use SilverStripe\View\ArrayData;

class ServicesPageController extends PageController
{
  protected function init()
  {
    parent::init();
  }

  public function Services()
  {
    $services = [];

    foreach (range('A', 'Z') as $letter) {
      $pagesByLetter = ServicePage::get()->filter([
        'Title:StartsWith' => $letter
      ]);

      $services[$letter] = ArrayData::create([
        'Letter' => $letter,
        'Pages' => $pagesByLetter,
      ]);
    }

    return ArrayList::create(array_values($services));
  }
}
