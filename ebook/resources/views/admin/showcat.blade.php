<!doctype html>
<html lang="en">

<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <title>Show Products</title>
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
              <th scope="col">Category Name</th>
              <th scope="col">Status</th>
              <th scope="col">Status change</th>
              <th scope="col">Action</th>

            </tr>
          </thead>
          <tbody>
            @foreach($categories as $cat)
            <tr>
              <td>{{$cat->id}}</td>
              <td>{{$cat->name}}</td>
              <td>
                @if($cat->status == 1)
                <!-- <a href="{{route('cat.deactive',$cat->id)}}}}" class="btn btn-primary">Deactive</a> -->
                <p>Active</p>
                @else
                <!-- <a href="{{route('cat.active',$cat->id)}}" class="btn btn-primary">Active</a> -->
                <p>Deactive</p>
                @endif
              </td>
              <td>
                <a href="{{route('cat.active',$cat->id)}}" class="btn btn-primary">Active</a>
                <a href="{{route('cat.deactive',$cat->id)}}}}" class="btn btn-primary">Deactive</a>
              </td>
              <td>


                <a href="{{route('edit.cat',$cat->id)}}" class="btn btn-primary btn-sm">Edit</a>
                <a href="{{route('destroy',$cat->id)}}" class="btn btn-danger btn-sm">Delete</a>
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