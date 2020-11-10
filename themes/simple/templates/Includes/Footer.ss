<footer role="contentinfo">
  <div class="footer" id="footer">
    <div class="width-container">
      <h2 class="u-visually-hidden">Support links</h2>
      <ul class="footer__list">
        <% loop $Menu(1) %>
          <li class="footer__list-item"><a class="footer__list-item-link" href="$Link">$MenuTitle.XML</a></li>
        <% end_loop %>
      </ul>
      <p class="footer__copyright">&copy; $SiteConfig.Title</p>
    </div>
  </div>
</footer>