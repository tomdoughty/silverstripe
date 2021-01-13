<?php

use SilverStripe\View\ViewableData;

class SearchResultViewModel extends ViewableData
{
  private static $casting = [
    'Title' => 'Varchar(200)',
    'Link' => 'Text',
    'Content' => 'HTMLText',
    'TitleRelevance' => 'Int',
    'Relevance' => 'Float',
  ];

  private $obj;

  public static function create(...$args)
  {
    return new SearchResultViewModel($args[0]);
  }

  public function __construct($obj)
  {
    parent::__construct();
    $this->obj = $obj;
  }

  public function getID()
  {
    switch ($this->obj->ClassName) {
      case Consultant::class:
        return sprintf('Consultant_%d', $this->obj->ID);
      default:
        return sprintf('SiteTree_%d', $this->obj->ID);
    }
  }

  public function getTitle()
  {
    switch ($this->obj->ClassName) {
      case Consultant::class:
        return $this->obj->Title();
      default:
        return $this->obj->Title;
    }
    return $this->obj->Title;
  }

  public function getLink()
  {
    return $this->obj->AbsoluteLink();
  }

  public function getContent()
  {
    switch ($this->obj->ClassName) {
      case Consultant::class:
        $designations = [];
        if (!empty($this->obj->Message)) {
          $designations[] = $this->obj->Message;
        }
        return implode(', ', $designations);
      default:
        return $this->obj->Content;
    }
  }

  public function getTitleRelevance()
  {
    return $this->obj->_SortColumn0;
  }

  public function getRelevance()
  {
    return $this->obj->_SortColumn1;
  }
}
