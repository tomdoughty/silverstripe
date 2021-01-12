<?php

use SilverStripe\Control\RSS\RSSFeed;
use SilverStripe\ORM\PaginatedList;
use SilverStripe\Control\HTTPRequest;

class NewsHolderPageController extends PageController
{
  private static $allowed_actions = [
    'category',
    'rss'
  ];

  protected $results;

  protected function init ()
  {
    parent::init();

    RSSFeed::linkToFeed($this->Link("rss"), "10 Most Recent News Articles");

    $this->results = NewsPage::get()->filter([
      'ParentID' => $this->ID
    ])->sort('Date DESC');
  }

  public function category (HTTPRequest $request)
  {
    $category = NewsCategory::get()->byID(
      $request->param('ID')
    );

    if(!$category) {
      return $this->httpError(404);
    }

    $this->results = $this->results->filter([
      'Categories.ID' => $category->ID
    ]);

    return [
      'SelectedCategory' => $category
    ];
  }

  public function rss() 
  {
    return RSSFeed::create(
        $this->Results(10), 
        $this->Link(), 
        "10 Most Recent News Articles", 
        "Shows a list of the most recent news articles."
    )->outputToBrowser();
  }

  public function Results ($pages = 2)
  {
    return PaginatedList::create(
      $this->results,
      $this->getRequest()
    )->setPageLength($pages);
  }
}