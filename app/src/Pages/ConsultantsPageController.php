<?php

use SilverStripe\ORM\ArrayList;
use SilverStripe\View\ArrayData;
use SilverStripe\Control\HTTPRequest;
use SilverStripe\Control\HTTPResponse_Exception;

class ConsultantsPageController extends PageController
{
  private static $allowed_actions = [
    'consultant'
  ];

  private static $url_handlers = [
    '$ID!' => 'consultant',
  ];
  
  protected function init()
  {
    parent::init();
  }

  public function Consultants()
  {
    $consultants = [];

    foreach (range('A', 'Z') as $letter) {
      $consultantsByLetter = Consultant::get()->filter([
        'LastName:StartsWith' => $letter
      ])->Sort('LastName', 'ASC');

      $consultants[$letter] = ArrayData::create([
        'Letter' => $letter,
        'Pages' => $consultantsByLetter,
      ]);
    }

    return ArrayList::create(array_values($consultants));
  }

  public function consultant()
  {
    $consultant = Consultant::get()->filter([
      'Slug' => $this->request->param('ID')
    ])->First();

    $breadcrumbs = $this->Breadcrumbs();
    foreach ($this->Parent()->getAncestors() as $ancestor) {
      $breadcrumbs->push($ancestor);
    }
    $breadcrumbs->push($this);

    return [
      'Consultant' => $consultant,
      'Breadcrumbs' => $breadcrumbs
    ];
  }
}
