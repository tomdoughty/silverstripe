<% if $SiteConfig.EmergencyBannerEnabled %>
  <div class="nhsuk-global-alert" id="nhsuk-global-alert" role="complementary">
    <div class="nhsuk-width-container">
      <div class="nhsuk-grid-row">
        <div class="nhsuk-grid-column-full">
          <div class="nhsuk-global-alert__content">
            <div class="nhsuk-global-alert__message">
              $SiteConfig.EmergencyBannerContent
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>
<% end_if %>
