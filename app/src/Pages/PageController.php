<?php

namespace {

  use TomDoughty\Web\Models\Slide;
  use SilverStripe\CMS\Controllers\ContentController;

  class PageController extends ContentController
  {
    private static $allowed_actions = [];

    protected function init() {
        parent::init();
    }

    public function EnabledSlides() {
      return $this->Slides()->filter('Display', true);
    }

  }
}
