<ul class="header__navigation-list">
  <% loop $Menu(1) %>
    <li class="header__navigation-item <% if First() %>header__navigation-item--for-mobile<% end_if %>">
      <a class="header__navigation-link" href="$Link">
        $MenuTitle.XML
        <svg class="icon icon__chevron-right" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" aria-hidden="true">
          <path d="M15.5 12a1 1 0 0 1-.29.71l-5 5a1 1 0 0 1-1.42-1.42l4.3-4.29-4.3-4.29a1 1 0 0 1 1.42-1.42l5 5a1 1 0 0 1 .29.71z"></path>
        </svg>
      </a>
    </li>
  <% end_loop %>
</ul>
