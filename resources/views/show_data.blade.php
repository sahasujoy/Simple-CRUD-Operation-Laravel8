<!doctype html>
<html lang="en">
  <head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">

    <title>Hello, world!</title>
  </head>
  <body>
      <div class="container">
          <a href="{{url('/add-data')}}" class="btn btn-primary my-3">Add Data</a>
          @if(Session::has('msg'))
          <p class="alert alert-success">{{Session::get('msg')}}</p>
          @endif
      <table class="table table-bordered">
  <thead>
    <tr>
      <th scope="col">#</th>
      <th scope="col">Name</th>
      <th scope="col">Email</th>
      <th scope="col" colspan="2">Actions</th>
    </tr>
  </thead>
  <tbody>
     @foreach($showData as $key=>$data) 
    <tr>
      <td>{{$key+1}}</td>
      <td>{{$data->name}}</td>
      <td>{{$data->email}}</td>
      <td><a href="{{ url('/edit-data/'.$data->id) }}" class="btn btn-success">Edit</a></td>
      <td><a href="{{ url('/delete-data/'.$data->id) }}" onclick= "return confirm('Are you sure to delete??')" class="btn btn-danger">Delete</a></td>
    </tr>
    @endforeach
  </tbody>
</table>
{{$showData->links()}}
      </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p" crossorigin="anonymous"></script>
  </body>
</html>