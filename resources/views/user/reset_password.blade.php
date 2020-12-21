<a class="btn btn-warning btn-sm" href="#" data-toggle="modal" data-target="#resetModal{{$user->id}}">
    <i class="fa fa-key"></i>
    Password
</a>
<!-- Tambah Modal-->
<div class="modal fade" id="resetModal{{$user->id}}" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
    <div class="modal-content">
        <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Reset Password</h5>
        <button class="close" type="button" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">×</span>
        </button>
        </div>
        <div class="modal-body">
            <p>Yakin ingin mereset password <b>{{$user->email}}</b> ?</p>
        </div>
        <div class="modal-footer">
            <button type="button" class="btn btn-secondary btn-sm" data-dismiss="modal">Close</button>
            <a href="{{route('reset_password', $user->id)}}" class="btn btn-warning btn-sm">Reset</a>
        </div>
    </div>
    </div>
</div>