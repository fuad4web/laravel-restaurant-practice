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

            <div class="card">
                <div class="card-body">
                <h4 class="card-title">Upload Chefs</h4>
                <p class="card-description"> Upload Chefs </p>
                    <form action="{{url('/chefses')}}" method="post" enctype="multipart/form-data">
                        @csrf
                        <div class="form-group">
                            <label for="title">Name</label>
                            <input type="text" name="chefname" class="form-control" id="name" placeholder="Chef Name" required>
                        </div>
                        <div class="form-group">
                        <label>Image upload</label>
                            <div class="input-group col-xs-12">
                                <input type="file" name="chefimage" class="form-control" if="chefimage" required>
                            </div>
                        </div>
                        <div class="form-group">
                            <label for="price">Chef Role</label>
                            <input type="text" name="chefrole" class="form-control" id="chefrole" placeholder="Enter Chefrole" required>
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
                        <th> Chefname </th>
                        <th> Chef Image </th>
                        <th> Chef Role </th>
                        <th> Actions </th>
                    </tr>
                </thead>
                <tbody>

                @foreach($chefs as $chef)
                    <tr>
                        <td>{{$chef -> id}}</td>
                        <td> {{$chef -> name}} </td>
                        <td><img src="/chefImage/{{$chef -> image}}" alt="ChefImage"></td>
                        <td> {{$chef -> role}} </td>
                        <td>
                            <a href="{{url('/deletechef', $chef->id)}}" style="text-decoration: none;">Del</a>
                            <a href="{{url('/updatechefs', $chef->id)}}" style="text-decoration: none;">Updt</a>
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
