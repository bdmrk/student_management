<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Payemnt Slip</title>
</head>
<body>

<table>
    <tr>
        <td>Particular</td>
        <td>Amount</td>
    </tr>
    @foreach($courses as $course)
        <tr>
            <td>{{ $course->offer->course->course_name }}</td>
            <td>{{ $course->offer->course_fee }}</td>
        </tr>
    @endforeach
</table>

</body>
</html>