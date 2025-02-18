<div class="container mx-auto mt-8">
    <h1>Checkout</h1>
    <form action="{{route('checkout.process')}}" method="post" id="checkout-form">
        @csrf
        <div class="mb-4">
            <label for="address">Address</label>
            <input type="text" name="address" id="address">
        </div>
        <div class="mb-4">
            <label for="city">City</label>
            <input type="text" name="city" id="city">
        </div>
        <div class="mb-4">
            <label for="state">State</label>
            <input type="text" name="state" id="state">
        </div>
        <div class="mb-4">
            <label for="postal_code">Postal Code</label>
            <input type="text" name="postal_code" id="postal_code">
        </div>
        <div class="mb-4">
            <label for="country">Country</label>
            <input type="text" name="country" id="country">
        </div>
        <div class="mb-4">
            <h2>Order Summary</h2>
            <ul>
                @foreach($cartItems as $cartItem)
                    <li>{{$cartItem->product->name}} x {{$cartItem->quantity}} - {{$cartItem->product->name}} * {{$cartItem->quantity}}</li>
                @endforeach
            </ul>
            <p>Total:  {{$cartItem->sum(function ($item){return $item->product->price * $item->quantity; }) }}</p>
        </div>
        <div class="mb-4">
            <label for="card-element">Credit or Debit Card:</label>
            <div id="card-element"></div>
        </div>
        <button type="submit">Submit Payment</button>
    </form>
</div>
