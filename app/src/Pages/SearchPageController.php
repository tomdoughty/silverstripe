<?php

use SilverStripe\CMS\Model\SiteTree;
use SilverStripe\Core\Convert;
use SilverStripe\ORM\ArrayList;
use SilverStripe\ORM\PaginatedList;

class SearchPageController extends PageController
{
  private $results;

  public function Results()
  {
    if (is_null($this->results)) {
      $this->results = ArrayList::create();
      if ($query = $this->request->getVar('Query')) {
        $pages = SiteTree::get()->where(sprintf(
          "MATCH (%s) AGAINST ('%s*' IN BOOLEAN MODE) AND " .
          "ShowInSearch IS TRUE AND ClassName NOT IN ('RedirectorPage', 'VirtualPage')",
          implode(",", singleton(SiteTree::class)->stat('indexes')['SearchFields']['columns']),
          Convert::raw2sql($query)
        ))->sort(sprintf(
          "Title LIKE '%%%s%%' DESC, MATCH (%s) AGAINST ('%s*') DESC",
          Convert::raw2sql($query),
          implode(",", singleton(SiteTree::class)->stat('indexes')['SearchFields']['columns']),
          Convert::raw2sql($query)
        ));

        $this->results = $pages;
      }
    }
    return PaginatedList::create($this->results, $this->getRequest())
      ->setPageLength(2);;
  }

  public function Query()
  {
    return $this->request->getVar('Query');
  }
}
