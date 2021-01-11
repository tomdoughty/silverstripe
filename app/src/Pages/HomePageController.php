<?php

class HomePageController extends PageController
{
  private static $allowed_actions = [
    'sitemap'
  ];

  protected function init()
  {
      parent::init();
  }

  public function EnabledSlides()
  {
    return $this->HomepageSlides()->filter('Display', true);
  }

  public function LatestNews($count = 2)
  {
    return NewsPage::get()
      ->sort('Date DESC')
      ->Limit($count);
  }

  public function sitemap(HTTPRequest $request) {
    $this->response->addHeader('Content-Type', 'application/json');    
  
    $array = [];

    foreach (Page::get() as $page) {
      array_push($array, $page->AbsoluteLink());
    }
    
    $associativeArray = [];
    $associativeArray ['urls'] = $array;
    
    return json_encode($associativeArray);
  }
}
