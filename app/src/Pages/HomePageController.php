<?php

class HomePageController extends PageController
{
  private static $allowed_actions = [];

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

}
