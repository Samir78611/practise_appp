<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <!-- <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous"> -->
    <!-- <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script> -->

</head>

<body>
    <h2>{{$name}}</h2>
    @if(Session::has('success'))
        <h2 style="color:green">{{ Session::get('success') }}</h2>
    @endif

    @if(Session::has('fail'))
        <h2 style="color:red">{{ Session::get('fail') }}</h2>
    @endif
    <h3>Student Managment System</h3>
    <form action="{{url('student_id')}}" method="POST" enctype="multipart/form-data">
        @csrf
        <label for="name">Name:</label>
        <input type="text" id="name" name="name" required><br>

        <label for="city">City:</label>
        <input type="text" id="city" name="city" required><br>

        <label for="photo">Photo:</label>
        <input type="file" id="photo" name="photo" accept="image/jpg, image/gif, image/jpeg" required><br>

        <label for="address">Address:</label>
        <textarea id="address" name="address" required></textarea><br>

        <label for="school">School Name:</label>
        <input type="text" id="school" name="school" required><br>

        <input type="submit" class="btn btn-primary" value="Submit">
        <input type="reset" class="btn btn-danger" value="Reset"><hr>
    </form>

    <table border=1>
        <tr>
            <th>Name</th>
            <th>city</th>
            <th>Photo</th>
            <th>Address</th>
            <th>School Name</th>
            <th>Edit and Update</th>
            <th>Delete</th>
        </tr>
        <tr>
        @foreach($retrive as $user_details)
            <td>{{$user_details->name}}</td>
            <td>{{$user_details->city}}</td>
            <td><img src="{{url('student/'.$user_details->photo)}}" alt="" width=100px height=100px></td>
            <td>{{$user_details->address}}</td>
            <td>{{$user_details->school}}</td>
            <td><a href="#">edit</a></td>
            <td><a href="{{url('delete_user/'.$user_details->id)}}">delete</a></td>
        </tr>
        @endforeach
    </table>

</body>

</html>
