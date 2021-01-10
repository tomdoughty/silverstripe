<div class="nhsuk-width-container">
  <div class="nhsuk-grid-row">
    <div class="nhsuk-grid-column-full">
      <h1>$Title</h1>
      $Content
    </div>
  </div>
  <div class="nhsuk-grid-row nhsuk-card-group">
    <% loop Children %>
      <div class="nhsuk-grid-column-one-third nhsuk-card-group__item">
        <div class="nhsuk-card nhsuk-card--clickable">
          <div class="nhsuk-card__content">
            <h2 class="nhsuk-card__heading nhsuk-heading-m"><a href="$Link">$Title</a></h2>
          </div>
        </div>
      </div>
    <% end_loop %>
  <div>
</div>
