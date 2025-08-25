<!-- main_admin_dashboard_show_all_joined_employees_page -->
@extends('main_admin_dashboard_layout')

@section('title')
<title>System Employees Management</title>
@endsection

@section('style')
<style>
    #main-heading{
        color: #2C3E50;
        padding-bottom: 40px;
    }

    #Employees_Applications{
        border-left : 6px solid #305d72;
        background: #B7C9E2;
        border-radius: 4px;
    } 

    #Current_employee{
        border: 2px solid #3d5ee1;
        border-radius: 8px;
    }

    .center{
        text-align: center;
        padding-top: 70px;
        align-items: center;
        justify-content: center;
    }
    .table_container{
        margin-bottom: 100px;
        padding: 0 30px;
    }

    #cat_table{
        margin: auto;
        width: 90%;
        text-align: center;
        border-collapse: collapse; 
        border: 3px solid #454545;
        box-shadow: 5px 5px 5px #929292;
    }

    #cat_table td {
        padding: 10px; 
        border: 1px solid #454545;
    }

    #cat_table td:nth-child(1),
    #cat_table td:nth-child(2),
    #cat_table td:nth-child(3),
    #cat_table td:nth-child(4),
    #cat_table td:nth-child(5),
    #cat_table td:nth-child(6),
    #cat_table td:nth-child(7),
    #cat_table td:nth-child(8),
    #cat_table td:nth-child(9),
    #cat_table td:nth-child(10),
    #cat_table td:nth-child(11),
    #cat_table td:nth-child(12),
    #cat_table td:nth-child(13),
    #cat_table td:nth-child(14),
    #cat_table td:nth-child(15),
    #cat_table td:nth-child(16),
    #cat_table td:nth-child(17),
    #cat_table td:nth-child(18),
    #cat_table td:nth-child(19),
    #cat_table td:nth-child(20),
    #cat_table td:nth-child(21),
    #cat_table td:nth-child(22),
    #cat_table td:nth-child(23),
    #cat_table td:nth-child(24),
    #cat_table td:nth-child(25),
    #cat_table td:nth-child(26),
    #cat_table td:nth-child(27),
    #cat_table td:nth-child(28),
    #cat_table td:nth-child(29),
    #cat_table td:nth-child(30),
    #cat_table td:nth-child(31),
    #cat_table td:nth-child(32),
    #cat_table td:nth-child(33),
    #cat_table td:nth-child(34),
    #cat_table td:nth-child(35),
    #cat_table td:nth-child(36),
    #cat_table td:nth-child(37),
    #cat_table td:nth-child(38),
    #cat_table td:nth-child(39),
    #cat_table td:nth-child(40)
    {
        width: 100%; 
        white-space: nowrap;
    }

    #edit_btn{
        text-decoration: none;
        background: #F7F7FA; 
        color: #454545;
        font-weight: 500;
        border: 1px solid rgba(0,0,0,.2); 
        padding: 3% 16%;
        border-radius: 8px; 
        transition : 0s all ease;
    }

    #edit_btn:hover{
        color: black;
        border: 1px solid black; 
        font-weight: 500;
        background: #7dd181;
    }

    #document_btn{
        text-decoration: none;
        background: #F7F7FA; 
        color: #454545;
        font-weight: 500;
        border: 1px solid rgba(0,0,0,.2); 
        padding: 1.5% 16%;
        border-radius: 8px; 
        transition : 0s all ease;
    }

    #document_btn:hover{
        color: black;
        border: 1px solid black; 
        font-weight: 500;
        background: #ADD8E6;
    }

    #alert_btn{
        text-decoration: none;
        background: #F7F7FA; 
        color: #454545;
        font-weight: 500;
        border: 1px solid rgba(0,0,0,.2); 
        padding: 3% 16%;
        border-radius: 8px; 
        transition : 0s all ease;
    }

    #alert_btn:hover{
        color: black;
        border: 1px solid black; 
        font-weight: 500;
        background: #BF77F6;
    }

    #Confirm_btn{
        text-decoration: none;
        background: #F7F7FA; 
        color: #454545;
        font-weight: 500;
        border: 1px solid rgba(0,0,0,.2); 
        padding: 3% 16%;
        border-radius: 8px; 
        transition : 0s all ease;
    }

    #Confirm_btn:hover{
        color: black;
        border: 1px solid black; 
        font-weight: 500;
        background: #7BB274;
    }

    #delete_btn{
        text-decoration: none;
        font-weight: 500;
        background: #F7F7FA; 
        color: #454545;
        border: 1px solid rgba(0,0,0,.2); 
        padding: 3% 16%;
        border-radius: 8px; 
        transition : 0s all ease;
    }

    #delete_btn:hover{
        color: black;
        border: 1px solid black; 
        font-weight: 500;
        background: #FF474C;
    }

    #header_row{
        font-size: 16px; 
        font-weight: 500; 
        background: #929292; 
        color: black;
    }

    #header_row td{
        border: 3px solid #454545; 
    }

    #all_rows{
        background: #e4e4e4;
    }

    .msg{
        width: 50%;
        height: 50px;
        color: green;
        font-size: 20px;
        border-radius: 6px;
        padding: 8px 0 0 25px;
        background: white;
        border: 1px solid rgba(0,0,0,.2);
        box-shadow: 5px 5px 5px rgba(0,0,0,.2);
        margin-top: 20px;
        margin-left: 20px;
        align-items: center;
        justify-content: center;
    }

    #popup-btn{
        height: 80%;
        margin-bottom: 8px;
        width: 30px;
        padding-bottom: 4px;
        border: 1px solid rgba(0,0,0,.2);
        border-radius: 6px;
        background: rgba(0,0,0,.2);
        margin-left: 33%;
    }

    .page-wrapper{
        /* overflow-x: auto; */
        overflow: auto;
    }

    ::-webkit-scrollbar {
        width: 9px;
        height: 10px;
    }

    ::-webkit-scrollbar-thumb {
        background-color: #929292;
        border-radius: 10px;
    }

    ::-webkit-scrollbar-track {
        background: #B7C9E2;
    }

    ::-webkit-scrollbar-thumb:hover {
        background-color: #454545;
    }
</style>
@endsection


@section('body')
    <div class="page-wrapper">
        <div class="content container-fluid">
            <!-- <div>Hello From main_admin_dashboard_show_all_confirmed_employee_application_page</div><br> -->

            @if(Session()->has('employee_confirmed_msg'))

                <div class="msg" id="msg1">
                    {{session()->get('employee_confirmed_msg')}}
                    <button type="button" onclick = "document.getElementById('msg1').style.display = 'none';" id="popup-btn" >X</button>
                </div>

            @endif

            @if(count($all_joined_employees) > 0)
            <div class="center">
                <h2 id="main-heading">All Confirmed Employees</h2>

                <div class="table_container">
                    <table id="cat_table">
                        <tr id="header_row">
                            <td>SR No.</td>
                            <td>Applicant Name</td>
                            <td>Applicant ID</td>
                            <td>User Type</td>
                            <td>Applicant Email</td>
                            <td>Applicant Phone No.</td>
                            <td>Applicant Address</td>
                            <td>Applicant Gender</td>
                            <td>Applicant DOB</td>
                            <td>Applicant Photo Document</td>
                            <td>Applicant Aadharcard Document</td>
                            <td>Applicant Percentage of twelve</td>
                            <td>Applicant Percentage of twelve Document</td>
                            <td>Applicant Other educational details</td>
                            <td>Applicant confirmation of computer knowlege</td>
                            <td>Applicant Bank Name</td>
                            <td>Applicant Bank Branch Name</td>
                            <td>Applicant Bank Account IFSC Code</td>
                            <td>Applicant Bank Account MICR Code</td>
                            <td>Applicant Bank Account Holder Name</td>
                            <td>Applicant Bank Account Number</td>
                            <td>Applicant Bank Account Type</td>
                            <td>Applicant Proof of Bank Account Ownership</td>
                            <td>Applicant Experience Job</td>
                            <td>Applicant Experience Job Workplace</td>
                            <td>Applicant Experience Job Duration</td>
                            <td>Applicant Experience Proof</td>
                            <td>Applicant Experience Description</td>
                            <td>Applicant Confirm TC</td>
                            <td>Applicant is_confirmed</td>
                            <td>Confirmed Employee confirmation code</td>
                            <td>Confirmed Employee is_joined</td>
                            <td>Confirmed Employee Username</td>
                            <td>Confirmed Employee Password</td>
                            <td>Record Created at [Application Date]</td>
                            <td>Record Updated at</td>
                            <td>To Alert The Employee</td>
                            <td>To Edit Employee Record</td>
                            <td>To Delete Employee Record</td>
                        </tr>

                        @php
                            $srNo = 1; 
                        @endphp

                        @foreach($all_joined_employees as $each_employee)
                            <tr id="all_rows">
                                <td>{{ $srNo++ }}</td>  
                                <td>{{ $each_employee->name }}</td>
                                <td>{{ $each_employee->id }}</td>
                                <td>{{ $each_employee->user_type }}</td>
                                <td>{{ $each_employee->email }}</td>
                                <td>{{ $each_employee->phone_no }}</td>
                                <td>{{ $each_employee->address }}</td>
                                <td>{{ $each_employee->gender }}</td>
                                <td>{{ $each_employee->date_of_birth }}</td>

                                <td>
                                    <a href="{{ route('employee_photo_viewer', ['id' => $each_employee->id]) }}" id="document_btn">Click For Document</a>
                                </td>

                                <td>
                                    <a href="{{ route('employee_addharcard_viewer', ['id' => $each_employee->id]) }}" target="_blank" id="document_btn">Click For Document</a>
                                </td>

                                <td>{{ $each_employee->percentage_of_twelve }}</td>

                                <td>
                                    <a href="{{ route('employee_proof_of_percentage_of_twelve_viewer', ['id' => $each_employee->id]) }}" target="_blank" id="document_btn">Click For Document</a>
                                </td>

                                <td>{{ $each_employee->other_educational_details ?? '-----------' }}</td>
                                <td>{{ $each_employee->confirmation_of_computer_knowlege }}</td>                             
                                <td>{{ $each_employee->bank_name }}</td>
                                <td>{{ $each_employee->bank_branch }}</td>
                                <td>{{ $each_employee->bank_ifsc_code }}</td>
                                <td>{{ $each_employee->bank_micr_code }}</td>
                                <td>{{ $each_employee->account_holder_name }}</td>
                                <td>{{ $each_employee->account_number }}</td>
                                <td>{{ $each_employee->account_type }}</td>

                                <td>
                                    <a href="{{ route('employee_proof_of_bank_account_ownership_viewer', ['id' => $each_employee->id]) }}" target="_blank" id="document_btn">Click For Document</a>
                                </td>

                                <td>{{ $each_employee->experience_job ?? '-----------' }}</td>
                                <td>{{ $each_employee->experience_job_workplace ?? '-----------' }}</td>
                                <td>{{ $each_employee->experience_job_duration ?? '-----------' }}</td>

                                <td>
                                @if($each_employee->proof_of_experience)
                                    <a href="{{ route('employee_proof_of_experience_viewer', ['id' => $each_employee->id]) }}" target="_blank" id="document_btn">Click For Document</a>
                                @else
                                    ----------
                                @endif
                                </td>

                                <td>{{ $each_employee->experience_description ?? '-----------' }}</td>
                                <td>{{ $each_employee->tc }}</td>
                                <td>{{ $each_employee->is_confirmed }}</td>
                                <td>{{ $each_employee->confirmation_code ?? '-----------'  }}</td>
                                <td>{{ $each_employee->is_joined }}</td>
                                <td>{{ $each_employee->employee_username ?? '-----------'  }}</td>
                                <td>{{ $each_employee->employee_confirm_password ?? '-----------'  }}</td>
                                <td>{{ $each_employee->created_at }}</td>
                                <td>{{ $each_employee->updated_at }}</td>
                                <td><a onclick="return confirm('Are you sure to Alert selected Employee Record !')" href="#" id="alert_btn">Alert</a></td>
                                <td><a onclick="return confirm('Are you sure to Edit selected Employee Record !')" href="#" id="edit_btn">Edit</a></td>
                                <td><a onclick="return confirm('Are you sure to Delete selected Employee Record !')" href="#" id="delete_btn">Delete</a></td> 
                            </tr>
                        @endforeach

                    </table>
                </div>
            </div>
            @else
                <script>
                    window.location.href = '{{ route('main_admin_dashboard_nothing_to_show_in_joined_employees_record') }}';
                </script>
            @endif
        </div>
    </div>
@endsection