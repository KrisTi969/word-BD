
<!DOCTYPE html>
<html>

@include('admin.admin-head')

<body>

<div class="wrapper">
    <!-- Sidebar Holder -->
@include('admin.admin-sidebar')

<!-- Page Content Holder -->
    <div id="content">

        <nav class="navbar navbar-default">
            <div class="container-fluid">

                <div class="navbar-header">
                    <button type="button" id="sidebarCollapse" class="btn btn-info navbar-btn">
                        <i class="glyphicon glyphicon-align-left"></i>
                        <span>Sidebar</span>
                    </button>
                </div>

                <div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
                    <ul class="nav navbar-nav navbar-right">
                        <li><a href="{{route('Admin')}}">Page</a></li>
                    </ul>
                </div>
            </div>
        </nav>
        <div id="abilityListContainer" class="table-container">
        @include('admin.commentsTable')
        </div>
    </div>

</div>

<script src="https://code.jquery.com/jquery-1.12.0.min.js"></script>
<!-- Bootstrap Js CDN -->
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>

<script type="text/javascript">
    $(document).ready(function () {
        $('#sidebarCollapse').on('click', function () {
            $('#sidebar').toggleClass('active');
        });
    });
</script>



<script src="{{asset('js/popconfirm.js')}}"></script>



<script>
    var value;
    $('.popconfirm').click(function(e){
        value = this.val();
        $.ajaxSetup({
            headers: {
                'X-CSRF-TOKEN': $('meta[name="_token"]').attr('content')
            }
        });
        jQuery.ajax({
            url: "{{route('Admin-deleteComment')}}",
            method: 'post',
            dataType: "json",
            data: {
                id: value
            },
            success:function(data) {
                console.log(data.succes);
                if (data.errors) {

                }
                if (data.success) {
                    var $request = $.get('{{route('Admin-refreshComments')}}'); // make request
                    var $container = $('.table-container');

                    $container.addClass('loading'); // add loading class (optional)

                    $request.done(function(data) { // success
                        $container.html(data.html);
                    });
                    $request.always(function() {
                        $container.removeClass('loading');
                    });

                    /**/
                }
            }
        });
    });

    $(".popconfirm").popConfirm();

</script>
<link type="text/css" rel="stylesheet" href="{{ asset('css/jquery-ui.css') }} " />
<script type="text/javascript" src="{{ asset('js/jquery.circliful.min.js') }}"></script>
<script type="text/javascript" src="{{ asset('js/jquery-ui.js') }}"></script>
</body>
</html>
