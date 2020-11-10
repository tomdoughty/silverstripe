
<h1>$Title</h1>
$Content
<picture>
  <source media="(min-width: 481px)" srcset="$ShareImage.ScaleMaxWidth(600).URL 1x, $ShareImage.ScaleMaxWidth(1200).URL 2x" type="image/jpeg">
  <source media="(max-width: 480px)" srcset="$ShareImage.ScaleMaxWidth(480).URL" type="image/jpeg">
  <img src="$ShareImage.ScaleMaxWidth(600).URL" alt="$ShareImage.Title" type="image/jpeg">
</picture>
$Form
$CommentsForm
