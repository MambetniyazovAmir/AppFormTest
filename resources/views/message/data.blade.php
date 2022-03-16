<!doctype html>
<html lang="en">

<head>
    <meta charset="utf-8"/>
    <title>Message Form</title>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta content="Premium Multipurpose Admin & Dashboard Template" name="description"/>
    <meta content="Themesbrand" name="author"/>
    <!-- App favicon -->
    <link rel="shortcut icon" href="/assets/images/favicon.ico">

    <!-- Bootstrap Css -->
    <link href="/assets/css/bootstrap.min.css" id="bootstrap-style" rel="stylesheet" type="text/css"/>
    <!-- Icons Css -->
    <link href="/assets/css/icons.min.css" rel="stylesheet" type="text/css"/>
    <!-- App Css-->
    <link href="/assets/css/app.min.css" id="app-style" rel="stylesheet" type="text/css"/>

</head>

<body>

<div id="layout-wrapper">
    <div class="page-content">
        <div class="container-fluid">
            @if(session()->has('success'))
                <div class="alert alert-success">
                    <p class="m-2">{{ session()->get('success') }}</p>
                </div>
            @endif
            <div class="row">
                <div class="card">
                    <div class="table-responsive">
                        <table class="table table-striped mb-0">
                            <thead>
                            <form action="{{ route('logout') }}" method="post">
                                @csrf
                                <button class="btn" style="float: right">Logout</button>
                            </form>
                            <tr>
                                <th>#</th>
                                <th>Message subject</th>
                                <th>Message content</th>
                                <th>User email</th>
                                <th>User name</th>
                                <th>Created at</th>
                                <th>File</th>
                                <th>Read</th>
                                <th>Actions</th>
                            </tr>
                            </thead>
                            <tbody>
                            @foreach($messages as $message)
                                <tr>
                                    <th scope="row">1</th>
                                    <td>{{ $message->subject }}</td>
                                    <td>{{ $message->message }}</td>
                                    <td>{{ $message->user->email }}</td>
                                    <td>{{ $message->user->name }}</td>
                                    <td>{{ $message->created_at->format('d.m.Y') }} </td>
                                    <td><a href="{{ \Illuminate\Support\Facades\Storage::url($message->file) }}">download
                                            file</a></td>
                                    <td><p>@if($message->status) Read @else Unread @endif</p></td>
                                    <td>
                                        <form action="/message/{{ $message->id }}" method="post">
                                            @csrf
                                            @method('put')
                                            <input type="hidden" name="status" value="1">
                                            <button type="submit"
                                                    class="btn btn-sm btn-warning waves-effect waves-float waves-light">
                                                <svg xmlns="http://www.w3.org/2000/svg" width="14" height="14"
                                                     viewBox="0 0 24 24"
                                                     fill="none" stroke="currentColor" stroke-width="2"
                                                     stroke-linecap="round"
                                                     stroke-linejoin="round"
                                                     class="feather feather-edit-2 font-medium-3">
                                                    <path
                                                        d="M17 3a2.828 2.828 0 1 1 4 4L7.5 20.5 2 22l1.5-5.5L17 3z"></path>
                                                </svg>
                                            </button>
                                        </form>
                                        <form action="/message/{{ $message->id }}" method="post"
                                              style="display: inline">
                                            @csrf
                                            @method('delete')
                                            <button type="submit"
                                                    onclick="return confirm('Are you sure to remove?')"
                                                    class="btn btn-sm btn-danger waves-effect waves-float waves-light">
                                                <svg xmlns="http://www.w3.org/2000/svg" width="14" height="14"
                                                     viewBox="0 0 24 24" fill="none" stroke="currentColor"
                                                     stroke-width="2"
                                                     stroke-linecap="round" stroke-linejoin="round"
                                                     class="feather feather-trash font-medium-3">
                                                    <polyline points="3 6 5 6 21 6"></polyline>
                                                    <path
                                                        d="M19 6v14a2 2 0 0 1-2 2H7a2 2 0 0 1-2-2V6m3 0V4a2 2 0 0 1 2-2h4a2 2 0 0 1 2 2v2"></path>
                                                </svg>
                                            </button>
                                        </form>
                                    </td>
                                </tr>
                            @endforeach
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<script src="/assets/libs/jquery/jquery.min.js"></script>
<script src="/assets/libs/bootstrap/js/bootstrap.bundle.min.js"></script>
<script src="/assets/libs/metismenu/metisMenu.min.js"></script>
<script src="/assets/libs/simplebar/simplebar.min.js"></script>
<script src="/assets/libs/node-waves/waves.min.js"></script>
<script src="/assets/libs/waypoints/lib/jquery.waypoints.min.js"></script>
<script src="/assets/libs/jquery.counterup/jquery.counterup.min.js"></script>

<!-- parsleyjs -->
<script src="/assets/libs/parsleyjs/parsley.min.js"></script>

<script src="/assets/js/pages/form-validation.init.js"></script>

<!-- App js -->
<script src="/assets/js/app.js"></script>
</body>
</html>
