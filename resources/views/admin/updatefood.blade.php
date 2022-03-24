<x-app-layout>

</x-app-layout>

<!DOCTYPE html>
<html lang="en">
  <head>

    <base href="/public">

    @include('admin/admincss')

  </head>
  <body>

  <div class="container-scroller">

    @include('admin.navbar')

    <div class="display-users my-5">
        <div class="card">
                <div class="card-body">
                <h4 class="card-title">Basic form elements</h4>
                <p class="card-description"> Basic form elements </p>
                    <form class="" action="{{url('/updatefood', $foods->id)}}" method="post" enctype="multipart/form-data">
                        @csrf
                        <div class="form-group">
                            <label for="title">Title</label>
                            <input type="text" name="title" class="form-control" id="title" value="{{$foods->title}}" required>
                        </div>
                        <div class="form-group">
                        <label>Image upload</label>
                            <div class="input-group col-xs-12">
                                <img src="/foodimage/{{$foods -> image}}" width="100" height="100" alt="foodImage"><br>
                                <input type="file" name="image" value="{{$foods -> image}}" class="form-control">
                            </div>
                        </div><br>
                        <div class="form-group">
                            <label for="price">Price</label>
                            <input type="num" name="price" class="form-control" id="price" value="{{$foods->price}}" required>
                        </div>
                        <div class="form-group">
                            <label for="description">Description</label>
                            <textarea class="form-control" name="description" id="description" rows="4">{{$foods->description}}</textarea>
                        </div>
                        <button type="submit" class="btn btn-primary mr-2">Update</button>
                        <button class="btn btn-dark">Cancel</button>
                    </form>
                </div>
            </div>
        </div>
    </div>

  </div>

    @include('admin/adminscript')

  </body>
</html>
