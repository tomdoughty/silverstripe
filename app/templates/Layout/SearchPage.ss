<div class="nhsuk-width-container">
  <div class="nhsuk-grid-row">
    <div class="nhsuk-grid-column-full">
      <div class="nhsuk-u-reading-width">
        <h1>Search results for $Query()</h1>  
        <form id="search" action="/search/" method="get">
          <div class="nhsuk-form-group  nhsuk-header__search-form--search-results">
            <label class="nhsuk-label nhsuk-u-visually-hidden" for="search-field">Enter a search term</label>
            <input class="nhsuk-input nhsuk-search__input" type="search" name="Query" autocomplete="off" id="search-field" value="$Query">
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
          <ul class="nhsuk-list nhsuk-list--border nhsuk-u-padding-top-4">
            <% loop $Results %>
              <li class="nhsuk-u-padding-bottom-4 nhsuk-u-margin-bottom-4">
                <h2 class="nhsuk-heading-m nhsuk-u-margin-bottom-4"><a href="$Link">$Title</a></h2>
                <% if $Content %>
                  <p class="nhsuk-body-s nhsuk-u-margin-bottom-0">$Content.LimitWordCount(40)</p>
                <% end_if %>
              </li>
            <% end_loop %>
          </ul>
          <% include Pagination %>
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
