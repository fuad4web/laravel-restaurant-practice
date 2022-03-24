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
        <table class="table">
            <thead>
                <tr>
                    <th>S/N</th>
                    <th> Full-Name </th>
                    <th> E-mail </th>
                    <th> Action </th>
                </tr>
            </thead>
            <tbody>

            @foreach($datas as $data)
                <tr>
                    <td>{{$data -> id}}</td>
                    <td>{{$data -> name}}</td>
                    <td> {{$data -> email}} </td>
                    @if($data->usertype == "0")
                    <td>
                        <a href="{{url('/deleteuser', $data->id)}}" style="text-decoration: none;">Delete</a>
                    </td>
                    @else
                    <td>
                        <a href="#" style="text-decoration: none;">Update</a>
                    </td>
                    @endif
                </tr>
            @endforeach

            </tbody>
        </table>
    </div>

  </div>

    @include('admin/adminscript')

  </body>
</html>
