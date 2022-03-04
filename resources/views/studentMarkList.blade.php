<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@3.3.7/dist/css/bootstrap.min.css">
</head>

<body>
    <div class="navbar">
        <a class="btn btn-primary" href="{{ url('student/insert') }}" role="button">AddStudent</a>
        <a class="btn btn-primary" href="{{ url('student/list') }}" role="button">StudentList</a>
        <a class="btn btn-primary" href="{{ url('marks/insert') }}" role="button">AddMarks</a>
        <a class="btn btn-primary" href="{{ url('marks/list') }}" role="button">MarkList</a>


    </div>
    <table border="1">
        <tr>
            <th>ID</th>
            <th>Name</th>
            <th>Maths</th>
            <th>Science</th>
            <th>History</th>
            <th>Term</th>
            <th>Total Marks</th>
            <th>Created On</th>
            <th>Action</th>
        </tr>
        @foreach($response as $data)
        <tr>
            <td>{{$data->id}}</td>
            <td>{{$data->student->Name}}</td>
            <td>{{$data->maths}}</td>
            <td>{{$data->science}}</td>
            <td>{{$data->history}}</td>
            <td>{{$data->termSelection}}</td>
            <td>{{$totalMarks = $data->maths + $data->science + $data->history}}</td>
            <td>{{$data->created_at}}</td>
            <td><a href="{{ url('marks/edit', ['studentMarkId' => $data->id]) }}">Edit</a>/
                <a href="{{ url('marks/delete', ['studentMarkId' => $data->id]) }}" onclick="return confirm('Are you sure you want to delete this student marks?');">Delete</a>
            </td>
        </tr>
        @endforeach
    </table>
</body>

</html>