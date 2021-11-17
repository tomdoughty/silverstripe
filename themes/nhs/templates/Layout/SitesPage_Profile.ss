<div class="nhsuk-width-container">
  <div class="nhsuk-grid-row">
    <div class="nhsuk-grid-column-two-thirds">
      <h1>$Site.Name</h1>

      <h2>Address</h2>
      <p>$Site.Address</p>
      <p><a href="https://maps.google.com/?ll=$Site.Latitude,$Site.Longitude">Map<span class="nhsuk-u-visually-hidden"> for $Site.Name</span></a></p>

      <h2>Who can use this site</h2>
      <p>This site is for these age groups: $Site.AgeGroup</p>
      <p class="nhsuk-inset-text nhsuk-u-margin-top-0">
        When you arrive, the staff will ask you questions to ensure you’re only offered suitable vaccines.
      </p>

      <div class="nhsuk-panel">
        <h2>Availability of vaccines</h2>
        <p>If you’ve already had your 1st dose, you need to have the same vaccine for your 2nd dose.</p>
        <table class="nhsuk-table">
          <caption class="nhsuk-table__caption nhsuk-u-visually-hidden">Availability of vaccine types</caption>
          <thead role="rowgroup" class="nhsuk-table__head">
            <tr role="row">
              <th role="columnheader" class="" scope="col">
                Vaccine type
              </th>
              <th role="columnheader" class="" scope="col">
                Availability
              </th>
            </tr>
          </thead>
          <tbody class="nhsuk-table__body">
            <% include VaccineAvailabilityRow Title="1st dose", Available=$Site.FirstDose %> 
            <% include VaccineAvailabilityRow Title="AstraZeneca 2nd dose", Available=$Site.AstraZenecaDoseTwo %> 
            <% include VaccineAvailabilityRow Title="Pfizer 2nd dose", Available=$Site.PfizerDoseTwo %> 
            <% include VaccineAvailabilityRow Title="Moderna 2nd dose", Available=$Site.ModernaDoseTwo %> 
            <% include VaccineAvailabilityRow Title="Booster dose", Available=$Site.BoosterDose %> 
            <% include VaccineAvailabilityRow Title="3rd dose", Available=$Site.ThreeDose %>          
          </tbody>
        </table>
      </div>

      <h2>Opening times</h2>

      <% loop $Site.OpeningTimes %> 
        <dl class="nhsuk-summary-list">
            <div class="nhsuk-summary-list__row">
                <dt class="nhsuk-summary-list__key">
                    Day
                </dt>
                <dd class="nhsuk-summary-list__value">
                    $Date.Format(EEEE)
                </dd>
            </div>
            <div class="nhsuk-summary-list__row">
                <dt class="nhsuk-summary-list__key">
                    Date
                </dt>
                <dd class="nhsuk-summary-list__value">
                    $Date.Format(d MMMM)
                </dd>
            </div>
            <div class="nhsuk-summary-list__row">
                <dt class="nhsuk-summary-list__key">
                    Opening hours
                </dt>
                <dd class="nhsuk-summary-list__value">
                    $FormatTime(OpeningTime) to $FormatTime(ClosingTime)
                </dd>
            </div>
        </dl>
      <% end_loop %>

    </div>
  </div>
</div>
