<div class="nhsuk-width-container">
  <div class="nhsuk-grid-row">
    <div class="nhsuk-grid-column-two-thirds">
      <% if $Sites %>
        <h1>Walk-in coronavirus (COVID-19) vaccination sites near $Postcode</h1>
        <ul class="nhsuk-list nhsuk-list--border nhsuk-u-padding-top-4">
          <% loop $Sites %>
            <li class="nhsuk-u-padding-bottom-4 nhsuk-u-margin-bottom-4">
              <p class="nhsuk-body-s nhsuk-u-margin-bottom-2">$Distance miles away</p>
              <h2 class="nhsuk-u-padding-top-0">
                <a href="$Link">$Name</a>
              </h2>
              <p class="nhsuk-u-margin-bottom-2">
                $Address
              </p>
              <p>
                <a href="$DirectionsUrl">Map and directions<span class="nhsuk-u-visually-hidden"> for $Name</span></a>
              </p>
                <p>This site is for these age groups: $AgeGroup</p>
              <div class="nhsuk-action-link nhsuk-u-margin-bottom-0">
                <a class="nhsuk-action-link__link" href="$Link">
                  <svg class="nhsuk-icon nhsuk-icon__arrow-right-circle" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" aria-hidden="true">
                    <path d="M0 0h24v24H0z" fill="none"></path>
                    <path d="M12 2a10 10 0 0 0-9.95 9h11.64L9.74 7.05a1 1 0 0 1 1.41-1.41l5.66 5.65a1 1 0 0 1 0 1.42l-5.66 5.65a1 1 0 0 1-1.41 0 1 1 0 0 1 0-1.41L13.69 13H2.05A10 10 0 1 0 12 2z"></path>
                  </svg>
                  <span class="nhsuk-action-link__text">See opening times and available vaccines<span class="nhsuk-u-visually-hidden">for $Name</span></span>
                </a>
              </div>
            </li>       
          <% end_loop %>
        </ul>
      <% else %>
        <h1>We can't find '$Postcode'</h1>
        <p>If the place you searched for is in England, you could:</p>
        <ul>
          <li>check your spelling and try again</li>
          <li>try a different place name</li>
        </ul>
        <p>
          <a href="/$URLSegment/">Back to find a walk in coronavirus (COVID-19) vaccination site</a>
        <p>
      <% end_if %>
    </div>      
  </div>
</div>
