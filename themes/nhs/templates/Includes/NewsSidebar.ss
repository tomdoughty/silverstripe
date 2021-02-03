<div class="nhsuk-related-nav">
  <h2 class="nhsuk-related-nav__heading">
    Related content and links
  </h2>
  <nav role="navigation" class="nhsuk-related-nav__nav-section">
    <h3 class="nhsuk-related-nav__sub-heading">Categories</h3>
    <ul class="nhsuk-related-nav__list nhsuk-related-nav__list--sub">
      <li class="nhsuk-related-nav__item">
        <a class="nhsuk-related-nav__link" href="$Link">
          All categories ($ArticleCount)
        </a>
      </li>
      <% loop $Categories %>
        <li class="nhsuk-related-nav__item">
          <a class="nhsuk-related-nav__link" href="$Link">
            $Title ($ArticleCount)
          </a>
        </li>
      <% end_loop %>
    </ul>
    <h3 class="nhsuk-related-nav__sub-heading">Dates</h3>
    <ul class="nhsuk-related-nav__list nhsuk-related-nav__list--sub">
      <% loop $ArchiveDates %>
        <li class="nhsuk-related-nav__item">
          <a class="nhsuk-related-nav__link" href="$Link">
            $MonthName $Year ($ArticleCount)
          </a>
        </li>
      <% end_loop %>
    </ul>
  </nav>
</div>