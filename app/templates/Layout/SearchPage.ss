<div class="nhsuk-width-container">
  <div class="nhsuk-grid-row">
    <div class="nhsuk-grid-column-full">
      <div class="nhsuk-u-reading-width">
        <h1>Search results for $Query</h1>
        <form id="search" action="/search/" method="get">
          <div class="nhsuk-form-group  nhsuk-header__search-form--search-results">
            <label class="nhsuk-label nhsuk-u-visually-hidden" for="search-field">Enter a search term</label>
            <input class="nhsuk-input nhsuk-search__input" type="search" name="Query" autocomplete="off" id="search-field" value="$Query">
            <input type="hidden" id="page" name="Page" value="1">
            <button class="nhsuk-search__submit" type="submit">
              <span class="nhsuk-u-visually-hidden">
                Submit
              </span>
              <svg class="nhsuk-icon nhsuk-icon__search" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" aria-hidden="true" focusable="false">
                <path d="M19.71 18.29l-4.11-4.1a7 7 0 1 0-1.41 1.41l4.1 4.11a1 1 0 0 0 1.42 0 1 1 0 0 0 0-1.42zM5 10a5 5 0 1 1 5 5 5 5 0 0 1-5-5z"></path>
              </svg>
            </button>
          </div>
        </form>
        <% if $Results %>
          <ul class="nhsuk-list nhsuk-list--border">
            <% loop $Results %>
              <li class="nhsuk-u-padding-bottom-3 nhsuk-u-margin-bottom-3">
                <h2 class="nhsuk-heading-xs nhsuk-u-margin-bottom-1"><a href="$Link">$Title</a></h2>
                <% if $Content %>
                  <p class="nhsuk-body-s nhsuk-u-margin-bottom-0">.$Content.LimitWordCount(40)</p>
                <% end_if %>
              </li>
            <% end_loop %>
          </ul>
        
          <% if $Results.MoreThanOnePage %>
            <nav class="nhsuk-pagination" role="navigation" aria-label="Pagination">
              <ul class="nhsuk-list nhsuk-pagination__list">
                <% if $Results.NotFirstPage %>
                  <li class="nhsuk-pagination-item--previous">
                    <a class="nhsuk-pagination__link nhsuk-pagination__link--prev" href="$Results.PrevLink">
                      <span class="nhsuk-pagination__title">Previous</span>
                      <span class="nhsuk-u-visually-hidden">:</span>
                      <span class="nhsuk-pagination__page">FIX THIS of $Results.TotalPages</span>
                      <svg class="nhsuk-icon nhsuk-icon__arrow-left" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" aria-hidden="true">
                        <path d="M4.1 12.3l2.7 3c.2.2.5.2.7 0 .1-.1.1-.2.1-.3v-2h11c.6 0 1-.4 1-1s-.4-1-1-1h-11V9c0-.2-.1-.4-.3-.5h-.2c-.1 0-.3.1-.4.2l-2.7 3c0 .2 0 .4.1.6z">
                        </path>
                      </svg>
                    </a>
                  </li>
                <% end_if %>
                <% if $Results.NotLastPage %>
                  <li class="nhsuk-pagination-item--next">
                    <a class="nhsuk-pagination__link nhsuk-pagination__link--next" href="$Results.NextLink">
                      <span class="nhsuk-pagination__title">Next</span>
                      <span class="nhsuk-u-visually-hidden">:</span>
                      <span class="nhsuk-pagination__page">FIX THIS of $Results.TotalPages</span>
                      <svg class="nhsuk-icon nhsuk-icon__arrow-right" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" aria-hidden="true">
                        <path d="M19.6 11.66l-2.73-3A.51.51 0 0 0 16 9v2H5a1 1 0 0 0 0 2h11v2a.5.5 0 0 0 .32.46.39.39 0 0 0 .18 0 .52.52 0 0 0 .37-.16l2.73-3a.5.5 0 0 0 0-.64z">
                        </path>
                      </svg>
                    </a>
                  </li>
                <% end_if %>
              </ul>
            </nav>

            <% if $Results.NotFirstPage %>
              <a href="$Results.PrevLink">Previous page</a>
            <% end_if %>
            <% loop $Results.Pages %>
              <% if $CurrentBool %>
                $PageNum
              <% else %>
                <a href="$Link">$PageNum</a>
              <% end_if %>
            <% end_loop %>
            <% if $Results.NotLastPage %>
              <a href="$Results.NextLink">Next page</a>
            <% end_if %>
            <p>Page $Results.CurrentPage of $Results.TotalPages</p>
          <% end_if %>
          
        <% else %>
          <h2>No results found for $Query</h2>
          <p>You could try:</p>
          <ul>
            <li>checking your spelling</li>
            <li>searching again using other words</li>
          </ul>
        <% end_if %>
      </div>
    </div>
  </div>
</div>
