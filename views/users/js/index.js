$(document).ready(function () {
    var $table = $('#tb-users').DataTable({
        order: [0, 'asc'],
//        pagingType: 'full_numbers',
        language: {
            lengthMenu: 'Display _MENU_ records per page',
            zeroRecords: '<div class="d-flex justify-content-center"> ...0 record found</div>',
            info: 'Showing page _PAGE_ of _PAGES_',
            infoEmpty: 'No data to show',
            infoFiltered: '(filtered from _MAX_ total records)'
        },
        search: {
            return: false
        },
        lengthMenu: [[10, 25, 50, 100, -1], [10, 25, 50, 100, 'All']],
        columnDefs: [
            {
                targets: [0],
                sortable: false,
                searchable: false
            },
            {
                targets: [5],
                sortable: false,
                searchable: false
            }
        ],
        buttons: [{
                title: 'Users',
                messageTop: 'List of users',
                extend: 'pdfHtml5',
                text: 'PDF',
                exportOptions: {
                    columns: ':visible'
                },
                pageSize: 'A4',
                download: 'open',
                orientation: 'landscape',
                className: 'btn btn-secondary',
                key: {
                    key: 's',
                    altKey: true
                }
            }, {
                extend: 'colvis',
                text: 'Visibility',
                className: 'btn btn-inverse-dark btn-sm radius-0'
            }],
        responsive: {
            details: {
                display: $.fn.dataTable.Responsive.display.modal({
                    header: (row) => {
                        var data = row.data();
                        return `${data[2]} :: ${data[4]} details`;
                    }
                }),
                renderer: $.fn.dataTable.Responsive.renderer.tableAll({
                    tableClass: 'table'
                })
            }
        }
    });
    $table.on('order.dt search.dt', function () {
        $table.column(0, {search: 'applied', order: 'applied'}).nodes().each(function (cell, i) {
            cell.innerHTML = i + 1;
        });
    }).draw();
    setTimeout(function () {
        $table.on('draw.dt', () => {
            $table.buttons().container().appendTo('#table_wrapper');
        }).draw();
    }, 300);
    btnAction($table);
});

function btnAction($table) {
    $('#tb-users tbody, .dtr-details').on('click', '.btn-action', async function (e) {
        e.preventDefault();
        var fd = new FormData();
        var id = parseInt($(this).attr("data-id"));
        var status = parseInt($(this).attr("data-action"));
        var old = parseInt($(this).attr('data-old'));
        var url = window.siteurl + `users/update`;
        fd.append('id', id);
        fd.append('status', status);
        var conf = await confirm({message: `Are you sure you want to ${['', 'approve', 'reject'][status]} this user?`});
        if (conf && await Update({data: fd, url})) {//badge-status
            $(this).parents('tr').find('span.badge-status').removeClass(`${['badge-warning', 'badge-success', 'badge-danger'][old]}`).addClass(`${['badge-warning', 'badge-success', 'badge-danger'][status]}`);
            $(this).parents('tr').find('span.badge-status').html(`${['', 'Approved', 'Rejected'][status]}`);
        }
    });
}