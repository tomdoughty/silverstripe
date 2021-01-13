<?php

use SilverStripe\AssetAdmin\Forms\UploadField;
use SilverStripe\Assets\Image;
use SilverStripe\Forms\FieldList;
use SilverStripe\Forms\ToggleCompositeField;
use SilverStripe\Forms\TextField;
use SilverStripe\Forms\TextAreaField;
use SilverStripe\Forms\FieldGroup;
use SilverStripe\Forms\LiteralField;
use SilverStripe\ORM\Connect\MySQLSchemaManager;
use SilverStripe\ORM\DataExtension;

class SiteTree extends DataExtension
{

  private static $db = [
    'MetaTitle' => 'Varchar(200)',
    'MetaDescription' => 'Text',
    'MetaKeywords' => 'Text',
    'MetaRobots' => 'Varchar(200)',
    'ExtraMeta' => 'Text'
  ];

  private static $has_one = [
    'ShareImage' => Image::class
  ];

  private static $indexes = [
    'SearchFields' => [
      'type' => 'fulltext',
      'columns' => ['Title', 'MenuTitle', 'Content'],
    ],
  ];

  private static $create_table_options = [
    MySQLSchemaManager::ID => 'ENGINE=MyISAM',
  ];

  public function updateCMSFields(FieldList $fields)
  {
    $fields->removeByName('MetaTitle');
    $fields->removeByName('MetaDescription');
    $fields->removeByName('MetaKeywords');
    $fields->removeByName('MetaRobots');
    $fields->removeByName('ExtraMeta');
    $fields->removeByName('Metadata');

    $fields->addFieldToTab(
      'Root.Main',
      FieldGroup::create(
        LiteralField::create('Wave audit', sprintf('<a href="https://wave.webaim.org/report#/%s" target="_blank" style="display: inline-block; padding-top: .5385rem">Run Wave accessibility audit for this page</a>', $this->owner->AbsoluteLink()))
      )->setTitle('Wave audit'),
      'MenuTitle'
    );

    $fields->addFieldToTab(
      'Root.Main',
      ToggleCompositeField::create('Metadata', 'Metadata', FieldList::create(
        TextField::create('MetaTitle', 'Title')
          ->setAttribute('placeholder', $this->owner->Title)
          ->setMaxLength(90),
        TextareaField::create('MetaDescription', 'Description')
          ->setRows(3)
          ->setAttribute('placeholder', $this->owner->GetDefaultDescription())
          ->setMaxLength(170),
        UploadField::create('ShareImage', 'Share Image')
          ->setFolderName('Share images')
          ->setAllowedFileCategories('image')
          ->setAllowedMaxFileNumber(1)
          ->setDescription('<a href="https://developers.facebook.com/docs/sharing/best-practices#images" target="_blank">Optimum image ratio</a>&nbsp;is 1.91:1. (1200px wide by 650px tall or better)')
      ))->setHeadingLevel(4)
    );
  }

  public function MetaTitle()
  {
    return $this->owner->MetaTitle ? $this->owner->MetaTitle : $this->owner->Title;
  }

  public function GetDefaultDescription()
  {
    if ($this->owner->Content) {
      $description = trim($this->owner->obj('Content')->Summary(20, 5));
      if (!empty($description)) {
        return $description;
      }
    }
    return null;
  }

  public function MetaDescription()
  {
    return $this->owner->MetaDescription ? $this->owner->MetaDescription : $this->owner->GetDefaultDescription();
  }
}
