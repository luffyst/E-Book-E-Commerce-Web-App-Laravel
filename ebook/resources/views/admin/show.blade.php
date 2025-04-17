<!doctype html>
<html lang="en">

<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <title>Show Books</title>
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
              <th scope="col">Book Name</th>
              <th scope="col">Book Price</th>
              <th scope="col">Book Quantity</th>
              <th scope="col">Book Cover</th>
              <th scope="col">Book</th>
              <th scope="col">Action</th>

            </tr>
          </thead>
          <tbody>
            @foreach($books as $prod)
            <tr>
              <td>{{$prod->id}}</td>
              <td>{{$prod->name}}</td>
              <td>{{$prod->product_price}}</td>
              <td>{{$prod->product_quantity}}</td>
              <td><img class="img" src="{{asset($prod->img)}}" alt=""></td>
              <td><a href="{{asset($prod->book)}}" target="_blank"><i class="fa-regular fa-file-pdf fa-lg"></i></a></td>
              

              <td>
                <a href="{{route('edit',$prod->id)}}" class="btn btn-primary btn-sm">Edit</a>
                <a href="{{route('destroy',$prod->id)}}" class="btn btn-danger btn-sm">Delete</a>
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