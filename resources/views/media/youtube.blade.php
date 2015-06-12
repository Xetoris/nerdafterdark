<div class="youtube" flex layout vertical>
  <div class="youtube-thumbnail" flex layout horizontal>
    <div class="youtube-thumbnail-frame" layout horizontal>
      <img class="youtube-thumbnail" src="<% $youtube->thumbnail %>" alt="<% $youtube->title %>" flex/>
    </div>
  </div>
  <div class="youtube-body" layout horizontal>
    <div class="youtube-body-content" flex layout vertical>
      <div flex></div>
      <div class="youtube-title"><% $youtube->title %></div>
      <div flex></div>
      <div class="youtube-description"><% $youtube->description %></div>
      <div flex></div>
    </div>
  </div>
  <div class="youtube-stats" layout horizontal center>
    <div class="youtube-stats-content">
      Posted: <% $youtube->date_created->toDayDateTimeString() %>
    </div>
  </div>
  <a class="youtube-thumbnail-link" href="<% $youtube->url %>" target="_blank">
    <div class="rotating-button">
       >
    </div>
  </a>
</div>
