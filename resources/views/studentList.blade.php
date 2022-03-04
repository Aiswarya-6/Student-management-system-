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

    <table border="1" >
        <tr>
            <th>ID</th>
            <th>Name</th>
            <th>Age</th>
            <th>Gender</th>
            <th>ReportingTeacher</th>
            <th>Action</th>
        </tr>
        @foreach($response as $data)
        <tr>

            <td>{{ $data->id }}</td>
            <td>{{ $data->Name }}</td>
            <td>{{ $data->Age }}</td>
            <td>{{ $data->Gender }}</td>
            <td>{{ $data->teacher->ReportingTeacher}}</td>
            <td><a href="{{ url('student/edit', ['studentId' => $data->id]) }}">Edit</a>/
                <a href="{{ url('student/delete', ['studentId' => $data->id]) }}" onclick="return confirm('Are you sure you want to delete this student?');">Delete</a>
            </td>

        </tr>

        @endforeach
    </table>

</body>

</html>