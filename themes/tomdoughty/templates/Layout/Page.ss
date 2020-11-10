
<h1>$Title</h1>
$Content
<% loop $EnabledSlides %>
  <picture>
    <source media="(min-width: 481px)" srcset="$Image.ScaleMaxWidth(600).URL 1x, $Image.ScaleMaxWidth(1200).URL 2x" type="image/jpeg">
    <source media="(max-width: 480px)" srcset="$Image.ScaleMaxWidth(480).URL" type="image/jpeg">
    <img src="$Image.ScaleMaxWidth(600).URL" alt="$Image.Title" type="image/jpeg">
  </picture>
<% end_loop %>
$Form
$CommentsForm
