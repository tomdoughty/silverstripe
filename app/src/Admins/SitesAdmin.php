<?php

use SilverStripe\Admin\ModelAdmin;
use SilverStripe\Dev\CsvBulkLoader;

class SitesAdmin extends ModelAdmin
{

  private static $managed_models = [
    Site::class
  ];

  private static $url_segment = 'sites';

  private static $menu_title = 'Sites';

  private static $model_importers = [
    Player::class => CsvBulkLoader::class,
 ];
}
