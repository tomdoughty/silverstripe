<?php

use SilverStripe\Admin\ModelAdmin;

class SitesAdmin extends ModelAdmin
{

  private static $managed_models = [
    Site::class
  ];

  private static $url_segment = 'sites';

  private static $menu_title = 'Sites';
}
