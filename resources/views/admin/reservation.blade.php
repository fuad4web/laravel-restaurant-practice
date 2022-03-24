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

        <div class="col-md-12">
            <table class="table">
                <thead>
                    <tr>
                        <th>S/N</th>
                        <th> Name </th>
                        <th> Email </th>
                        <th> Phone </th>
                        <th> Guest </th>
                        <th> Date </th>
                        <th> Time </th>
                        <th> Message </th>
                        <th>Actions</th>
                    </tr>
                </thead>
                <tbody>

                @foreach($reservations as $reservation)
                    <tr>
                        <td>{{$reservation -> id}}</td>
                        <td>{{$reservation -> name}}</td>
                        <td> {{$reservation -> email}} </td>
                        <td> {{$reservation -> phone}} </td>
                        <td>{{$reservation -> guest}}</td>
                        <td> {{$reservation -> date}} </td>
                        <td> {{$reservation -> time}} </td>
                        <td>{{$reservation -> message}}</td>
                        <td>
                            <a href="{{url('/reservation', $reservation->id)}}" style="text-decoration: none;">Del</a>
                            <a href="{{url('/reservation', $reservation->id)}}" style="text-decoration: none;">Updt</a>
                        </td>
                    </tr>
                @endforeach

                </tbody>
            </table>
        </div>

    </div>

    @include('admin/adminscript')

  </body>
</html>
