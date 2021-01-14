<?php

use SilverStripe\Control\RSS\RSSFeed;
use SilverStripe\ORM\PaginatedList;
use SilverStripe\Control\HTTPRequest;
use SilverStripe\ORM\FieldType\DBField;

class NewsHolderPageController extends PageController
{
  private static $allowed_actions = [
    'category',
    'date',
    'rss'
  ];

  protected $results;
  protected $totalCount;

  protected function init()
  {
    parent::init();

    RSSFeed::linkToFeed($this->Link("rss"), "10 Most Recent News Articles");
    
    $results = $this->LatestTweets(200);

    $news = NewsPage::get()->filter([
      'ParentID' => $this->ID
    ]);

    foreach ($news as $page) {
      $results->push($page);
    }

    $this->results = $results->sort(['Date DESC']);
    $this->resultsCount = $this->results->Count();
  }

  public function category(HTTPRequest $request)
  {
    $category = NewsCategory::get()->byID(
      $request->param('ID')
    );

    if (!$category) {
      return $this->httpError(404);
    }

    $this->results = $this->results->filter([
      'Categories.ID' => $category->ID
    ]);

    return [
      'SelectedCategory' => $category
    ];
  }

  public function date(HTTPRequest $request)
  {
    $year = $request->param('ID');
    $month = $request->param('OtherID');

    if (!$year) return $this->httpError(404);

    $startDate = $month ? "{$year}-{$month}-01" : "{$year}-01-01";

    if (strtotime($startDate) === false) {
      return $this->httpError(404, 'Invalid date');
    }

    $adder = $month ? '+1 month' : '+1 year';
    $endDate = date('Y-m-d', strtotime(
      $adder,
      strtotime($startDate)
    ));

    $this->results = $this->results->filter([
      'Date:GreaterThanOrEqual' => $startDate,
      'Date:LessThan' => $endDate
    ]);

    return [
      'StartDate' => DBField::create_field('Date', $startDate),
      'EndDate' => DBField::create_field('Date', $endDate)
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

  public function ArticleCount()
  {
    return $this->resultsCount;
  }

  public function Results($pages = 10)
  {
    return PaginatedList::create(
      $this->results,
      $this->getRequest()
    )->setPageLength($pages);
  }
}
