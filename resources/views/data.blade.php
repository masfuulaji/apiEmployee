<!DOCTYPE html>
<html lang="en">

<head>
    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <title>Document</title>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css">
    <link rel="stylesheet" href="https://cdn.datatables.net/1.10.20/css/jquery.dataTables.min.css">
    <link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/v/bs4/dt-1.10.20/datatables.min.css" />
    <script src="https://code.jquery.com/jquery-3.3.1.js"></script>
    <script src="https://cdn.datatables.net/1.10.20/js/jquery.dataTables.min.js"></script>
    
</head>

<body class="container">
    <h1 class="mt-4 mb-4"> User DataTable</h2>
        <button onclick="refresh()" type="button" class="btn btn-default mb-3" id="btn-tambah">
            refresh
        </button>
        <a class="btn mb-3" href="{{ route('save.data') }}">save</a>
        <table id="table" class="display" style="width:100%">
            <thead>
                <tr>
                    <th>No</th>
                    <th>nama</th>
                    <th>gaji</th>
                    <th>umur</th>
                    <th>foto</th>
                </tr>
            </thead>
            <tbody>
            </tbody>
        </table>
        
</body>
<script>
    $(document).ready(function() {
        let table = $('#table').DataTable({
            initComplete: function() {
                var api = this.api()
                $("#table_filter input")
                    .off(".DT")
                    .on("keyup.DT", function(e) {
                        api.search(this.value).draw()
                    })
            },
            oLanguage: {
                sProcessing: "loading..."
            },
            processing: true,
            serverSide: true,
            ajax: {
                cache: false,
                url: "{{ route('datatables.data') }}",
                type: "POST",
                error: function(error) {
                    console.log(error)
                },
            },
            columns: [{
                    data: "id",
                    orderable: false,
                    searchable: false
                },
                {
                    data: "employee_name"
                },
                {
                    data: "employee_salary"
                },
                {
                    data: "employee_age"
                },
                {
                    data: "profile_image"
                },
            ],
            rowId: function(a) {
                return a
            }
        })
    })

    function refresh(){

    }

</script>

</html>
