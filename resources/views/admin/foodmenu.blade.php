<x-app-layout>

</x-app-layout>

<!DOCTYPE html>
<html lang="en">
  <head>
    
    @include('admin/admincss')

  </head>
  <body>
    
  <div class="container-scroller">

    @include('admin.navbar')

    <div class="display-users my-5">

        <div class="col-lg-12 grid-margin stretch-card my-5">

        <!-- @if($errors->any())
            @foreach($errors->all() as $error)
                <li>{{$error}}</li>
            @endforeach
        @endif -->

            <div class="card">
                <div class="card-body">
                    <h4 class="card-title">Different types of Food</h4>
                    <p class="card-description"> Different types of Food </p>
                    <form class="" action="{{url('/uploadfood')}}" method="post" enctype="multipart/form-data">
                        @csrf
                        <div class="form-group">
                            <label for="title">Title</label>
                            <input type="text" name="title" class="form-control" id="title" placeholder="Enter the Title" required>
                        </div>
                        <div class="form-group">
                        <label>Image upload</label>
                            <div class="input-group col-xs-12">
                                <input type="file" name="image" class="form-control" required>
                            </div>
                        </div>
                        <div class="form-group">
                            <label for="price">Price</label>
                            <input type="num" name="price" class="form-control" id="price" placeholder="Enter the Price" required>
                        </div>
                        <div class="form-group">
                            <label for="description">Description</label>
                            <textarea class="form-control" name="description" placeholder="Enter Description" id="description" rows="4"></textarea>
                        </div>
                        <button type="submit" class="btn btn-primary mr-2">Submit</button>
                        <button class="btn btn-dark">Cancel</button>
                    </form>
                </div>
            </div>
        </div>

        <div class="col-md-12">
            <table class="table">
                <thead>
                    <tr>
                        <th>S/N</th>
                        <th> Title </th>
                        <th> Price </th>
                        <th> Image </th>
                        <th> Description </th>
                        <th> Actions </th>
                    </tr>
                </thead>
                <tbody>

                @foreach($foods as $food)
                    <tr>
                        <td>{{$food -> id}}</td>
                        <td>{{$food -> title}}</td>
                        <td> {{$food -> price}} </td>
                        <td><img src="/foodimage/{{$food -> image}}" alt="foodImage"></td>
                        <td> {{$food -> description}} </td>
                        <td>
                            <a href="{{url('/deletefood', $food->id)}}" style="text-decoration: none;">Del</a>
                            <a href="{{url('/updatefoods', $food->id)}}" style="text-decoration: none;">Updt</a>
                        </td>
                    </tr>
                @endforeach

                </tbody>
            </table>
        </div>

    </div>

  </div>

    @include('admin/adminscript')

  </body>
</html>
