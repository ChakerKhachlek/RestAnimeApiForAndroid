{{-- Side Navigation --}}
<div class="col-md-2">
    <div class="sidebar content-box" style="display: block;">
        <ul class="nav">
            <!-- Main menu -->
            <li class="current"><a href="{{route('admin.view')}}"><i class="glyphicon glyphicon-home"></i>
                    Dashboard</a></li>
            
            
            <li class="submenu">
                <a href="#">
                    <i class="glyphicon glyphicon-list"></i> Streaming
                    <span class="caret pull-right"></span>
                </a>
                <!-- Sub menu -->
                <ul>
                <li><a href="{{route('manageCategories')}}">Manage Categories</a></li>
                <li><a href="{{route('manageAnimes')}}">Manage Animes</a></li>

                </ul>
            </li>
          

            
        </ul>
    </div>
</div> <!-- ADMIN SIDE NAV-->