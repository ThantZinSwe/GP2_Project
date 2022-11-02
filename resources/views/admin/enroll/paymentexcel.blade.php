<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Payment Excel</title>
</head>
<body>
<table>
    <thead>
    <tr>
        <th>Id</th>
        <th>User Name</th>
        <th>Course Name</th>
        <th>Amount</th>
        <th>Payment Method</th>
        <th>User Id</th>
        <th>Course Id</th>
    </tr>
    </thead>
    <tbody>
    @foreach($payment as $no=>$p)
        <tr>
            <td>{{++$no}}</td>
            <td>{{ $p->user->name }}</td>
            <td>{{$p->course->name}}</td>
            <td>{{$p->amount}}</td>
            <td>{{$p->payment_method}}</td>
            <td>{{$p->user_id}}</td>
            <td>{{$p->course_id}}</td>
        </tr>
    @endforeach
    </tbody>
</table>
</body>
</html>