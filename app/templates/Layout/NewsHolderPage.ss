<div class="nhsuk-width-container">
  <div class="nhsuk-grid-row">
    <div class="nhsuk-grid-column-two-thirds">
      <h1>$Title</h1>
      $SelectedCategory.Title
      <% if $Results %>
        <ul class="nhsuk-list nhsuk-list--border nhsuk-u-padding-top-4 ">
          <% loop $Results %>
            <li class="nhsuk-u-padding-bottom-4 nhsuk-u-margin-bottom-4">
              <h2 class="nhsuk-heading-m nhsuk-u-margin-bottom-4"><a href="$Link">$Title</a></h2>
              <p class="nhsuk-body-s nhsuk-u-margin-bottom-3"><% if $BlogAuthor %>$BlogAuthor, <% end_if %>$Date.Format("d MMMM yyyy")<% if $CategoriesList %> - $CategoriesList<% end_if %></p>
              <img src="$Image.ScaleMaxWidth(720).URL" alt="" class="nhsuk-image__img nhsuk-u-margin-bottom-3" />
              <p class="nhsuk-u-margin-bottom-4">$Content.LimitWordCount(40)</p>
              <a href="$Link" class="nhsuk-u-margin-bottom-0 nhsuk-body-s">Read more<span class="nhsuk-u-visually-hidden">of $Title</span></a>
            </li>
          <% end_loop %>
        </ul>
        <% include Pagination %>
      <% else %>
        <h2>Sorry, there are no news items yet.</h2>
      <% end_if %>
    </div>
    <div class="nhsuk-grid-column-one-third">
      <div class="nhsuk-related-nav">
        <h2 class="nhsuk-related-nav__heading">
          Categories
        </h2>
        <nav role="navigation" class="nhsuk-related-nav__nav-section">
          <ul class="nhsuk-related-nav__list nhsuk-related-nav__list--sub">
            <% loop $Categories %>
              <li class="nhsuk-related-nav__item">
                <a class="nhsuk-related-nav__link" href="$Link">
                  $Title
                </a>
              </li> 
            <% end_loop %>
          </ul>
        </nav>
      </div>
    </div>
  </div>
</div>
