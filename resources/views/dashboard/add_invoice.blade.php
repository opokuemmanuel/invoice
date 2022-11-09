<div class="container-fluid" style="margin-top: 40px;">
    <div class="row">
        <!-- left column -->
        <div class="col-md-8">
            <!-- general form elements -->
            <div class="card card-primary">
                <div class="card-header">
                    <h3 class="card-title">Add Invoice</h3>
                </div>
                <!-- /.card-header -->
                <!-- form start -->
                <form method="post" enctype="multipart/form-data" id="file_upload">
                    @csrf
                    <div class="card-body">
                        <div class="form-group">
                            <label for="exampleInputEmail1">Name of Client</label>
                            <input type="text" class="form-control name_of_client" id="name_of_client" name="name_of_client" placeholder="Name of client">
                        </div>
                        <div class="form-group">
                            <label >Contact Number</label>
                            <input type="number" class="form-control contact_number" id="contact_number" name="contact_number" placeholder="Contact Number">
                        </div>
                        <div class="form-group">
                            <label >Email</label>
                            <input type="email" class="form-control email" id="email" name="email" placeholder="Email">
                        </div>
                        <div class="form-group">
                            <label for="exampleInputFile">File input</label>
                            <div class="input-group">
                                <div class="custom-file">
                                    <input type="file" class="file_name" name="file_name" accept="application/pdf"  id="file_name">
                                </div>
                            </div>
                        </div>

                    </div>
                    <!-- /.card-body -->

                    <div class="card-footer">
                        <button type="submit"  class="btn btn-primary">Submit</button>
                    </div>
                </form>
            </div>
            <!-- /.card -->
        </div>
        <!--/.col (left) -->
    </div>
    <!-- /.row -->
</div>

<script>
    var name_of_client = document.getElementById('name_of_client').value;
    var email    = document.getElementById('email').value;
    var file_name = document.getElementById('file_name').value;
    var contact_number = document.getElementById('contact_number').value;

            $.ajaxSetup({
                headers: {
                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                }
            });
            $('#file_upload').submit(function(e){

                e.preventDefault();
                var formData = new FormData(this);
                $.ajax({
                    type:'POST',
                    url: "{{ route('add_new_invoice') }}",
                    data: formData,
                    cache: false,
                    contentType: false,
                    processData: false,
                    success:function (data) {
                       if(data['success'] === 'false'){
                           Swal.fire(
                               'Fill all the blank spaces!',
                               '',
                               'error'
                           );
                           console.log(data);
                       }else {
                           Swal.fire(
                               'Information Saved Successfully!',
                               '',
                               'success'
                           ).then(function () {
                              $(".add_invoice").trigger('click');
                           });
                           console.log(data);

                       }

                    },
                    error: function(data){
                        console.log(data);
                    }
                });
            });

</script>
