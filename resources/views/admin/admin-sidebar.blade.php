<nav id="sidebar">
    <div class="sidebar-header">
        <h3>Skysop Admin Page</h3>
        <strong>SAP</strong>
    </div>

    <ul class="list-unstyled components">
        <li class="active">
            <a href="#homeSubmenu" data-toggle="collapse" aria-expanded="false">
                <i class="glyphicon glyphicon-home"></i>
                Users
            </a>
            <ul class="collapse list-unstyled" id="homeSubmenu">
                <li><a href="{{route('Admin-newUser')}}">New User</a></li>
                <li><a href="{{route('Admin-userList')}}">User List</a></li>
            </ul>
        </li>
    </ul>
</nav>