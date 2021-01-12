<div class="nhsuk-width-container">
  <div class="nhsuk-grid-row">
    <div class="nhsuk-grid-column-full">
      <h1>Consultants A to Z</h1>
      <nav class="nhsuk-nav-a-z" id="nhsuk-nav-a-z" role="navigation" aria-label="A to Z Navigation">
        <ol class="nhsuk-nav-a-z__list" role="list">
          <% loop $Consultants %>
            <li class="nhsuk-nav-a-z__item">            
              <a class="nhsuk-nav-a-z__link" href="$Link#$Letter">$Letter</a>
            </li>         
          <% end_loop %>
        </ol>
      </nav>
      <ol class="nhsuk-list">
        <% loop $Consultants %>
          <li>
            <div class="nhsuk-list-panel">
              <h2 class="nhsuk-list-panel__label" id="$Letter">$Letter</h2>      
              <ul class="nhsuk-list-panel__list nhsuk-list-panel__list--with-label">
                <% loop $Pages %>
                  <li class="nhsuk-list-panel__item">
                    <a class="nhsuk-list-panel__link" href="/consultants/$Slug">$Name</a>
                  </li>
                <% end_loop %>
              </ul>
              <div class="nhsuk-back-to-top">
                <a class="nhsuk-back-to-top__link" href="#nhsuk-nav-a-z">
                  <svg class="nhsuk-icon nhsuk-icon__arrow-right" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" aria-hidden="true">
                    <path d="M19.6 11.66l-2.73-3A.51.51 0 0 0 16 9v2H5a1 1 0 0 0 0 2h11v2a.5.5 0 0 0 .32.46.39.39 0 0 0 .18 0 .52.52 0 0 0 .37-.16l2.73-3a.5.5 0 0 0 0-.64z"></path>
                  </svg>
                  Back to top
                </a>
              </div>
            </div>
          </li>
        <% end_loop %>
      </ul>
    </div>      
  </div>
</div>
