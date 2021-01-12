<?php

use SilverStripe\Admin\ModelAdmin;
use SilverStripe\Forms\GridField\GridField;
use UndefinedOffset\SortableGridField\Forms\GridFieldSortableRows;
  
class ConsultantAdmin extends ModelAdmin {
  
  private static $managed_models = [
    Consultant::class
  ];
  
  private static $url_segment = 'consultants';
  
  private static $menu_title = 'Consultants';
}
