<!DOCTYPE html>
<html>
<head>
    <title>Courses Overview</title>
    <style>
        table {
            width: 100%;
            border-collapse: collapse;
            margin-top: 20px;
        }

        th, td {
            border: 1px solid #ccc;
            padding: 10px;
            text-align: left;
        }

        th {
            background-color: #f4f4f4;
        }

        tr:nth-child(even) {
            background-color: #fafafa;
        }

        a.button {
            display: inline-block;
            padding: 5px 10px;
            margin-right: 5px;
            background-color: #007bff;
            color: #fff;
            text-decoration: none;
            border-radius: 3px;
            font-size: 0.9em;
        }

        a.button.delete {
            background-color: #dc3545;
        }
    </style>
</head>
<body>
<h1>My Courses</h1>

<table>
    <thead>
    <tr>
        <th>ID</th>
        <th>Titel</th>
        <th>Startdatum</th>
        <th>Einddatum</th>
        <th>Aantal Modules</th>
        <th>Acties</th>
    </tr>
    </thead>
    <tbody>
    @foreach($courses as $course)
        <tr>
            <td>{{ $course->id }}</td>
            <td>{{ $course->title }}</td>
            <td>{{ $course->start_date }}</td>
            <td>{{ $course->end_date }}</td>
            <td>{{ $course->modules_count }}</td>
            <td>

            </td>
        </tr>
    @endforeach
    </tbody>

</table>
</body>
</html>
