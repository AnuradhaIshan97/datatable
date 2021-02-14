<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <title>Laravel</title>

    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/css/bootstrap.min.css"/>
    <link href="https://cdn.datatables.net/1.10.21/css/jquery.dataTables.min.css" rel="stylesheet">
    <link href="https://cdn.datatables.net/1.10.21/css/dataTables.bootstrap4.min.css" rel="stylesheet">

</head>
<body class="antialiased">

<form id="studentData">
    <div class="container mt-5">
        <h2 class="mb-4">Laravel 7|8 Yajra Datatables Example</h2>
        <table class="table table-bordered yajra-datatable">
            <thead>
            <tr>
                <th>No</th>
                <th>Name</th>
                <th>Email</th>
                <th>Username</th>
                <th>Phone</th>
                <th>DOB</th>
                <th>Action</th>
            </tr>
            </thead>
            <tbody>
            </tbody>
        </table>
    </div>
</form>

</body>
</html>

<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.9.1/jquery.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery-validate/1.19.0/jquery.validate.js"></script>
<script src="https://cdn.datatables.net/1.10.21/js/jquery.dataTables.min.js"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/js/bootstrap.min.js"></script>
<script src="https://cdn.datatables.net/1.10.21/js/dataTables.bootstrap4.min.js"></script>

<script>

    $().ready(function () {
        getData();
    });

    function getData() {
        $('#Table').DataTable({
            processing: true,
            destroy: true,
            serverSide: true,
            ajax: {
                headers: {
                    'X-CSRF-TOKEN': $('#studentData').find('input[name="_token"]').first().val()
                },
                type: 'post',
                url: "{{ route('getData') }}",
                dataType: 'json'
            },
            responsive: true,
            language: {
                searchPlaceholder: 'Search ....',
                Search: true,
                lengthMenu: '_MENU_',
            },
            columns: [{
                data: 'no',
                className: 'align-middle text-center',
            },
                {
                    data: 'name',
                    className: 'align-middle text-center',
                    orderable: true,
                    searchable: true,
                },
                {
                    data: 'email',
                    className: 'align-middle text-left',
                    orderable: true,
                    searchable: true,
                },
                {
                    data: 'phone',
                    className: 'align-middle text-center',
                    orderable: true,
                    searchable: true,
                },
                {
                    data: 'DOB',
                    className: 'align-middle text-center',
                    orderable: true,
                    searchable: true,
                },
            ]
        })
    }


</script>
