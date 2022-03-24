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

    <div class="container-fluid page-body-wrapper">
        <!-- partial:partials/_navbar.html -->
        <nav class="navbar p-0 fixed-top d-flex flex-row">
          <div class="navbar-menu-wrapper flex-grow d-flex align-items-stretch">
            <ul class="navbar-nav w-100">
              <li class="nav-item w-100">
                <form action="{{url('/searchorders')}}" method="get" class="nav-link mt-2 mt-md-0 d-none d-lg-flex search">
                  <input type="text" name="search" class="form-control" placeholder="Search Orders">
                  <input type="submit" class="btn btn-danger form-control" value="Search">
                </form>
              </li>
            </ul>
          </div>
        </nav>


        <div class="col-md-12">
            <table class="table">
                <thead>
                    <tr>
                        <th>Ordered?</th>
                        <th>S/N</th>
                        <th> Name </th>
                        <th> Foodname </th>
                        <th> Quantity </th>
                        <th> Address </th>
                        <th> Phone </th>
                        <th> Total Price </th>
                    </tr>
                </thead>
                <tbody>

                @foreach($orders as $order)
          <form action="{{url('/ordered', $order->id)}}" method="POST">
            @csrf
                    <tr>
                        <td><button type="submit" class="btn btn-success form-control">Ordered</button></td>
                        <td>{{$order -> id}}</td>
                        <td>{{$order -> name}}</td>
                        <td> {{$order -> foodname}} </td>
                        <td> {{$order -> quantity}} </td>
                        <td> {{$order -> phone}} </td>
                        <td> {{$order -> address}} </td>
                        <td> {{$order -> price}} </td>
                    </tr>
            </form>
                @endforeach

                </tbody>
            </table>
        </div>

    </div>
    </div>

  </div>

    @include('admin/adminscript')

  </body>
</html>
