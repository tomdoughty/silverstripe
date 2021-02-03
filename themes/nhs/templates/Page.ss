<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <meta name="description" content="$MetaDescription()">
  <link rel="canonical" href="$AbsoluteLink">

  <title>$MetaTitle() - $SiteConfig.Title</title>
  
  <link href="https://assets.nhs.uk/" rel="preconnect" crossorigin>
  <link type="font/woff2" href="https://assets.nhs.uk/fonts/FrutigerLTW01-55Roman.woff2" rel="preload" as="font" crossorigin>
  <link type="font/woff2" href="https://assets.nhs.uk/fonts/FrutigerLTW01-65Bold.woff2" rel="preload" as="font" crossorigin>

  <link rel="stylesheet" type="text/css" href="/public/css/main.css" />

  <link rel="shortcut icon" href="/images/favicons/favicon.ico" type="image/x-icon">
  <link rel="apple-touch-icon" href="/images/favicons/apple-touch-icon-180x180.png">
  <link rel="mask-icon" href="/images/favicons/favicon.svg" color="#005eb8">
  <link rel="icon" sizes="192x192" href="/images/favicons/favicon-192x192.png">
  <meta name="msapplication-TileImage" content="/images/favicons/mediumtile-144x144.png">
  <meta name="msapplication-TileColor" content="#005eb8">
  <meta name="msapplication-square70x70logo" content="/images/favicons/smalltile-70x70.png">
  <meta name="msapplication-square150x150logo" content="/images/favicons/mediumtile-150x150.png">
  <meta name="msapplication-wide310x150logo" content="/images/favicons/widetile-310x150.png">
  <meta name="msapplication-square310x310logo" content="/images/favicons/largetile-310x310.png">

  <meta property="og:url" content="$AbsoluteLink">
  <meta property="og:site_name" content="$SiteConfig.Title">
  <meta property="og:title" content="$MetaTitle()"/>
  <meta property="og:description" content="$MetaDescription()">
  <meta property="og:type" content="website">
  <meta property="og:locale" content="en_GB">
  <meta property="og:image" content="$ShareImage.AbsoluteURL">

  <script src="/public/javascript/main.js" defer></script>
</head>
<body>
  <% include Header %>
  <% include EmergencyBanner %>
  <% include BreadCrumbs %>
  <div class="nhsuk-width-container nhsuk-width-container--full">
    <main class="nhsuk-main-wrapper $ClassName" id="maincontent">
      $Layout
    </main>
  </div>
  <% include Footer %>
</body>
</html>
