@include('layout.partials._header')
@yield('content')
<!-- Modal -->
<div class="modal fade" id="termsModal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true"><i class="fa fa-times fa-lg"></i></span></button>
        <h4 class="modal-title" id="myModalLabel">Terms and Conditions</h4>
      </div>
      <div class="modal-body">
        Lorem ipsum dolor. Lorem ipsum dolor.Lorem ipsum dolor.Lorem ipsum dolor.
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-theme" data-dismiss="modal">Okay</button>
      </div>
    </div>
  </div>
</div>
@include('flash::message')
@include('layout.partials._footer')