<div class="nhsuk-width-container">
  <div class="nhsuk-grid-row">
    <div class="nhsuk-grid-column-full">
      <div class="nhsuk-u-reading-width">
        <h1>$Title</h1>
        <p class="nhsuk-body-s nhsuk-u-margin-bottom-3"><% if $BlogAuthor %>$BlogAuthor, <% end_if %>$Date.Format("d MMMM yyyy")<% if $CategoriesList %> - $CategoriesList<% end_if %></p>
        <img src="$Image.ScaleMaxWidth(720).URL" class="nhsuk-image__img nhsuk-u-margin-bottom-3" />
        $Content
        <nav class="nhsuk-pagination" role="navigation" aria-label="Pagination">
          <ul class="nhsuk-list nhsuk-pagination__list">
            <% if $PrevArticle %>
              <li class="nhsuk-pagination-item--previous">
                <a class="nhsuk-pagination__link nhsuk-pagination__link--prev" href="$PrevArticle.Link">
                  <span class="nhsuk-pagination__title">Previous</span>
                  <span class="nhsuk-u-visually-hidden">:</span>
                  <span class="nhsuk-pagination__page">$PrevArticle.Title</span>
                  <svg class="nhsuk-icon nhsuk-icon__arrow-left" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" aria-hidden="true">
                    <path d="M4.1 12.3l2.7 3c.2.2.5.2.7 0 .1-.1.1-.2.1-.3v-2h11c.6 0 1-.4 1-1s-.4-1-1-1h-11V9c0-.2-.1-.4-.3-.5h-.2c-.1 0-.3.1-.4.2l-2.7 3c0 .2 0 .4.1.6z">
                    </path>
                  </svg>
                </a>
              </li>
            <% end_if %>
            <% if $NextArticle %>
              <li class="nhsuk-pagination-item--next">
                <a class="nhsuk-pagination__link nhsuk-pagination__link--next" href="$NextArticle.Link">
                  <span class="nhsuk-pagination__title">Next</span>
                  <span class="nhsuk-u-visually-hidden">:</span>
                  <span class="nhsuk-pagination__page">$NextArticle.Title</span>
                  <svg class="nhsuk-icon nhsuk-icon__arrow-right" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" aria-hidden="true">
                    <path d="M19.6 11.66l-2.73-3A.51.51 0 0 0 16 9v2H5a1 1 0 0 0 0 2h11v2a.5.5 0 0 0 .32.46.39.39 0 0 0 .18 0 .52.52 0 0 0 .37-.16l2.73-3a.5.5 0 0 0 0-.64z">
                    </path>
                  </svg>
                </a>
              </li>
            <% end_if %>
          </ul>
        </nav>
        <div class="icons-buttons">
          <h3>Share this page</h3>
          <ul>
            <li>
              <a target="_blank" href="https://twitter.com/intent/tweet?original_referer&amp;url=$AbsoluteLink.URLATT&amp;text=$Title.URLATT" class="twitter">Twitter</a>
            </li>
            <li>
              <a target="_blank" href="https://www.facebook.com/sharer/sharer.php?u=$AbsoluteLink.URLATT" class="facebook">Facebook</a>
            </li>
            <li>
              <a target="_blank" href="https://www.linkedin.com/shareArticle?url=$AbsoluteLink.URLATT" class="linkedin">LinkedIn</a>
            </li>
            <li>
              <a href="mailto:?subject=I wanted to share this post with you from $SiteConfig.Title&amp;body=$Title $AbsoluteLink" class="email">Email</a>
            </li>
          </ul>
        </div>
      </div>
    </div>
  </div>
</div>
