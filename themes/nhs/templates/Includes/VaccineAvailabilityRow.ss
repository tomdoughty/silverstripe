<tr role="row" class="nhsuk-table__row">
  <td class="nhsuk-table__cell">$Title</td>
  <td class="nhsuk-table__cell ">
    <strong class="nhsuk-tag <% if not $Available %> nhsuk-tag--grey<% end_if %>">
      <% if $Available %>
        Available
      <% else %>
        Unavailable
      <% end_if %>
    </strong>
  </td>
</tr>
