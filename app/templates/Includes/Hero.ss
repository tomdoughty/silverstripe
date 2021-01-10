<section class="nhsuk-hero nhsuk-hero--image nhsuk-hero--image-description">
    <script>
      function randomImage() {
          var images = [<% loop $EnabledSlides %>'$Image.ScaleMaxWidth(1000).URL',<% end_loop %>]; 
          var size = images.length;
          var x = Math.floor(size * Math.random());
          var element = document.getElementsByClassName('nhsuk-hero--image');
          if (element.length > 0) {
              element[0].style["background-image"] = "url(" + images[x] + ")";
          }
      }
      document.addEventListener("DOMContentLoaded", randomImage);
  </script>
  <div class="nhsuk-hero__overlay">
    <div class="nhsuk-width-container">
      <div class="nhsuk-grid-row">
        <div class="nhsuk-grid-column-two-thirds">
          <div class="nhsuk-hero-content">
            <h1 class="nhsuk-u-margin-bottom-3">$Title</h1>
            <p class="nhsuk-body-l nhsuk-u-margin-bottom-0">Helping you take control of your health and wellbeing.</p>
            <span class="nhsuk-hero__arrow" aria-hidden="true"></span>
          </div>
        </div>
      </div>
    </div>
  </div>
</section>
