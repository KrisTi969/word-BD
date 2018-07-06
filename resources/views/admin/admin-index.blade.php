<!DOCTYPE html>
<html>

@include('admin.admin-head')

    <body>

        <div class="wrapper">
            <!-- Sidebar Holder -->
        @include('admin.admin-sidebar')

            <!-- Page Content Holder -->
            <div id="content">

             @include('admin.admin-header')
                <div class="container">
                <h2>Welcome, {{ Auth::user()->name}}</h2>
                <p>Please select a task to do from the sidebar.</p>

                    <div class="row">
                        <div class="col-lg-3 col-md-6">
                            <div class="panel panel-primary">
                                <div class="panel-heading">
                                    <div class="row">
                                        <div class="col-xs-3">
                                            <i style="font-size:5em;" class="glyphicon glyphicon-comment"></i>
                                        </div>
                                        <div class="col-xs-9 text-right">
                                            @if(\App\Http\Controllers\Admin\AdminController::countUncheckedComments()!= 0 )
                                            <div class="huge">{{\App\Http\Controllers\Admin\AdminController::countUncheckedComments()}}</div>
                                            <div>New Comments</div>
                                            @endif
                                                @if(\App\Http\Controllers\Admin\AdminController::countUncheckedComments()== 0 )
                                                    <div class="huge">{{\App\Http\Controllers\Admin\AdminController::countUncheckedComments()}}</div>
                                                    <div>No new comments</div>
                                                @endif
                                        </div>
                                    </div>
                                </div>
                                <a href="{{route('Admin-UncheckedComments')}}">
                                    <div class="panel-footer">
                                        <span class="pull-left">View Details</span>
                                        <span class="pull-right"><i class="fa fa-arrow-circle-right"></i></span>

                                        <div class="clearfix"></div>
                                    </div>
                                </a>
                            </div>
                        </div>
                        <div class="col-lg-3 col-md-6">
                            <div class="panel panel-green">
                                <div class="panel-heading">
                                    <div class="row">
                                        <div class="col-xs-3">
                                            <i style="font-size:5em" class="glyphicon glyphicon-user"></i>
                                        </div>
                                        <div  class="col-xs-9 text-right">
                                            @if(\App\Http\Controllers\Admin\AdminController::countUsers()!= 0 )
                                            <div class="huge">{{\App\Http\Controllers\Admin\AdminController::countUsers()}}</div>
                                            <div>Registered users</div>
                                                @endif
                                        </div>
                                    </div>
                                </div>
                                <a href="{{route('Admin-userList')}}">
                                    <div class="panel-footer">
                                        <span class="pull-left">View Details</span>
                                        <span class="pull-right"><i class="fa fa-arrow-circle-right"></i></span>

                                        <div class="clearfix"></div>
                                    </div>
                                </a>
                            </div>
                        </div>
                        <div class="col-lg-3 col-md-6">
                            <div class="panel panel-red">
                                <div class="panel-heading">
                                    <div class="row">
                                        <div class="col-xs-3">
                                            <i  style="font-size:5em" class="glyphicon glyphicon-phone"></i>
                                        </div>
                                        @if(\App\Http\Controllers\Admin\AdminController::countProducts()!= 0 )
                                        <div class="col-xs-9 text-right">
                                            <div class="huge">{{\App\Http\Controllers\Admin\AdminController::countProducts()}}</div>
                                            <div>Products for sale</div>
                                            @endif
                                        </div>
                                    </div>
                                </div>
                                <a href="{{route('Admin-productList')}}">
                                    <div class="panel-footer">
                                        <span class="pull-left">View Details</span>
                                        <span class="pull-right"><i class="fa fa-arrow-circle-right"></i></span>

                                        <div class="clearfix"></div>
                                    </div>
                                </a>
                            </div>
                        </div>
                        <div class="col-lg-3 col-md-6">
                            <div class="panel panel-yellow">
                                <div class="panel-heading">
                                    <div class="row">
                                        <div class="col-xs-3">
                                            <i style="font-size:5em" class="glyphicon glyphicon-shopping-cart"></i>
                                        </div>
                                        @if(\App\Http\Controllers\Admin\AdminController::countPendingOrders()!= 0 )
                                        <div class="col-xs-9 text-right">
                                            <div class="huge">{{\App\Http\Controllers\Admin\AdminController::countPendingOrders()}}</div>
                                            <div>New Orders</div>
                                            @endif
                                            @if(\App\Http\Controllers\Admin\AdminController::countPendingOrders()== 0 )
                                                <div class="col-xs-9 text-right">
                                                    <div class="huge">{{\App\Http\Controllers\Admin\AdminController::countPendingOrders()}}</div>
                                                    <div>There are no new orders</div>
                                                    @endif
                                        </div>
                                    </div>
                                </div>
                                <a href="{{route('Admin-PendingOrders')}}">
                                    <div class="panel-footer">
                                        <span class="pull-left">View Details</span>
                                        <span class="pull-right"><i class="fa fa-arrow-circle-right"></i></span>

                                        <div class="clearfix"></div>
                                    </div>
                                </a>
                            </div>
                        </div>
                    </div>

                <div class="line"></div>
                </div>
            </div>
        </div>
        </div>




        <!-- jQuery CDN -->
        <script src="{{asset('js/jquery-1.12.0.min.js')}}"></script>
         <!-- Bootstrap Js CDN -->
       {{--  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>--}}
        <script src="{{asset('js/bootstrap.min.js')}}"></script>
         <script type="text/javascript">
             $(document).ready(function () {
                 $('#sidebarCollapse').on('click', function () {
                     $('#sidebar').toggleClass('active');
                 });
             });
         </script>
    </body>
</html>
