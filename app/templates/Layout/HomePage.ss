<% include Hero %>

<section class="nhsuk-section">
  <div class="nhsuk-width-container">
    <div class="nhsuk-grid-row">
      <div class="nhsuk-grid-column-one-half nhsuk-section__content">
        <h2>Our services</h2>
        <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Nam ultrices, nunc et eleifend efficitur, lacus ex malesuada magna, et finibus nulla risus interdum est.</p>
        <div class="nhsuk-action-link">
          <a class="nhsuk-action-link__link" href="/services">
            <svg class="nhsuk-icon nhsuk-icon__arrow-right-circle" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" aria-hidden="true">
              <path d="M0 0h24v24H0z" fill="none"></path>
              <path d="M12 2a10 10 0 0 0-9.95 9h11.64L9.74 7.05a1 1 0 0 1 1.41-1.41l5.66 5.65a1 1 0 0 1 0 1.42l-5.66 5.65a1 1 0 0 1-1.41 0 1 1 0 0 1 0-1.41L13.69 13H2.05A10 10 0 1 0 12 2z"></path>
            </svg>
            <span class="nhsuk-action-link__text">Go to our services</span>
          </a>
        </div>  
      </div>
      <div class="nhsuk-grid-column-one-half nhsuk-section__content">
        <h2>Patients and visitors</h2>
        <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Nam ultrices, nunc et eleifend efficitur, lacus ex malesuada magna, et finibus nulla risus interdum est.</p>
        <div class="nhsuk-action-link">
          <a class="nhsuk-action-link__link" href="/patients-and-visitors">
            <svg class="nhsuk-icon nhsuk-icon__arrow-right-circle" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" aria-hidden="true">
              <path d="M0 0h24v24H0z" fill="none"></path>
              <path d="M12 2a10 10 0 0 0-9.95 9h11.64L9.74 7.05a1 1 0 0 1 1.41-1.41l5.66 5.65a1 1 0 0 1 0 1.42l-5.66 5.65a1 1 0 0 1-1.41 0 1 1 0 0 1 0-1.41L13.69 13H2.05A10 10 0 1 0 12 2z"></path>
            </svg>
            <span class="nhsuk-action-link__text">Go to patients and visitors</span>
          </a>
        </div>
      </div> 
    </div>
  </div>
</section>

<section class="nhsuk-section">
  <div class="nhsuk-width-container">
    <div class="nhsuk-grid-row">
      <div class="nhsuk-grid-column-full nhsuk-section__content">
        <div class="nhsuk-u-reading-width">
          $Content
          $Form
          $CommentsForm
        </div>
      </div> 
    </div>
  </div>
</section>

<section class="nhsuk-section">
  <div class="nhsuk-width-container">
    <div class="nhsuk-grid-row nhsuk-card-group nhsuk-u-margin-bottom-0">
      <div class="nhsuk-grid-column-full nhsuk-section__content nhsuk-u-padding-bottom-0">
        <h2>Latest news</h2>
      </div>
      <% loop $LatestNews %>
        <div class="nhsuk-grid-column-one-half nhsuk-section__content nhsuk-card-group__item">
          <div class="nhsuk-card nhsuk-card--clickable">
            <img class="nhsuk-card__img" src="$Image.Fill(720,400).URL" alt="">
            <div class="nhsuk-card__content">
              <h2 class="nhsuk-card__heading nhsuk-heading-m"><a href="$Link">$Title</a></h2>
            </div>
          </div>
        </div>
      <% end_loop %>
    <div>
  </div>
</div>
</section>
