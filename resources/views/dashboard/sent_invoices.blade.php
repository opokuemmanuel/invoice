<div class="card-body">
    <div class="card-header">
        <h3>Sent Invoices</h3>
    </div>
    <table class="table table-bordered">
        <thead>
        <tr>
            <th style="width: 10px">#</th>
            <th>Name Of Client</th>
            <th>Contact Number</th>
            <th>Email</th>
            <th>File</th>
            <th>Date Sent</th>
            <th>Status</th>
            <th>Action</th>
        </tr>
        </thead>
        <tbody>
        @foreach($invoices as $key => $list_of_invoices)
            <tr>
                <td>{{$key+1}}</td>
                <td>{{$list_of_invoices->name_of_client}}</td>
                <td>{{$list_of_invoices->contact_number}}</td>
                <td>{{$list_of_invoices->email}}</td>
                <td>{{$list_of_invoices->file_name}}</td>
                <td>{{$list_of_invoices->status}}</td>
                <td>{{$list_of_invoices->updated_at->diffForHumans()}}</td>
                <td>@if($list_of_invoices->status == "sent")  @else<a href="" data-id="{{$list_of_invoices->id}}" data-file_name="{{$list_of_invoices->file_name}}" data-email="{{$list_of_invoices->email}}" data-toggle="modal" data-target="#send_invoice"><i class="fa fa-edit"></i></a>&nbsp;&nbsp;&nbsp;<a href="" ><i class="fa fa-trash" style="color: red"></i></a>@endif</td>
            </tr>
        @endforeach
    </table>
    <div class="modal fade" id="send_invoice" tabindex="-1" role="dialog" aria-labelledby="myLargeModalLabel"
         aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="myLargeModalLabel"></h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>

                <form method="post" enctype="multipart/form-data" id="send_mail_invoice">
                    @csrf
                    <div class="modal-body">
                        <div class="row form-group">
                            <h5 class="modal-title" id="myLargeModalLabel">Send Invoice to <b id="email"></b> ?</h5>
                            <input type="hidden" name="client_email" id="client_email">
                            <input type="hidden" name="file_name" id="file_name">
                            <input type="hidden" name="file_id" id="file_id">
                        </div>
                    </div>
                    <div class="modal-footer bg-whitesmoke br">
                        <button type="submit" class="btn btn-primary" >Send Invoice</button>
                        <button type="button" class="btn btn-secondary" id="dismiss_modal" data-dismiss="modal">Close</button>
                    </div>
                </form>

            </div>
        </div>
    </div>

</div>
<script>
    $.ajaxSetup({
        headers: {
            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
        }
    });
    $('#send_mail_invoice').submit(function(e){
        Swal.fire({
            title:"",
            text:"Loading...",
            buttons: false,
            closeOnClickOutside: false,
            timer: 30000,
            //icon: "success"
        });
        e.preventDefault();
        var formData = new FormData(this);
        $.ajax({
            type:'POST',
            url: "{{ route('send_invoice') }}",
            data: formData,
            cache: false,
            contentType: false,
            processData: false,
            success:function (data) {
                Swal.fire(
                    'Email Sent Successfully!',
                    '',
                    'success'
                );
                $('#dismiss_modal').trigger('click');
                console.log(data);
            },
            error: function(data){
                console.log(data);
            }
        });
    });
</script>
