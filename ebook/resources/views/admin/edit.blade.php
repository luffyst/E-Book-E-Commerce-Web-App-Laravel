<!doctype html>
<html lang="en">

<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <title>Add Your Products</title>
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-4bw+/aepP/YC94hEpVNVgiZdgIC5+VKNBQNGCHeKRQN+PtmoHDEXuppvnDJzQIu9" crossorigin="anonymous">
  <!-- <style>
    .form {
      text-align: center;
      border: 5px;
      width: 100%;
      background-color: #e9ecef;
      color: gray;
      font-family: var(--bs-font-sans-serif);
      font-weight: bold;

    }

    .form input {
      width: 80%;
      text-align: center;
      color: black;
    }

    .form button {
      border-radius: 8px;
      width: 100px;
      height: 35px;
      margin-bottom: 10px;
    }

    h1 {
      color: #b66dff;
    }
  </style> -->
</head>

<body>
  @include('admin.adminnav')
  
  <div class="card-body mt-2">
    <h4 class="card-title">Edit Books Here</h4>
    <form class="forms-sample" method="POST" action="{{route('update',$books->id)}}" enctype="multipart/form-data">
      @csrf
      <div class="form-group">
        <label for="exampleInputUsername1">Book Name</label>
        <input type="text" name="name" class="form-control" value="{{$books->name}}" id="exampleInputUsername1" placeholder="Book name">
      </div>
      <div class="form-group">
            <label for="category_id">Select book Category</label>
            <select class="form-control" id="category_id" name="category_id">
                @foreach($categories as $category)
                    <option value="{{ $category->id }}" {{ $books->category_id == $category->id ? 'selected' : '' }}>
                        {{ $category->name }}
                    </option>
                @endforeach
            </select>
        </div>
      <div class="form-group">
        <label for="exampleInputEmail1">Book Description</label>
        <input type="text" name="desc" class="form-control" value="{{$books->desc}}" id="exampleInputEmail1" placeholder="Description">
      </div>
      <div class="form-group">
        <label for="exampleInputPassword1">Price</label>
        <input type="text" name="price" class="form-control" value="{{$books->price}}"id="exampleInputPassword1" placeholder="Price">
      </div>
      <div class="form-group">
        <label for="exampleInputConfirmPassword1">Quantity</label>
        <input type="number" name="qty" class="form-control"value="{{$books->qty}}" id="exampleInputConfirmPassword1" placeholder="Quantity">
      </div>
      <div class="form-group">
        <label for="exampleInputConfirmPassword1">Image</label>
        <input type="file" name="img" class="form-control"value="{{$books->img}}" id="exampleInputConfirmPassword1" placeholder="Book Image">
      </div>
      <div class="form-group">
        <label for="exampleInputConfirmPassword1">Books</label>
        <input type="file" name="book" class="form-control"value="{{$books->book}}" id="exampleInputConfirmPassword1" placeholder="Insert book file here">
      </div>
      <button type="submit" class="btn btn-gradient-primary me-2">Submit</button>

    </form>
  </div>
  @include('admin.adminfooter')
  <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.8/dist/umd/popper.min.js" integrity="sha384-I7E8VVD/ismYTF4hNIPjVp/Zjvgyol6VFvRkX/vR+Vc4jQkC+hVqc2pM8ODewa9r" crossorigin="anonymous"></script>
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.1/dist/js/bootstrap.min.js" integrity="sha384-Rx+T1VzGupg4BHQYs2gCW9It+akI2MM/mndMCy36UVfodzcJcF0GGLxZIzObiEfa" crossorigin="anonymous"></script>
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.1/dist/js/bootstrap.bundle.min.js" integrity="sha384-HwwvtgBNo3bZJJLYd8oVXjrBZt8cqVSpeBNS5n7C8IVInixGAoxmnlMuBnhbgrkm" crossorigin="anonymous"></script>
  
</body>

</html>