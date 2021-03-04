<table class="table dataTable" id="accounts-table">
    <thead class="thead-light">
    <tr>
        <th>Plano</th>
        <th>Dono</th>
        <th>Status</th>
        <th></th>
    </tr>
    </thead>
</table>

@push('scripts')
    <script>
        $(document).ready(function($) {
            $('#accounts-table').DataTable({
                processing: true,
                serverSide: true,
                ajax: '{{ route('dashboard.accounts.datatables') }}',
                keys: !0,
                select: {
                    style: "multi"
                },
                lengthChange: !1,
                dom: "Bfrtip",
                buttons: ["copy", "print"],
                language: {
                    paginate: {
                        previous: "<i class='fas fa-angle-left'>",
                        next: "<i class='fas fa-angle-right'>"
                    }
                },
                columns: [
                    {
                        data: 'plan',
                        name: 'plan'
                    },
                    {
                        data: 'user',
                        name: 'user'
                    },
                    {
                        data: 'status',
                        name: 'status'
                    },
                    {
                        data: 'action',
                        name: 'action',
                        orderable: false,
                        searchable: false
                    }
                ]
            });
            $("div.dataTables_length select").removeClass("custom-select custom-select-sm");
            $(".dt-buttons .btn").removeClass("btn-secondary").addClass("btn-sm btn-default");
        });
    </script>
@endpush
