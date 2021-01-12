<?php

use SilverStripe\ORM\DataObject;
use SilverStripe\Forms\FieldList;
use SilverStripe\Forms\TextField;

class NewsCategory extends DataObject {

  private static $table_name = 'NewsCategory';

  private static $db = [
    'Title' => 'Varchar'
  ];

  private static $has_one = [
    'ArticleHolder' => NewsHolderPage::class
  ];

  private static $belongs_many_many = [
    'Articles' => NewsPage::class
  ];

  public function getCMSFields()
  {
    return FieldList::create(
      TextField::create('Title')
    );
  }

  public function Link()
  {
    return $this->ArticleHolder()->Link(
      'category/'.$this->ID
    );
  }

  public function ArticleCount()
  {
    return $this->Articles()->Count();
  }
}
