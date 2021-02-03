<footer role="contentinfo">
  <div class="nhsuk-footer" id="footer">
    <div class="nhsuk-width-container">
      <ul class="nhsuk-footer__list">
        <% loop $Menu(1) %>
          <li class="nhsuk-footer__list-item"><a class="nhsuk-footer__list-item-link" href="$Link">$MenuTitle.XML</a></li>
        <% end_loop %>
      </ul>
      <p class="nhsuk-footer__copyright">&copy; $SiteConfig.Title</p>
    </div>
  </div>
</footer>