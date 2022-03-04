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
    
    <form action="{{ url('student/create') }}" method="post">
        @csrf
        <table class="table-bordered">
            <tr>
                <th>Name</th>
                <td><input type="text" name="Name" id="" required></td>
            </tr>
            <tr>
                <th>Age</th>
                <td><input type="number" name="Age" id="" required></td>
            </tr>
            <tr>
                <th>Gender</th>
                <td>Male<input type="radio" name="Gender" id="" value="M">
                    Female<input type="radio" name="Gender" id="" value="F"></td>

            </tr>
            <tr>
                <th>Reporting Teacher</th>
                <td><select name="ReportingTeacherId" id="" required>
                        @foreach($teacher as $data)

                        <option value="{{ $data->id }}">{{$data->ReportingTeacher}}</option>
                        @endforeach

                    </select></td>
            </tr>
        </table>
        <input type="submit" value="Submit">
    </form>
</body>

</html>