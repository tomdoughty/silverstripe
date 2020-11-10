<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <meta name="description" content="$MetaDescription">
  <link rel="canonical" href="$AbsoluteLink">

  <title><% if $MetaTitle %>$MetaTitle<% else %>$Title<% end_if %> - $SiteConfig.Title</title>
  
  <link href="https://assets.nhs.uk/" rel="preconnect" crossorigin>
  <link type="font/woff2" href="https://assets.nhs.uk/fonts/FrutigerLTW01-55Roman.woff2" rel="preload" as="font" crossorigin>
  <link type="font/woff2" href="https://assets.nhs.uk/fonts/FrutigerLTW01-65Bold.woff2" rel="preload" as="font" crossorigin>
  
  <link rel="stylesheet" type="text/css" href="$ThemeDir/css/main.css" />

  <link rel="shortcut icon" href="$ThemeDir/images/favicon.ico" />
  <meta property="og:url" content="$AbsoluteLink">
  <meta property="og:site_name" content="$SiteConfig.Title">
  <meta property="og:title" content="$Title"/>
  <meta property="og:description" content="$MetaDescription">
  <meta property="og:type" content="website">
  <meta property="og:locale" content="en_GB">
  <meta property="og:image" content="$ShareImage.AbsoluteURL">

  <script type="text/javascript" src="$ThemeDir/javascript/main.js" defer></script>
</head>
<body>
  <% include Header %>
  <div class="width-container">
    <main class="main-wrapper" id="maincontent">
      $Layout
    </main>
  </div>
  <% include Footer %>
</body>
</html>
