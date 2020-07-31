<div class="table-responsive">
    <table class="table table-striped table-bordered">
        <thead>
        <tr>
            <th width="5%">ID</th>
            <th >Name</th>
            <th >Emoplyee No</th>
            <th >Company</th>
            <th >Department</th>
            <th >Salary</th>
            <th >Designation</th>
            <th >Joining date</th>
            <th >Termination Date</th>
        </tr>
        </thead>
        <tbody>

        </tbody>
    </table>

    @include('pagination_default', ['paginator' => $links])

</div>


