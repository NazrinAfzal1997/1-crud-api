$(document).ready(function () {

    var EventsTable = $('#EventsTable').DataTable({
        searching: false,
        responsive: true,
        processing: true,
        serverSide: true,
        paging: false,
        bDestroy: true,
        ajax: {
            "url": "/events/ajax",
            "type": "POST",
            "data": function (d) {
                d._token = $('meta[name="csrf-token"]').attr('content')
            },
        },
        columns: [{
                data: 'DT_RowIndex',
                name: 'DT_RowIndex',
                className: 'text-center',
                orderable: false,
                searchable: false,
            },
            {
                data: 'name',
                name: 'EVENT NAME',
                render: function (data, type, row, meta) {
                    return data[0].toUpperCase() + data.substr(1);
                }
            },
            {
                data: 'slug',
                name: 'SLUG',
            },
            {
                data: 'event_id',
                name: 'ACTIONS',
                className: 'text-center',
                render: function (data, type, row, meta) {
                    return '<a type="button" data-id="' + data + '" href="/events/' + data + '" class="btn btn-info mx-1" title="View Event"><i class="fa fa-eye"></i></a>' +
                        '<a type="button" data-id="' + data + '" href="/events/' + data + '/edit" class="btn btn-warning mx-1" title="Edit Event"><i class="fa fa-edit"></i></a>' +
                        '<a type="button" data-id="' + data + '" class="btn btn-danger mx-1 eventDelete" title="Delete Event"><i class="fa fa-trash"></i></a>';
                }
            },
        ],
        order: [
            [0, 'desc']
        ],
    });


    $('#createEventForm').on('submit', function (e) {
        e.preventDefault();

        let name = $('#event_name').val();
        let status = $('#event_status').val();
        let start_at = $('#start_at').val();
        let end_at = $('#end_at').val();

        $.ajax({
            url: "/events/store",
            type: "POST",
            data: {
                name: name,
                status: status,
                start_at: start_at,
                end_at: end_at,
                _token: $('meta[name="csrf-token"]').attr('content')
            },
            success: function (response) {

                Swal.fire({
                    position: 'center',
                    icon: 'success',
                    title: 'New Event has been created.',
                    showConfirmButton: false,
                    timer: 1500
                }).then(function () {
                    window.location.href = "/events";
                });

            },
            error: function (response) {
                $('#name_error').text(response.responseJSON.errors.name);
                $('#status_error').text(response.responseJSON.errors.status);
                $('#start_at_error').text(response.responseJSON.errors.start_at);
                $('#end_at_error').text(response.responseJSON.errors.end_at);
            }
        })
    });

    $('#editEventForm').on('submit', function (e) {
        e.preventDefault();

        let id = $('#event_id').val();
        let name = $('#event_name').val();
        let status = $('#event_status').val();
        let start_at = $('#start_at').val();
        let end_at = $('#end_at').val();

        $.ajax({
            url: "/events/update",
            type: "POST",
            data: {
                id: id,
                name: name,
                status: status,
                start_at: start_at,
                end_at: end_at,
                _token: $('meta[name="csrf-token"]').attr('content')
            },
            success: function (response) {

                Swal.fire({
                    position: 'center',
                    icon: 'success',
                    title: 'New Event has been updated.',
                    showConfirmButton: false,
                    timer: 1500
                }).then(function () {
                    window.location.href = "/events";
                });

            },
            error: function (response) {
                $('#name_error').text(response.responseJSON.errors.name);
                $('#status_error').text(response.responseJSON.errors.status);
                $('#start_at_error').text(response.responseJSON.errors.start_at);
                $('#end_at_error').text(response.responseJSON.errors.end_at);
            }
        })
    });

    $(document).on('click', '.eventDelete', function () {

        let id = $(this).data("id");

        Swal.fire({
            title: 'Are you sure?',
            text: "You won't be able to revert this!",
            icon: 'warning',
            showCancelButton: true,
            confirmButtonColor: '#3085d6',
            cancelButtonColor: '#d33',
            confirmButtonText: 'Yes, delete it!'
        }).then((result) => {
            if (result.isConfirmed) {
                $.ajax({
                    url: "events/delete/"+id,
                    type: 'DELETE',
                    data: {
                        "id": id,
                        "_token": $('meta[name="csrf-token"]').attr('content'),
                    },
                    success: function (){
                        Swal.fire({
                            position: 'center',
                            icon: 'success',
                            title: 'The Event has been deleted.',
                            showConfirmButton: false,
                            timer: 1500
                        }).then(function () {
                            window.location.href = "/events";
                        });

                    }
                });


            }
        })
    });

});
