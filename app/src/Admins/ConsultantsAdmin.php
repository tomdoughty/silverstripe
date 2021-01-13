<?php

use SilverStripe\Admin\ModelAdmin;

class ConsultantAdmin extends ModelAdmin
{

  private static $managed_models = [
    Consultant::class
  ];

  private static $url_segment = 'consultants';

  private static $menu_title = 'Consultants';
}
