@extends('layout')

@section('title', 'Archives')

@section('content')
<div class="container-fluid">
  <div>
    @include('sidebar') <!-- Include the sidebar -->
    </div>
    <div class="col-xs-12">
      <div>
        <div class="text-center">
          <h2 class="font-weight-bold mb-5">LVTV Past Archives</h2>
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
    </div>
  </div>
</div>
@endsection

@section('scripts')
<script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.5.4/dist/umd/popper.min.js"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
@endsection
