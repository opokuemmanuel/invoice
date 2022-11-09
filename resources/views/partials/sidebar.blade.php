<!-- Sidebar -->
<div class="sidebar">
    <!-- Sidebar user panel (optional) -->

    <!-- Sidebar Menu -->
    <nav class="mt-2">
        <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu" data-accordion="false">
            <!-- Add icons to the links using the .nav-icon class
                 with font-awesome or any other icon font library -->
            <li class="nav-item menu-open">
                <a href="#"  class="nav-link active">
                    <i class="nav-icon fas fa-tachometer-alt"></i>
                    <p>
                        Menu
                        <i class="right fas fa-angle-left"></i>
                    </p>
                </a>
                <ul class="nav nav-treeview">
                    <li class="nav-item">
                        <a href="{{route('dashboard')}}" class="nav-link">
                            <i class="nav-icon fas fa-copy"></i>
                            <p>Dashboard</p>
                        </a>
                    </li>
                    <li class="nav-item">
                        <a href="#" onclick="add_invoice()" id="add_invoice" class="nav-link add_invoice">
                            <i class="nav-icon fas fa-copy"></i>
                            <p>Add Invoice</p>
                        </a>
                    </li>
                    <li class="nav-item">
                        <a href="#" onclick="previously_sent_invoice()" class="nav-link">
                            <i class="nav-icon fas fa-copy"></i>
                            <p>Previously Sent Invoice</p>
                        </a>
                    </li>
                    <li class="nav-item">
                        <a href="#" onclick="sent_invoice()" class="nav-link">
                            <i class="nav-icon fas fa-copy"></i>
                            <p>Sent Invoice</p>
                        </a>
                    </li>
                    <li class="nav-item">
                        <a href="#" onclick="all_invoice()" id="all_invoice" class="nav-link all_invoice">
                            <i class="nav-icon fas fa-copy"></i>
                            <p>View All Invoice</p>
                        </a>
                    </li>
                    <li class="nav-item">
                        <a href="{{route('auth_logout')}}" class="nav-link">
                            <i class="nav-icon fas fa-copy"></i>
                            <p>Logout</p>
                        </a>
                    </li>
                </ul>
            </li>
        </ul>
    </nav>
    <!-- /.sidebar-menu -->
</div>
<!-- /.sidebar -->
<script type="text/javascript">
    function add_invoice(){
        $.ajax({
            url:"{{route('add_invoice')}}",
            success: function(res) {
                $('#section').html(res);
                //console.log(res);
            }
        });
    }
    function all_invoice(){
        $.ajax({
            url:"{{route('all_invoice')}}",
            success: function(res) {
                $('#section').html(res);
                //console.log(res);
            }
        });
    }
    function previously_sent_invoice(){
        $.ajax({
            url:"{{route('previously_sent_invoice')}}",
            success: function(res) {
                $('#section').html(res);
                //console.log(res);
            }
        });
    }
    function sent_invoice(){
        $.ajax({
            url:"{{route('sent_invoice')}}",
            success: function(res) {
                $('#section').html(res);
                //console.log(res);
            }
        });
    }
</script>
