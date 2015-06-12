<html>
  <head>
    <script src="<% asset('bower/webcomponentsjs/webcomponents.js')%>"></script>
    <link rel="import" href="<% asset('bower/polymer/polymer.html') %>" />
    <link rel="import" href="<% asset('bower/core-header-panel/core-header-panel.html') %>" />
    <link rel="import" href="<% asset('bower/core-toolbar/core-toolbar.html') %>" />
    <link rel="import" href="<% asset('bower/core-menu/core-menu.html') %>" />
    <link rel="import" href="<% asset('bower/paper-menu-button/paper-menu-button.html') %>" />
    <link rel="import" href="<% asset('bower/paper-icon-button/paper-icon-button.html')%>" />
    <link rel="import" href="<% asset('bower/paper-dropdown/paper-dropdown.html') %>" />
    <link rel="import" href="<% asset('bower/paper-item/paper-item.html') %>" />
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/2.1.3/jquery.min.js"></script>
    @yield('includes')
    <style shim-shadowdom>
      html, body{
        height: 100%
      }

      #site-panel{
        background-color: #E0E0E0;
      }

      core-header-panel{
        position: absolute;
        top: 0;
        right: 0;
        left: 0;
        bottom: 0;
      }


      #site-header.tall{
        background: url('<% asset('images/NerdAfterDark.png') %>') no-repeat;
        background-size: 100% 100%;
        color: black;
      }

      #site-header{
        background-color: #275273;
        color: white;
      }

      #site-content-wrapper{
        overflow: hidden;
      }

      #nav-anchor {
        color: white;
      }

      #nav-anchor .core-selected{
        color: black;
      }

      #nav-anchor paper-dropdown::shadow #ripple,
      #nav-anchor paper-dropdown::shadow #background{
        background-color: #9E9E9E;
      }

      core-header-panel .tall{
        height: 300px;
      }
    </style>
    @yield('script')
  </head>
  <body fullbleed>
    <core-header-panel id="site-panel" mode="waterfall-tall">
      <core-toolbar id="site-header">
        <div>Nerd After Dark</div>
        <div flex></div>
        <paper-menu-button id="nav-anchor">
          <paper-icon-button icon="more-vert"></paper-icon-button>
          <paper-dropdown class="dropdown" halign="right">
            <div class="menu">
              <paper-item noink>NAD Podcast</paper-item>
              <paper-item noink>Happy Half Hour</paper-item>
              <paper-item noink>NAD's Play</paper-item>
              <paper-item noink>Live Action</paper-item>
            </div>
          </paper-dropdown>
        </paper-menu-button>
      </core-toolbar>
      <div id="site-content-wrapper">
        @yield('content')
      </div>
    </core-header-panel>
  </body>
</html>
