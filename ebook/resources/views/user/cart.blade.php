<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Shopping Cart</title>
  <style>
    section {
      max-width: 1000px;
      margin: 20px auto;
      padding: 20px;
      background-color: #ffffff;
      box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
      border-radius: 8px;
      margin-top: 180px;
      margin-bottom: 100px;
    }

    .cart {
      display: flex;
      flex-direction: column;
    }

    table {
      width: 100%;
      border-collapse: collapse;
      margin-bottom: 20px;
    }

    th,
    td {
      padding: 15px;
      text-align: left;
      border-bottom: 1px solid #dee2e6;
    }

    th {
      background-color: black;
      color: #ffffff;
    }

    .total {
      display: flex;
      justify-content: space-between;
      align-items: center;
      padding: 15px;
      font-weight: bold;
      border-top: 1px solid #dee2e6;
    }

    .payment-methods {
      display: flex;
      flex-direction: column;
    }

    .payment-method {
      margin-bottom: 10px;
    }

    a button {
      background-color: #bd44a0;
      color: #ffffff;
      padding: 15px;
      border: none;
      border-radius: 4px;
      cursor: pointer;
      font-size: 16px;
      transition: background-color 0.3s ease;
    }

    button:hover {
      background-color: #81256c;
    }
  </style>
</head>

<body>
  @include('user.nav')
  <section>
    <div class="cart">
      <!-- ... (your existing HTML) ... -->
<table>
    <thead>
        <tr>
            <th scope="col">Book Cover</th>
            <th scope="col">Book Name</th>
            <th scope="col">Book Price</th>
            <th scope="col">Book Quantity</th>
            <th scope="col">Total</th>
            <th scope="col">Action</th>
        </tr>
    </thead>
    <tbody>
        @php
        $subtotal = 0;
        @endphp
        @foreach($carts as $cart)
        <tr>
         
            <td><img src="{{ asset($cart->img) }}" alt="{{ $cart->name }}" width="100"></td>
            <td>
              {{$cart->name}}</td>
            <td class="price">${{$cart->price}}</td>
            <form action="{{route('update.quantity',$cart->id)}}">
              @csrf
            <td>
              <input type="number" name="qty" class="quantity-input"  value="{{$cart->qty}}">
          </td>
          </form>

            <td class="total-price">${{$cart->price * $cart->qty}}</td>
            <td> <a href="{{route('cart.remove',$cart->id)}}" class="btn btn-danger">Remove</a></td>
        </tr>
        @php
        $subtotal += $cart->price * $cart->qty;
        @endphp
        @endforeach
    </tbody>
</table>

<!-- ... (your existing HTML) ... -->




      <div class="total">
        <span>Total:</span>
        <span>${{$subtotal}}</span>
      </div>
      <div class="payment-methods">
        <div class="payment-method">
          <input type="radio" name="payment" id="creditCard">
          <label for="creditCard">Credit Card</label>
        </div>
        <div class="payment-method">
          <input type="radio" name="payment" id="paypal">
          <label for="paypal">PayPal</label>
        </div>
        <div class="payment-method">
          <input type="radio" name="payment" id="cod">
          <label for="cod">Cash On Delivery</label>
        </div>

      </div>



      <a href="{{ route('checkout') }}"><button>Checkout</button></a>
    </div>
  </section>
  @include('user.footer')
  <script>
    function checkout() {
      // Add your checkout logic here (e.g., redirect to a payment page).
      alert('Checkout clicked!');
    }
  </script>
  <script>
   
    function checkout() {
      // Add your checkout logic here (e.g., redirect to a payment page).
      alert('Checkout clicked!');
    }
  </script>
</body>

</html>