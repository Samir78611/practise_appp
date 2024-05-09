<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>

<body>

    <h4>Edit Your student Managment Details</h4>
    <hr>
    <form action="{{url('modify')}}" method="POST" enctype="multipart/form-data">
        @csrf
        <label for="id">StudentID</label>
        <input type="text" id="id" name="id" value="{{ $data[0]->id }}"><br>
        <label for="name">Name:</label>
        <input type="text" id="name" name="name" value="{{ $data[0]->name }}" required><br>

        <label for="city">City:</label>
        <input type="text" id="city" name="city" value="{{ $data[0]->city }}" required><br>

        <label for="photo">Photo:</label>
        <input type="file" id="photo" name="photo" accept="image/jpg, image/gif, image/jpeg"><br>
        <img src="{{url('student/'.$data[0]->photo) }}" alt="" width=100px height=100px>


        <label for="address">Address:</label>
        <input type="text" id="address" name="address" value="{{ $data[0]->address }}"><br>

        <label for="school">School Name:</label>
        <input type="text" id="school" name="school" value="{{ $data[0]->school }}" required><br>

        <input type="submit" class="btn btn-primary" value="Submit">
        <input type="reset" class="btn btn-danger" value="Reset">
        <hr>
    </form>
</body>

</html>
