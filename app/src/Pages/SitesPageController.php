<?php

use SilverStripe\ORM\ArrayList;
use SilverStripe\View\ArrayData;

class SitesPageController extends PageController
{
  private static $allowed_actions = [
    'Results',
    'Profile'
  ];

  private static $url_handlers = [
    'results' => 'Results',
    'profile/$Id' => 'Profile',
  ];
  
  protected function init()
  {
    parent::init();
  }

  private function distance($latitudeFrom, $longitudeFrom, $latitudeTo, $longitudeTo)
  {
      $rad = M_PI / 180;
      //Calculate distance from latitude and longitude
      $theta = $longitudeFrom - $longitudeTo;
      $dist = sin($latitudeFrom * $rad) 
          * sin($latitudeTo * $rad) +  cos($latitudeFrom * $rad)
          * cos($latitudeTo * $rad) * cos($theta * $rad);
  
      return acos($dist) / $rad * 60;
  }

  public function Results()
  {
    $sites = ArrayList::create();;
    $postcode = $this->request->getVar('postcode');

    $postcodeDataRaw = @file_get_contents(sprintf(
      'https://api.postcodes.io/postcodes/%s',
      $postcode
    ));

    $postcodeData = json_decode($postcodeDataRaw);

    if ($postcodeData) {
      $fromLatitude = $postcodeData->result->latitude;
      $fromLongitude = $postcodeData->result->longitude;

      foreach (Site::get() as $site) {
        $site->Distance = round($this->distance(
          $fromLatitude,
          $fromLongitude,
          $site->Latitude,
          $site->Longitude
        ), 2);

        $site->DirectionsUrl = sprintf("http://maps.google.com/maps/dir/?api=1&amp;origin=%s,%s&amp;destination=%s&amp;t=m", $fromLatitude, $fromLongitude, urlencode($site->Address()));
        $sites->push($site);
      }

      $sites = $sites->sort('Distance');
    }

    $breadcrumbs = $this->Breadcrumbs();
    foreach ($this->Parent()->getAncestors() as $ancestor) {
      $breadcrumbs->push($ancestor);
    }
    $breadcrumbs->push($this);
    
    return [
      'Sites' => $sites,
      'Postcode' => $postcode,
      'Breadcrumbs' => $breadcrumbs
    ];
  }

  public function Profile()
  {
    $site = Site::get()->byID($this->request->param('Id'));

    $breadcrumbs = $this->Breadcrumbs();
    foreach ($this->Parent()->getAncestors() as $ancestor) {
      $breadcrumbs->push($ancestor);
    }
    $breadcrumbs->push($this);

    return [
      'Site' => $site,
      'Breadcrumbs' => $breadcrumbs
    ];
  }
}
