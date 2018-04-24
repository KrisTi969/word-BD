<div class="container">
    <div class="table-responsive">
        <table class="table table-condensed" style="border-collapse:collapse;">
            <thead>
            <tr>
                <th>Reviewed Product</th>
                <th>Date</th>
            </tr>
            </thead>
            <tbody>
                @foreach($comments as $item)
                    <tr data-toggle="collapse" data-target="#{{$loop->index}}" class="accordion-toggle">
                        <td><a href="{{ route('product', $item->commentable_id) }}">  {{\App\Http\Controllers\Product\ProductController::getProductName($item->commentable_id)}}</a></td>
                        <td>{{$item->created_at}}</td>
                    </tr>
                    <tr>
                        <td colspan="9" class="hiddenRow"><div class="accordian-body collapse" id="{{$loop->index}}">
                                <table id="commentsTable" class="table table-responsive table-hover">
                                    <tbody>
                                    {{--<div class="row">--}}
                                        <tr>
                                            {{--<div class="col-sm-10">--}}
                                                <td><textarea rows="6" style="resize: vertical; width: 100%; min-height: 80px;"disabled>{{$item->comment}}</textarea>
                                                </td>
                                            {{--</div>--}}
                                            {{--<div class="col-sm-11">--}}
                                                <td>
                                                    <br>
                                                    <button type="button" id="ajaxDelete" value="{{$item->id}}"  class="btn btn-danger btn-md popconfirm" data-toggle="confirmation" data-title="Open Google?">Delete</button>
                                                    <br> <br>
                                                    <button type="button" class="btn btn-success btn-md popconfirm">Approve</button>

                                                </td>
                                            {{--</div>--}}
                                            <td>
                                            </td>
                                    {{--</div>--}}
                                    </tr>
                                    </tbody>
                                </table>
                            </div>
                        </td>


                    </tr>
                @endforeach
            </tbody>
        </table>
    </div>
    {{ $comments->links() }}
</div>


<script type="text/javascript" src="{{ asset('js/jquery.min.js') }}"></script>

{{--<script src="{{asset('js/jquery-1.12.0.min.js')}}"></script>--}}
<script src="{{asset('js/jquery-3.3.1.min.js')}}"></script>

<script src="{{asset('js/bootstrap.min.js')}}"></script>
<script src="{{asset('js/popconfirm.js')}}"></script>

<!-- Popper -->



<!-- Latest compiled and minified Bootstrap JavaScript -->
<script>
    var reloadAbilities = function()
    {
        var $request = $.get('Admin/refreshComments', function(result)
        {
            //callback function once server has complete request
            $('#commentsTable').html(result.html);
        });
    }

</script>
<script type="text/javascript">
    $(document).ready(function () {
        $('#sidebarCollapse').on('click', function () {
            $('#sidebar').toggleClass('active');
        });
    });
</script>

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




    $('#important_action').click(function() {
        alert('You clicked, and valided this button !');
    });
</script>
