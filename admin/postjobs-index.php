<?php
include './header.php';


?>

<div class="container-fluid">
    <ol class="breadcrumb mb-4">
        <li class="breadcrumb-item active"><a href="">Dashboard</a> / Job Posts</li>
    </ol>
   



    <!-- DataTables Example -->
    <div class="card mb-3">
        <div class="card-header">
            <i class="fas fa-table"></i>
            Job posts Table</div>
        <div class="card-body">


            <div class="table-responsive">
                <table class="table table-bordered table-sm text-center dataTable" width="100%" cellspacing="0">
                    <thead>
                        <tr>
                            <th>sl.no</th>
                            <th width="20%">Sl No</th>
                            <th width="20%">Job Id</th>
                            <th width="20%">Job Title</th>
                            <th width="20%">Description</th>
                            <th width="10%">Category</th>
                            <th width="35%">Action</th>
                        </tr>
                    </thead>

                    <tbody>
                      
                        <tr>
                            <td></td>
                            <td></td>
                            <td></td>
                            <td></td>
                            <td></td>

                            <td>
                           

                            </td>
                            <td>
                                <a href=""
                                    class="btn btn-info btn-sm"><i class="fa fa-eye"></i></a>
                                <a onclick="return confirm('Are you sure to delete booking data?')"
                                    href=""
                                    class="btn btn-danger btn-sm"><i class="fa fa-trash"></i></a>
                            </td>
                        </tr>
                      
                    </tbody>

                </table>
            </div>
        </div>
    </div>


</div>
<!-- /.container-fluid -->


<?php
include './footer.php';
?>