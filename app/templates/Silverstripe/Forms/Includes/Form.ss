<form $AttributesHTML>

  <% if $Message %>
    <% if $MessageType == "error" %>
      <div class="nhsuk-error-summary" aria-labelledby="error-summary-title" role="alert" tabindex="-1">
        <h2 class="nhsuk-error-summary__title" id="error-summary-title">
          There is a problem
        </h2>
        <div class="nhsuk-error-summary__body">
          <p>$Message</p>
          <ul class="nhsuk-list nhsuk-error-summary__list">
            <% loop $Fields %>
              <% if $Message %>
                <li><a href="#$ID">$Message</a></li>
              <% end_if %>
            <% end_loop %>
          </ul>
        </div>
      </div>
    <% else %>
      <div class="nhsuk-inset-text">
        <span class="nhsuk-u-visually-hidden">Information: </span>
        <p>$Message</p>
      </div>
    <% end_if %>
  <% end_if %>

  <% loop $Fields %>
    $FieldHolder
  <% end_loop %>

  <% loop $Actions %>
    $Field
  <% end_loop %>

</form>
