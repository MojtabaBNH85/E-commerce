<div class="container mx-auto mt-8">
    <h1 class="text-3xl font-bont-mb-4">
        Shopping Cart
    </h1>
    @if ($message= Session::get('success'))
        <div class="bg-green-500 text-white p-4 mb-4">
            {{$message}}
        </div>
    @endif
</div>


@if($cartItems->isEmpty())
    <p class="text-gray-700">
        Your Cart is empty.
    </p>
@else
    <table class="min-w-full bg-white">
        <thead>
            <tr>
                <th>Product</th>
                <th>Quantity</th>
                <th>Price</th>
                <th>Total</th>
                <th>Actions</th>
            </tr>
        </thead>
        <tbody>
            @foreach($cartItems as $cartItem)
                <tr>
                    <td>{{$cartItem->product->name}}</td>
                    <td>
                        <form action="{{route('cart.update',$cartItem->id)}}" method="POST">
                            @csrf
                            @method('PATCH')
                            <input type="number" name="quantity" value="{{$cartItem->quantity}}">
                            <button type="submit">Update</button>
                        </form>
                    </td>
                    <td>{{$cartItem->product->price * 1}}</td>
                    <td>{{$cartItem->product->price * $cartItem->quantity}}</td>
                    <td>
                        <form action="{{route('cart.destroy' , $cartItem->id)}}" method="post">
                            @csrf
                            @method('DELETE')
                            <button type="submit">Remove</button>
                        </form>
                    </td>
                </tr>
            @endforeach
        </tbody>
    </table>

    <div class="mt-4">
        <a href="#">Proceed To Checkout</a>
    </div>
@endif
