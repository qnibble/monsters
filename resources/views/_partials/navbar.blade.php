<nav class="navbar navbar-default navbar-fixed-top">
    <div class="container-fluid">
        <div class="navbar-header">
            <a href="#" class="navbar-toggle collapsed">
            </a>
            <a href="{{ url('/') }}" class="navbar-brand">Monsters</a>
        </div>
        
        
        

        <div class="btn-group">
          <button type="button" class="btn navbar-btn btn-info dropdown-toggle" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
            Collections <span class="caret"></span>
          </button>
          <ul class="dropdown-menu">
            <li><a href="{{ url('effects') }}">Effects</a></li>
            <li><a href="{{ url('armour') }}">Armours</a></li>
            <li><a href="{{ url('weapon') }}">Weapons</a></li>
            <li><a href="{{ url('mapdata') }}">Maps</a></li>
            <li><a href="{{ url('character') }}">Characters</a></li>
            <li role="separator" class="divider"></li>
            <li><a href="{{ url('/') }}">Overview</a></li>
          </ul>
        </div>

        <span class="pull-right">
            <a href="{{ url('battlemap') }}" class="btn btn-success navbar-btn">To Battlemap</a>
        </span>
    </div>
</nav>