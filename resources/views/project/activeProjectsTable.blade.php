<style>
    td, th {
        text-align: center !important;
    }
    .tableFixHead          { overflow: auto; height: 450px; }
    .tableFixHead thead { position: sticky; top: 0; z-index: 1; }


</style>
<div class="card w-100">
    <div class="card-body">
        <h4 class="card-title">Active Projects Table</h4>
        <p class="card-title-desc">The table consists of Active Projects on the ESNAAD website</p>



        <div class="table-responsive tableFixHead">
            <table class="table table-sm table-bordered table-hover mb-0">

                <thead>
                    <tr class="bg-dark text-white">
                        <th>#</th>
                        <th>Project Name</th>
                        <th>Location</th>
                        <th>Payment Plans</th>
                        <th>Floor Plans</th>
                        <th>Brochures</th>
                        <th>Factsheets</th>
                        <th>Images</th>
                        <th>Videos</th>
                        <th>Translation</th>
                        <th>Action</th>
                    </tr>
                </thead>
                <tbody>
                    @if(isset($count_status))
                        <tr>
                            <td colspan='11' class="text-muted">{{$count_status}}</td>
                        </tr>
                    @else
                        <tr>
                            <td scope="row">1</td>
                            <td>Atlas</td>
                            <td>Business Bay</td>
                            <td><i class="bx bx-list-check text-primary" style="font-size: 20px"></i></td>
                            <td><i class="bx bx-no-entry text-danger" style="font-size: 18px"></i></td>
                            <td><i class="bx bx-list-check text-primary" style="font-size: 20px"></i></td>
                            <td><i class="bx bx-list-check text-primary" style="font-size: 20px"></i></td>
                            <td><i class="bx bx-list-check text-primary" style="font-size: 20px"></i></td>
                            <td><i class="bx bx-no-entry text-danger" style="font-size: 18px"></i></td>
                            <td><i class="bx bx-no-entry text-danger" style="font-size: 18px"></i></td>
                            <td>
                                <a href="" class="btn btn-sm btn-dark">
                                    <i class="bx bx-edit"></i>
                                </a>
                                &nbsp;
                                |
                                &nbsp;
                                <a href="" class="btn btn-sm btn-warning text-dark">
                                    <i class="bx bx-trash"></i>
                                </a>
                            </td>
                        </tr>
                    @endif

                </tbody>
            </table>
        </div>

    </div>
</div>
