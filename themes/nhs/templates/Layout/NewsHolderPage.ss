<div class="nhsuk-width-container">
  <div class="nhsuk-grid-row">
    <div class="nhsuk-grid-column-two-thirds">
      <h1>$Title</h1>
      <% if $SelectedCategory %><h2>$SelectedCategory.Title</h2><% end_if %>
      <% if $StartDate %><h2>$StartDate.Format("d MMMM yyyy") to $EndDate.Format("d MMMM yyyy")</h2><% end_if %>
      <% if $Results %>
        <ul class="nhsuk-list nhsuk-list--border nhsuk-u-padding-top-4 ">
          <% loop $Results %>
            <li class="nhsuk-u-padding-bottom-4 nhsuk-u-margin-bottom-4">
              <% if $User %>
                <h2 class="nhsuk-u-visually-hidden">Tweet from @$User</h2>
                <p class="nhsuk-u-margin-bottom-3">
                  <a href="http://www.twitter.com/{$User}" target="_blank">@$User</a>, $Date.Format("d MMMM yyyy")
                </p>
                <p class="nhsuk-u-margin-bottom-4">$Content</p>
                <a href="$Link" target="_blank" class="nhsuk-u-margin-bottom-0 nhsuk-body-s">View on Twitter</a>
              <% else %>
                <h2 class="nhsuk-heading-m nhsuk-u-margin-bottom-4"><a href="$Link">$Title</a></h2>
                <p class="nhsuk-body-s nhsuk-u-margin-bottom-3">
                  <% if $BlogAuthor %>$BlogAuthor, <% end_if %>
                  $Date.Format("d MMMM yyyy")
                  <% if $Categories %> - <% loop $Categories %><a class="nhsuk-related-nav__link" href="$Link">$Title</a><% if not $Last %>, <% end_if %><% end_loop %><% end_if %>
                </p>
                <img src="$Image.ScaleMaxWidth(720).URL" alt="" class="nhsuk-image__img nhsuk-u-margin-bottom-3" />
                <p class="nhsuk-u-margin-bottom-4">$Content.LimitWordCount(40)</p>
                <a href="$Link" class="nhsuk-u-margin-bottom-0 nhsuk-body-s">Read more<span class="nhsuk-u-visually-hidden">of $Title</span></a>
              <% end_if %>
            </li>
          <% end_loop %>
        </ul>
        <% include Pagination %>
      <% else %>
        <h2>Sorry, there are no news items yet.</h2>
      <% end_if %>
    </div>
    <div class="nhsuk-grid-column-one-third">
      <% include NewsSidebar %>
    </div>
  </div>
</div>
