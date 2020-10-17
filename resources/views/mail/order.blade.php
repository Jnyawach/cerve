<h3>New Order Just arrived</h3>
<p>You've received a new order </p>
<p>Order No:{{$order_id}}</p>
<p>Order List:</p>
 @foreach($cart as $item)
    <p>{{$item->name}}</p>
    @endforeach
