<?php

use SilverStripe\Forms\DateField;
use SilverStripe\Forms\TextareaField;
use SilverStripe\Forms\TextField;
use SilverStripe\Assets\Image;
use SilverStripe\AssetAdmin\Forms\UploadField;
use SilverStripe\Forms\CheckboxSetField;

class NewsPage extends Page
{
	private static $can_be_root = false;

	private static $db = [
		'Date' => 'Date',
		'Teaser' => 'Text',
		'BlogAuthor' => 'Text'
	];

  private static $has_one = [
    'Image' => Image::class
  ];

  private static $many_many = [
    'Categories' => NewsCategory::class
  ];

  private static $owns = [
    'Image'
  ];

	public function getCMSFields()
	{
		$fields = parent::getCMSFields();
    
    $fields->addFieldToTab('Root.Main', DateField::create('Date', 'Date of article'), 'Content');
    
    $fields->addFieldToTab('Root.Main', TextareaField::create('Teaser')
			->setDescription('This is the summary that appears on the article list page.'),
			'Content'
    );
    
    $fields->addFieldToTab('Root.Main', TextField::create('BlogAuthor', 'Author'), 'Content');
    
		$fields->addFieldToTab(
			'Root.Attachments',
			$image = UploadField::create('Image')
    );
    
		$image->setFolderName('news');
		
    $fields->addFieldToTab('Root.Categories', CheckboxSetField::create(
      'Categories',
      'Selected categories',
      $this->Parent()->Categories()->map('ID','Title')
    ));
    
		return $fields;
	}

  public function CategoriesList()
  {
    if($this->Categories()->exists()) {
      return implode(', ', $this->Categories()->column('Title'));
    }

    return null;
  }

  public function PrevArticle() {
    return NewsPage::get()
      ->filter([
        'ParentID' => $this->ParentID,
        'Date:LessThan' => $this->Date
      ])
      ->sort('Date ASC')
      ->limit('1')
      ->first();
  }

  public function NextArticle() {
    return NewsPage::get()
      ->filter([
        'ParentID' => $this->ParentID,
        'Date:GreaterThan' => $this->Date
      ])
      ->sort('Date ASC')
      ->limit('1')
      ->first();
  }
}