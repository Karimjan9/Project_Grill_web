@extends('layouts.app')

@section('content')
<div class="container">
    <table class=" table  table-striped">
       <tr>
           <th>Id</th>
           <th>Surname</th>
           <th>Name</th>
           <th>Fathername</th>
           <th>Email</th>
           <th>Phone</th>
           <th>Status</th>
           <th>Role</th>
           <th></th>
           <th></th>
       </tr>
       @foreach ($allusers as $user)
       <tr>
           <td>{{$user->id}}</td>
           <td>{{$user->surname}}</td>
           <td>{{$user->name}}</td>
           <td>{{$user->fathername}}</td>
           <td>{{$user->email}}</td>
           <td>{{$user->phone}}</td>
           <td>{{$allstatus[$user->status]}}</td>
           <td>{{$allRoles[$user->role]}}</td>
           <td><a href="/edit_user/{{$user->id}} "class="btn btn-primary">Edit</a></td>
           
           <td>
                <form action="/delete_user/{{$user->id}}"  onsubmit="return confirm('Are you sure you want to delete this user?');" method="POST">
                    @csrf
                <input type="submit" value="Delete" class="btn btn-danger" >
                </form>
            </td>
       </tr>
       @endforeach
   </table>
   <div class="container">
        {{$users->links('pagination::bootstrap-4')}}
    </div>
    
</div>

<div style="height:300px">
</div>
@endsection