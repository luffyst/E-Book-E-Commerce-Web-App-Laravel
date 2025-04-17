@extends('admin.master')
@section('code')
<!doctype html>
<html lang="en">

<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <title>Add Your Books</title>
  <link rel="stylesheet" href="{{asset('admin/vendors/mdi/css/materialdesignicons.min.css')}}">
  <link rel="stylesheet" href="{{asset('admin/vendors/css/vendor.bundle.base.css')}}">
  <!-- endinject -->
  <!-- Plugin css for this page -->
  <!-- End plugin css for this page -->
  <!-- inject:css -->
  <!-- endinject -->
  <!-- Layout styles -->
  <link rel="stylesheet" href="{{asset('admin/css/style.css')}}">
  <!-- End layout styles -->
  <link rel="shortcut icon" href="{{asset('admin/images/favicon.ico')}}" />
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-4bw+/aepP/YC94hEpVNVgiZdgIC5+VKNBQNGCHeKRQN+PtmoHDEXuppvnDJzQIu9" crossorigin="anonymous">

</head>

<body>

  <div class="card-body mt-2">
    <h4 class="card-title">Add Books Here</h4>
    <form class="forms-sample" method="POST" action="{{route('store')}}" enctype="multipart/form-data">
      @csrf
      <div class="form-group">
        <label for="exampleInputUsername1">Book Name</label>
        <input type="text" name="name" class="form-control" id="exampleInputUsername1" placeholder="Book name" required maxlength="255">

      </div>
      <label for="exampleInputUsername1">Book Category</label>
      <select class="form-select" aria-label="Default select example" name="category" required>
        <option selected>Select book Category</option>

        @foreach($categories as $category)
        <option value="{{ $category->id }}">{{ $category->name }}</option>
        @endforeach
      </select>
      <div class="form-group">
        <label for="exampleInputEmail1">Book Description</label>
        <input type="text" name="desc" class="form-control" id="exampleInputEmail1" placeholder="Description" required>

      </div>
      <div class="form-group">
        <label for="exampleInputPassword1">Price</label>
        <input type="number" name="price" class="form-control" id="exampleInputPassword1" placeholder="Price" required min="0" step="0.01">

      </div>
      <div class="form-group">
        <label for="exampleInputConfirmPassword1">Quantity</label>
        <input type="number" name="qty" class="form-control" id="exampleInputConfirmPassword1" placeholder="Quantity" required min="0" step="1">

      </div>
      <div class="form-group">
        <label for="exampleInputConfirmPassword1">Image</label>
        <input type="file" name="img" class="form-control" id="exampleInputConfirmPassword1" placeholder="Book Image" required accept="image/*">

      </div>
      <div class="form-group">
        <label for="exampleInputConfirmPassword1">Books</label>

        <input type="file" name="book" class="form-control" id="exampleInputConfirmPassword1" placeholder="Insert book file here" required accept=".pdf">
      </div>
      <button type="submit" name="submit" class="btn btn-gradient-primary me-2">Submit</button>

    </form>
  </div>
  <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.8/dist/umd/popper.min.js" integrity="sha384-I7E8VVD/ismYTF4hNIPjVp/Zjvgyol6VFvRkX/vR+Vc4jQkC+hVqc2pM8ODewa9r" crossorigin="anonymous"></script>
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.1/dist/js/bootstrap.min.js" integrity="sha384-Rx+T1VzGupg4BHQYs2gCW9It+akI2MM/mndMCy36UVfodzcJcF0GGLxZIzObiEfa" crossorigin="anonymous"></script>
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.1/dist/js/bootstrap.bundle.min.js" integrity="sha384-HwwvtgBNo3bZJJLYd8oVXjrBZt8cqVSpeBNS5n7C8IVInixGAoxmnlMuBnhbgrkm" crossorigin="anonymous"></script>
</body>

</html>
@endsection