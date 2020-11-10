
<h1>$Title</h1>

<% if $Query %>
  <p><strong>You searched for &quot;{$Query}&quot;<strong></p>
<% end_if %>

<% if $Results %>
  <ul>
    <% loop $Results %>
      <li>
        <h4>
          <a href="$Link">
            <% if $MenuTitle %>
              $MenuTitle
            <% else %>
              $Title
            <% end_if %>
          </a>
        </h4>
        <% if $Content %>
            <p>$Content.LimitWordCountXML</p>
        <% end_if %>
        <a  href="$Link">Read more about &quot;{$Title}&quot;...</a>
      </li>
    <% end_loop %>
  </ul>
<% else %>
  <p>Sorry, your search query did not return any results.</p>
<% end_if %>

<% if $Results.MoreThanOnePage %>
  <% if $Results.NotFirstPage %>
    <a href="$Results.PrevLink">Previous page</a>
  <% end_if %>
  <% loop $Results.Pages %>
    <% if $CurrentBool %>
      $PageNum
    <% else %>
      <a href="$Link">$PageNum</a>
    <% end_if %>
  <% end_loop %>
  <% if $Results.NotLastPage %>
    <a href="$Results.NextLink">Next page</a>
  <% end_if %>
  <p>Page $Results.CurrentPage of $Results.TotalPages</p>
<% end_if %>
