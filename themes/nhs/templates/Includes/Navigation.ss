<ul class="nhsuk-header__navigation-list">
  <% loop $Menu(1) %>
    <li class="nhsuk-header__navigation-item <% if First() %>nhsuk-header__navigation-item--for-mobile<% end_if %>">
      <a class="nhsuk-header__navigation-link" href="$Link">
        $MenuTitle.XML
      </a>
    </li>
  <% end_loop %>
</ul>
