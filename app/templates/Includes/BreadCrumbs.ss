<% if $Breadcrumbs %>
  <nav class="nhsuk-breadcrumb" aria-label="Breadcrumb">
    <div class="nhsuk-width-container">
      <ol class="nhsuk-breadcrumb__list">
        <% loop $Breadcrumbs %>
          <li class="nhsuk-breadcrumb__item"><a class="nhsuk-breadcrumb__link" href="$Link">         
            <a href="$Link">$MenuTitle.XML</a>
          </li>
        <% end_loop %>
      </ol>
      <p class="nhsuk-breadcrumb__back"><a class="nhsuk-breadcrumb__backlink" href="$Breadcrumbs.Last.Link">Back to $Breadcrumbs.Last.Title</a></p>
    </div>
  </nav>
<% end_if %>