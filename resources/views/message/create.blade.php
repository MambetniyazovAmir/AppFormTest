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
                <div class="alert alert-success" >
                    <p class="m-2">{{ session()->get('success') }}</p>
                </div>
            @endif
            <div class="row">
                <div class="card">
                    <div class="card-body">
                        <form action="{{ route('logout') }}" method="post">
                            @csrf
                            <button class="btn" style="float: right">Logout</button>
                        </form>
                        <h4 class="card-title">Message form</h4>
                        <form class="needs-validation" novalidate action="/message" method="post"
                              enctype="multipart/form-data">
                            @csrf
                            <div class="row">
                                <div class="col-md-12">
                                    <div class="mb-3 position-relative">
                                        <label class="form-label" for="validationTooltip01">Subject</label>
                                        <input type="text" class="form-control" id="validationTooltip01"
                                               name="subject"
                                               value="{{ old('subject') }}"
                                               placeholder="Subject" required>
                                        <div class="invalid-tooltip">
                                            Please fill required input
                                        </div>
                                    </div>
                                </div>
                                <div class="col-md-12">
                                    <div class="mb-3 position-relative">
                                        <label class="form-label" for="validationTooltip02">Message</label>
                                        <textarea class="form-control" id="validationTooltip02"
                                                  rows="5"
                                                  cols="3"
                                                  name="message"
                                                  placeholder="Message" required>{{ old('message') }}</textarea>

                                        <div class="invalid-tooltip">
                                            Please fill required input
                                        </div>
                                    </div>
                                </div>
                                <div class="col-md-4">
                                    <div class="mb-3 position-relative">
                                        <label class="form-label"
                                               for="validationTooltipUsername">File</label>
                                        <div class="input-group">
                                            <input type="file" class="form-control"
                                                   name="file"
                                                   id="validationTooltipUsername"
                                                   aria-describedby="validationTooltipUsernamePrepend" required>
                                            @if ($errors->has('file'))
                                                <span class="text-danger">{{ $errors->first('file') }}</span>
                                            @endif

                                            <div class="invalid-tooltip">
                                                Please fill required input
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <button class="btn btn-primary" type="submit">Submit form</button>
                        </form>
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
