<div id="$HolderID" class="nhsuk-form-group<% if $Message %> nhsuk-form-group--error<% end_if %>">
  <fieldset class="nhsuk-fieldset">
    <legend class="nhsuk-fieldset__legend">
    </legend>

    <% if $Message %>
      <span class="nhsuk-error-message" id="example-error">
        <span class="nhsuk-u-visually-hidden">Error:</span> $Message
      </span>
    <% end_if %>

    <% if $Description %><span class="description">$Description</span><% end_if %>

    <div class="nhsuk-checkboxes">
      <div class="nhsuk-checkboxes__item">
        $Field
        <label class="nhsuk-label nhsuk-checkboxes__label" for="$ID">
          $Title
        </label>
      </div>
    </div>
  </fieldset>
</div>