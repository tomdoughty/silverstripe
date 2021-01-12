<?php

use SilverStripe\CMS\Model\SiteTree;
use SilverStripe\Core\Convert;
use SilverStripe\ORM\ArrayList;
use SilverStripe\ORM\PaginatedList;
use SilverStripe\Control\HTTPRequest;

class SearchPageController extends PageController
{
  private static $allowed_actions = [
    'json',
    'print'
  ];

  private $results;
  private $query;

  protected function init ()
  {
    parent::init();

    $this->query = $this->request->getVar('Query');

    $this->results = SiteTree::get()
      ->where(sprintf(
        "MATCH (%s) AGAINST ('%s*' IN BOOLEAN MODE) AND " .
        "ShowInSearch IS TRUE AND ClassName NOT IN ('RedirectorPage', 'VirtualPage')",
        implode(",", singleton(SiteTree::class)->stat('indexes')['SearchFields']['columns']),
        Convert::raw2sql($this->query)
      ))
      ->sort(sprintf(
        "Title LIKE '%%%s%%' DESC, MATCH (%s) AGAINST ('%s*') DESC",
        Convert::raw2sql($this->query),
        implode(",", singleton(SiteTree::class)->stat('indexes')['SearchFields']['columns']),
        Convert::raw2sql($this->query)
      ));
  }

  public function Query() {
    return $this->query;
  }
 
  public function Results()
  {
    return PaginatedList::create(
      $this->results,
      $this->getRequest()
    )->setPageLength(2);
  }

  public function json(HTTPRequest $request) {   
   
    $suggestions = [];

    foreach ($this->results as $page) {
      $suggestion = [];
      $suggestion['Title'] = $page->Title;
      $suggestion['Link'] = $page->Link();

      array_push($suggestions, $suggestion);
    }
    
    $this->response->addHeader('Content-Type', 'application/json'); 
    return json_encode($suggestions);
  }
}
