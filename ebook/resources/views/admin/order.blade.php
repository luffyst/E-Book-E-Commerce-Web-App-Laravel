<!doctype html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Show Products</title>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.2/css/all.min.css">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-4bw+/aepP/YC94hEpVNVgiZdgIC5+VKNBQNGCHeKRQN+PtmoHDEXuppvnDJzQIu9" crossorigin="anonymous">
    <style>
        .img {
            height: 100px;
            border-radius: 50%;
        }
    </style>
</head>

<body>
    @include('admin.adminnav')
    <div class="card-body mt-2">
        <div class="row">
            <!-- <div class="col-lg-2"></div> -->
            <div class="col-lg-12">
                <table class="table" style="text-align: center;">
                    <thead>
                        <tr>
                            <th scope="col">#</th>
                            <th scope="col">User_ID</th>
                            <th scope="col">Name</th>
                            <th scope="col">Email</th>
                            <th scope="col">Address</th>
                            <th scope="col">City</th>
                            <th scope="col">Book_ID</th>
                            <th scope="col">Price</th>
                            <th scope="col">Quantity</th>
                            <th scope="col">Status</th>

                        </tr>
                    </thead>
                    <tbody>
                        @foreach($orders as $order)
                        <tr>
                            <td>{{ $order->id }}</td>
                            <td>{{ $order->user_id }}</td>
                            <td>{{ $order->user->name }}</td>
                            <td>{{ $order->user->email }}</td>
                            <td>{{ $order->user->city }}</td>
                            <td>{{ $order->book_id }}</td>
                            <td>{{ $order->book->price }}</td>
                            <td>{{ $order->quantity }}</td>
                            <td>
                                @if($order->status == 1)
                                <!-- <a href="{{route('cat.deactive',$cat->id)}}}}" class="btn btn-primary">Deactive</a> -->
                                <p>Active</p>
                                @else
                                <!-- <a href="{{route('cat.active',$cat->id)}}" class="btn btn-primary">Active</a> -->
                                <p>Deactive</p>
                                @endif
                            </td>
                            <td>
                                <a href="{{route('order.active',$order->id)}}" class="btn btn-primary">Active</a>
                                <a href="{{route('order.deactive',$order->id)}}}}" class="btn btn-primary">Deactive</a>
                            </td>

                        </tr>
                        @endforeach

                    </tbody>
                </table>
            </div>
        </div>
    </div>
    @include('admin.adminfooter')



    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.1/dist/js/bootstrap.bundle.min.js" integrity="sha384-HwwvtgBNo3bZJJLYd8oVXjrBZt8cqVSpeBNS5n7C8IVInixGAoxmnlMuBnhbgrkm" crossorigin="anonymous"></script>
</body>

</html>