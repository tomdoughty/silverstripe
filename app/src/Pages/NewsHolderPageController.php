<?php

use SilverStripe\ORM\PaginatedList;
use SilverStripe\Control\HTTPRequest;
use SilverStripe\ORM\FieldType\DBField;

class NewsHolderPageController extends PageController
{
  private static $allowed_actions = [
    'category',
    //'date'
  ];

  protected $articleList;

  protected function init ()
  {
    parent::init();

    $this->articleList = NewsPage::get()->filter([
      'ParentID' => $this->ID
    ])->sort('Date DESC');
  }

  public function category (HTTPRequest $request)
  {
    $category = NewsCategory::get()->byID(
      $request->getvar('ID')
    );

    if(!$category) {
      return $this->httpError(404);
    }

    $this->articleList = $this->articleList->filter([
      'Categories.ID' => $category->ID
    ]);

    return [
      'SelectedCategory' => $category
    ];
  }

  public function PaginatedArticles ()
  {
    return PaginatedList::create(
      $this->articleList,
      $this->getRequest()
    )->setPageLength(2);
  }
}