<?php

use SilverStripe\CMS\Model\SiteTree;
use SilverStripe\Core\Convert;
use SilverStripe\ORM\ArrayList;
use SilverStripe\ORM\PaginatedList;
use SilverStripe\Control\HTTPRequest;

class SearchPageController extends PageController
{
  private static $allowed_actions = [
    'json'
  ];

  private $results;

  private function setResults()
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
  }

  public function Results()
  {
    $this->setResults();
   
    return PaginatedList::create($this->results, $this->getRequest())
      ->setPageLength(2);;
  }

  public function json(HTTPRequest $request) {
    $this->response->addHeader('Content-Type', 'application/json');    
  
    $this->setResults();
    
    $suggestions = [];

    foreach ($this->results as $page) {
      $suggestion = [];
      $suggestion['Title'] = $page->Title;
      $suggestion['Link'] = $page->Link();

      array_push($suggestions, $suggestion);
    }
    
    return json_encode($suggestions);
  }

  public function Query()
  {
    return $this->request->getVar('Query');
  }
}
