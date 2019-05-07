<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Payemnt Slip</title>
</head>

<style>
    *{
        margin: 0px;
        padding: 0px;
    }
    html{
        margin: 30px;
        font-size: 14px;
    }
    .text-center{
        text-align: center;
    }
    .text-left{
        text-align: left;
    }
    .text-right{
        text-align: right;
    }
    .logo{
        display: inline;
        /*border: 1px solid #dd4444;*/
    }              

    table{
        width: 100%;
        border-collapse: collapse;
    }

    table td{
        /*border : 1px solid #333;*/

    }
    .courseTable{
        margin: 20px 0px;
    }
    .courseTable th {
        text-align: center;
    }
    .courseTable td, .courseTable th{
        border: 1px solid #333;
        padding: 5px;
    }

    .studentInfo td{
        padding: 5px;
    }
    .bankInfo{
    }
    .bankInfo td{
        padding: 5px;
    }

    .signature{
        margin-top: 200px;
    }
    /*table tr{*/
    /*    text-align: center;*/
    /*}*/
</style>
<body>

<table style=" width: 100%;">
    <tr>
        <td style="padding-right: 20px; border-right: 1px dashed #333;">
            <table style="width: 100%">
                <tr>
                    <td class="text-center">
                        <img class="logo" src="{{public_path("images/logo.png")}}" height="80px"/>
                    </td>

                </tr>
                <tr>
                    <td class="text-center">
                        <h3 style="margin: 10px 0px;">IIT, JU</h3>
                    </td>
                </tr>
                <tr>
                    <td class="text-center" style="width: 100%;" >
                        <p style="border:1px solid #333; padding: 4px; margin:0px auto; border-radius: 4px;  width: 150px; display: inline-block">Payment Slip</p>
                    </td>
                </tr>
            </table>

            <br>

            <table class="studentInfo">
                <tr>
                    <td style="width: 90px">Bill No </td>
                    <td style="width: 220px;">: {{ \Carbon\Carbon::parse($enroll->created_at)->format("y").$enroll->student->id.$enroll->semester_id }}</td>
                    <td >Date </td>
                    <td>: {{ \Carbon\Carbon::now()->format("d-M-Y") }}</td>
                </tr>
                <tr>
                    <td >Student Name </td>
                    <td>: {{ $enroll->student->full_name }}</td>
                    <td >Student ID </td>
                    <td style="width: 95px">: {{ $enroll->student->id }}</td>
                </tr>
            </table>
            

            <table class="courseTable" style="width: 100%;">
                <tr>
                    <th>Course Title</th>
                    <th>Semester</th>
                    <th>Year</th>
                    <th>Amount</th>
                </tr>
                @php
                    $totalCourseFee = 0;
                @endphp
                @foreach($courses as $course)
                    <tr>
                        <td>{{ $course->offer->course->course_name }}</td>
                        <td class="text-center">{{ $course->enroll->semester->semester_name }}</td>
                        <td class="text-center">{{ \Carbon\Carbon::parse($course->created_at)->format("Y") }}</td>
                        <td class="text-right">{{ $course->offer->course_fee }}</td>
                    </tr>

                    @php
                           $totalCourseFee += $course->offer->course_fee;
                    @endphp
                @endforeach
                <tr>
                    <td colspan="3" class="text-right">Total</td>
                    <td class="text-right">{{ $totalCourseFee }}</td>
                </tr>
            </table>

            <table class="bankInfo">
                <tr>
                    <td style="width: 50%">Bank Name : Agrani Bank Ltd.</td>
                    <td>Branch Name :</td>

                <tr>
                    <td>Account Name : PGDIT - IIT</td>
                    <td>Account No : 200005927982</td>
                </tr>
            </table>

            <table class="signature">
                <tr>
                    <td>Cashier / Officer (Cash)</td>
                    <td>Depositor</td>
                    <td>Officer</td>
                </tr>
            </table>



        </td>
        <td  style="padding-left: 20px">
            <table style="width: 98%">
                <tr>
                    <td class="text-center">
                        <img class="logo" src="{{public_path("images/logo.png")}}" height="80px"/>
                    </td>

                </tr>
                <tr>
                    <td class="text-center">
                        <h3 style="margin: 10px 0px;">IIT, JU</h3>
                    </td>
                </tr>
                <tr>
                    <td class="text-center" style="width: 100%;" >
                        <p style="border:1px solid #333; padding: 4px; margin:0px auto; border-radius: 4px;  width: 150px; display: inline-block">Payment Slip</p>
                    </td>
                </tr>
            </table>

            <br>

            <table class="studentInfo">
                <tr>
                    <td style="width: 90px">Bill No </td>
                    <td style="width: 220px;">: {{ \Carbon\Carbon::parse($enroll->created_at)->format("y").$enroll->student->id.$enroll->semester_id }}</td>
                    <td >Date </td>
                    <td>: {{ \Carbon\Carbon::now()->format("d-M-Y") }}</td>
                </tr>
                <tr>
                    <td >Student Name </td>
                    <td>: {{ $enroll->student->full_name }}</td>
                    <td >Student ID </td>
                    <td style="width: 95px">: {{ $enroll->student->id }}</td>
                </tr>
            </table>


            <table class="courseTable">
                <tr>
                    <th>Course Title</th>
                    <th>Semester</th>
                    <th>Year</th>
                    <th>Amount</th>
                </tr>
                @php
                    $totalCourseFee = 0;
                @endphp
                @foreach($courses as $course)
                    <tr>
                        <td>{{ $course->offer->course->course_name }}</td>
                        <td class="text-center">{{ $course->enroll->semester->semester_name }}</td>
                        <td class="text-center">{{ \Carbon\Carbon::parse($course->created_at)->format("Y") }}</td>
                        <td class="text-right">{{ $course->offer->course_fee }}</td>
                    </tr>

                    @php
                        $totalCourseFee += $course->offer->course_fee;
                    @endphp
                @endforeach
                <tr>
                    <td colspan="3" class="text-right">Total</td>
                    <td class="text-right">{{ $totalCourseFee }}</td>
                </tr>
            </table>

            <table class="bankInfo">
                <tr>
                    <td style="width: 50%">Bank Name : Agrani Bank Ltd.</td>
                    <td>Branch Name :</td>

                <tr>
                    <td>Account Name : PGDIT - IIT</td>
                    <td>Account No : 200005927982</td>
                </tr>
            </table>

            <table class="signature">
                <tr>
                    <td>Cashier / Officer (Cash)</td>
                    <td>Depositor</td>
                    <td>Officer</td>
                </tr>
            </table>



        </td>
    </tr>
</table>



</body>
</html>