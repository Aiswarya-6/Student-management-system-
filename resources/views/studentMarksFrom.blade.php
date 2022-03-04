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
    <form action="{{ url('marks/create') }}" method="post">
        @csrf

        <table class="table-bordered">
            <tr>
                <th>Student </th>
                <td><select name="studentId" id="">
                        @foreach($student as $data)

                        <option value="{{ $data->id }}">{{$data->Name}}</option>
                        @endforeach

                    </select></td>
            </tr>
            <tr>
                <th>Term Selection</th>
                <td><input type="text" name="termSelection" id=""></td>
            </tr>
            <tr>
                <th>Maths </th>
                <td><input type="number" name="maths" id=""></td>
            </tr>
            <tr>
                <th>Science</th>
                <td><input type="number" name="science" id=""></td>
            </tr>
            <tr>
                <th>History</th>
                <td><input type="number" name="history" id=""></td>
            </tr>
            <tr>
                <td><input type="submit" value="ADD"></td>
            </tr>
        </table>
    </form>
</body>

</html>