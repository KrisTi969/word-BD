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
            <a href="#commentsSubmenu" data-toggle="collapse" aria-expanded="false">
                <i class="glyphicon glyphicon-comment"></i>
                Comments
            </a>
            <ul class="collapse list-unstyled" id="commentsSubmenu">
                <li><a href="{{route('Admin-UncheckedUsers')}}">Unchecked Comments</a></li>
            </ul>
            <a href="#productSubmenu" data-toggle="collapse" aria-expanded="false">
                <i class="glyphicon glyphicon-phone"></i>
                Products
            </a>
            <ul class="collapse list-unstyled" id="productSubmenu">
                <li><a href="{{route('Admin-addProduct')}}">Add product</a></li>
                <li><a href="{{route('Admin-productList')}}">Product List</a></li>
            </ul>
        </li>
    </ul>
</nav>