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
    return $this->Slides()->filter('Display', true);
  }

}
