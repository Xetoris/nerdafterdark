<div class="podcast" flex layout vertical>
    <div class="podcast-clip" flex layout vertical>
      <div flex></div>
      <div class="podcast-show-title"><% $podcast->title %></div>
      <div class="podcast-show-number">#<% $podcast->number %></div>
      <div flex></div>
    </div>
    <div class="podcast-body" layout vertical>
      <div flex></div>
      <div class="podcast-description"><%% $podcast->description %%></div>
      <div flex></div>
    </div>
    <div class="podcast-stats" layout horizontal center>
      <div class="podcast-duration">
        Posted: <% $podcast->date_created->toDayDateTimeString() %>
      </div>
    </div>
    <a class="podcast-link" href="<% $podcast->url %>" target="_blank">
      <div class="rotating-button">
        >
      </div>
    </a>
</div>
