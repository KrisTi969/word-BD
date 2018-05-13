<div class="container">
    <div class="table-responsive">
        <table class="table table-condensed" style="border-collapse:collapse;">
            <thead>
            <tr>
                <th>#</th>
                <th>Contact</th>
                <th>Shipping Name</th>
                <th>Shipping city</th>
                <th>Shipping Address</th>
                <th>Country</th>
                <th>Postal Code</th>
                <th>Notes</th>
                <th>Status</th>
            </tr>
            </thead>
            <tbody>
            @foreach($orders as $item)
                <tr data-toggle="collapse" data-target="#{{$loop->index}}" class="accordion-toggle">
                    <td>{{$item->number}}</td>
                    <td>{{$item->contact}}</td>
                    <td>{{$item->shipping_name}}</td>
                    <td class="text">{{$item->shipping_city}}</td>
                    <td class="text">{{$item->shipping_address}}</td>
                    <td class="text">{{$item->country}}</td>
                    <td class="text">{{$item->postal_code}}</td>
                    <td class="text">{{$item->notes}}</td>
                    @if($item->status=='Pending')
                        <td class="text-warning">{{$item->status}}</td>
                    @endif
                    @if($item->status=='Sent')
                        <td class="text-success">{{$item->status}}</td>
                    @endif
                </tr>

                <tr >
                    <td colspan="9" class="hiddenRow"><div class="accordian-body collapse" id="{{$loop->index}}">
                            <table class="table table-responsive table-hover">
                                <thead>
                                <tr>
                                    <th>Category</th>
                                    <th>Name</th>
                                    <th>Quantity</th>
                                    <th>Price</th>

                                </tr>
                                </thead>
                                @foreach($products as $product)
                                    @if($product->order_id == $item->id)
                                        <tbody>
                                        <tr>
                                            <td>{{$product->product_type}}</td>
                                            <td>{{$product->name}}</td>
                                            <td>{{$product->quantity}}</td>
                                            <td>{{$product->price}}</td>
                                        </tr>


                                        </tbody>
                                    @endif

                                @endforeach
                                <td align="left">
                                    <button type="button" id="ajaxDelete" value="{{$item->id}}"  class="btn btn-danger btn-md popconfirm" data-toggle="confirmation" data-title="Delete?">Delete</button>

                                    <button type="button" id="ajaxApprove" value="{{$item->id}}" class="btn btn-success btn-md popconfirm2" data-toggle="confirmation" data-title="Approve?">Approve</button>

                                </td>
                            </table>
                        </div> </td>


                </tr>
            @endforeach

            </tbody>
        </table>
    </div>
    {{ $orders->links() }}
</div>


<script>
    var value;
    $('.popconfirm').click(function(e){
        value = this.val();
        console.log(value + 'SASAA');
        debugger;
        $.ajaxSetup({
            headers: {
                'X-CSRF-TOKEN': $('meta[name="_token"]').attr('content')
            }
        });
        jQuery.ajax({
            url: "{{route('Admin-removeOrder')}}",
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

                    var $request = $.get('{{route('Admin-RefreshPendingOrders')}}'); // make request
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


    /*Approve code*/

    $('.popconfirm2').click(function(e){
        value = this.val();
        $.ajaxSetup({
            headers: {
                'X-CSRF-TOKEN': $('meta[name="_token"]').attr('content')
            }
        });
        jQuery.ajax({
            url: "{{route('Admin-approveOrder')}}",
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

                    var $request = $.get('{{route('Admin-RefreshPendingOrders')}}'); // make request
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


    /**/
    $(".popconfirm2").popConfirm();


    $('#important_action').click(function() {
        alert('You clicked, and valided this button !');
    });
</script>
