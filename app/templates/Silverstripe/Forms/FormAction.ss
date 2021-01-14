<% if $UseButtonTag %>
	<button class="nhsuk-button" $AttributesHTML>
		<% if $ButtonContent %>$ButtonContent<% else %><span>$Title.XML</span><% end_if %>
	</button>
<% else %>
	<input class="nhsuk-button" $AttributesHTML />
<% end_if %>
