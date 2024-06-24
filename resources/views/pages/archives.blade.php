<!DOCTYPE html>
<html lang="en">
<head>
  <title>Home</title>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/css/bootstrap.min.css">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.7.1/jquery.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/js/bootstrap.min.js"></script>
  <style>
    .row.content {
      height: 100vh; /* Set to 100% of the viewport height for full-height sidebar */
    }

    .sidenav {
      background-color: #f1f1f1;
      height: 100%;
      padding: 20px;
    }

    .navbar-header img,
    .sidenav img {
      max-width: 100%;
      height: auto;
      width: 100px;
      display: block;
      margin: 0 auto;
      margin-bottom: 10px;
    }

    .well {
      background-color: #fff;
      border: 1px solid #ddd;
      border-radius: 4px;
      box-shadow: 0 1px 1px rgba(0, 0, 0, 0.05);
      margin-top: 20px;
    }

    .table-bordered {
      margin-top: 20px;
    }

    @media screen and (max-width: 767px) {
      .row.content {
        height: auto;
      }
    }
  </style>
</head>
<body>

<nav class="navbar navbar-inverse visible-xs">
  <div class="container-fluid">
    <div class="navbar-header">
      <button type="button" class="navbar-toggle" data-toggle="collapse" data-target="#myNavbar">
        <span class="icon-bar"></span>
        <span class="icon-bar"></span>
        <span class="icon-bar"></span>
      </button>
      <img src="{{ asset('images/logo.png') }}" alt="Logo" class="img-responsive">
    </div>
    <div class="collapse navbar-collapse" id="myNavbar">
      <ul class="nav navbar-nav">
        <li class="active"><a href="{{ route('home') }}">Dashboard</a></li>
        <li><a href="{{ route('usersPage') }}">Users</a></li>
        <li><a href="{{ route('archives') }}">Archives</a></li>
        <li><a href="{{ route('logs') }}">Logs</a></li>
      </ul>
    </div>
  </div>
</nav>

<div class="container-fluid">
  <div class="row content">
    @include('sidebar') <!-- Include the sidebar -->
    </div>
</div>

<div class="container py-5">
    <div class="text-center">
        <h2 class="font-weight-bold mb-5">LV.tv Past Archives</h2>
    </div>
    <div class="d-flex justify-content-center mb-4">
        <input
            type="text"
            placeholder="Search..."
            class="form-control w-50 p-3 mr-2"
        />
        <button class="btn btn-warning text-white">Search</button>
    </div>
    <div class="row">
        <div class="col-md-8">
            <ul class="list-unstyled">
                <li class="media mb-4">
                    <a href="https://drive.google.com/file/d/1G4DDN_cr2l6Ka97BFVlPiJTumZByjVbP/view?usp=drive_link" target="_blank">
                        <img src="{{ asset('assets/thumbnail/thumbnail3.jpg') }}" class="mr-3" alt="Broadcast Thumbnail 3" width="150">
                    </a>
                    <div class="media-body">
                        <h5 class="mt-0 mb-1">12/11/2023</h5>
                        <a href="https://drive.google.com/file/d/1G4DDN_cr2l6Ka97BFVlPiJTumZByjVbP/view?usp=drive_link" target="_blank">
                            <h5 class="mt-0 mb-1">[Broadcast Title] The Art of Connection</h5>
                        </a>
                    </div>
                </li>
                <li class="media mb-4">
                    <a href="https://drive.google.com/file/d/1aKSEcRpBfsyE_UNAn9MbI_QcIdjo2zQj/view?usp=sharing" target="_blank">
                        <img src="{{ asset('assets/thumbnail/thumbnail2.jpg') }}" class="mr-3" alt="Broadcast Thumbnail 2" width="150">
                    </a>
                    <div class="media-body">
                        <h5 class="mt-0 mb-1">11/27/2023</h5>
                        <a href="https://drive.google.com/file/d/1aKSEcRpBfsyE_UNAn9MbI_QcIdjo2zQj/view?usp=sharing" target="_blank">
                            <h5 class="mt-0 mb-1">Beyond the Obstacle</h5>
                        </a>
                    </div>
                </li>
                <li class="media mb-4">
                    <a href="https://drive.google.com/file/d/1alFPpGLq08ekPDdoTXMNOPA11YSUuERV/view?usp=sharing" target="_blank">
                        <img src="{{ asset('assets/thumbnail/thumbnail1.jpg') }}" class="mr-3" alt="Broadcast Thumbnail 1" width="150">
                    </a>
                    <div class="media-body">
                        <h5 class="mt-0 mb-1">10/06/2023</h5>
                        <a href="https://drive.google.com/file/d/1alFPpGLq08ekPDdoTXMNOPA11YSUuERV/view?usp=sharing" target="_blank">
                            <h5 class="mt-0 mb-1">Growth Unlocked</h5>
                        </a>
                    </div>
                </li>
            </ul>
        </div>

        <div class="col-md-4">
            <h2 class="font-weight-bold mb-4">Categories</h2>
            <ul class="list-unstyled">
                <li><a href="https://drive.google.com/drive/folders/173olEHPJT-RLKNJE0g5ECyhlX0X-KtHX?usp=drive_link" class="text-primary" target="_blank">Uncategorized</a></li>
                <li><a href="https://drive.google.com/drive/folders/1FpN623HP5TYMRyJ6EoFnT4GNmNNx3P4Q?usp=drive_link" class="text-primary" target="_blank">Music</a></li>
                <li><a href="https://drive.google.com/drive/folders/1tvU-dy-sIS5hkXepiVNJXyoWn_cT42mj?usp=drive_link" class="text-primary" target="_blank">Podcasts</a></li>
                <li><a href="https://drive.google.com/drive/folders/1-TXDKpxwdcD5l-g1mdjMimCRx7LimDmU?usp=drive_link" class="text-primary" target="_blank">Radio Segment</a></li>
            </ul>

            <h2 class="font-weight-bold mt-5 mb-4">Archive</h2>
            <ul class="list-unstyled">
                <li><a href="https://drive.google.com/drive/folders/16Ui0la6VkUb4UoyBK_ZrN2fjAgcklRLY?usp=drive_link" class="text-primary" target="_blank">December 2023</a></li>
                <li><a href="https://drive.google.com/drive/folders/1fUAS3jkTrW91rVZ17OHjcCnxotLF-jKN?usp=drive_link" class="text-primary" target="_blank">November 2023</a></li>
                <li><a href="https://drive.google.com/drive/folders/1jCpkC6d116MrUmVdtXQgayUerpDKSmf1?usp=drive_link" class="text-primary" target="_blank">October 2023</a></li>
            </ul>

            <h2 class="font-weight-bold mt-5 mb-4">Social</h2>
            <ul class="list-unstyled">
                <li><a href="#" class="text-primary">Instagram</a></li>
                <li><a href="#" class="text-primary">Tumblr</a></li>
            </ul>
        </div>
    </div>
</div>

<script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.5.4/dist/umd/popper.min.js"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
</body>
</html>
