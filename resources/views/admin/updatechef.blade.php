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
                <h4 class="card-title">Update Chef</h4>
                <p class="card-description"> Update Chef </p>
                    <form class="" action="{{url('/updatechef', $chefs->id)}}" method="post" enctype="multipart/form-data">
                        @csrf
                        <div class="form-group">
                            <label for="title">Chef Name</label>
                            <input type="text" name="name" class="form-control" id="name" value="{{$chefs->name}}" required>
                        </div>
                        <div class="form-group">
                        <label>Chef Image</label>
                            <div class="input-group col-xs-12">
                                <img src="/chefImage/{{$chefs -> image}}" width="100" height="100" alt="foodImage"><br>
                                <input type="file" name="image" value="{{$chefs -> image}}" class="form-control">
                            </div>
                        </div><br>
                        <div class="form-group">
                            <label for="price">Chef Role</label>
                            <input type="text" name="role" class="form-control" id="role" value="{{$chefs->role}}" required>
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
