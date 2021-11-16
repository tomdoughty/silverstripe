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
    'profile/$Code' => 'Profile',
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
  
      return acos($dist) / $rad * 60 *  1.853;
  }

  public function Results()
  {
    $postcode = $this->request->getVar('postcode');

    $postcodeData = json_decode(file_get_contents(sprintf(
      'https://api.postcodes.io/postcodes/%s',
      $postcode
    )));

    $fromLatitude = $postcodeData->result->latitude;
    $fromLongitude = $postcodeData->result->longitude;

    $sites = ArrayList::create();;

    foreach (Site::get() as $site) {
      $toLatitude = $site->Latitude;
      $toLongitude = $site->Longitude;

      $site->Distance = round($this->distance(
        $fromLatitude,
        $fromLongitude,
        $toLatitude,
        $toLongitude
      ), 2);

      $site->DirectionsUrl = sprintf("http://maps.google.com/maps/dir/?api=1&amp;origin=%s,%s&amp;destination=%s&amp;t=m", $fromLatitude, $fromLongitude, urlencode($site->Address()));
      $sites->push($site);
    }

    $sites = $sites->sort('Distance');

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
    $site = Site::get()->filter([
      'Code' => $this->request->param('Code')
    ])->First();

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
