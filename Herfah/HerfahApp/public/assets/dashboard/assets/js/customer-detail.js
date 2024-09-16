/**
 * App eCommerce Customer Detail - delete customer Script
 */
'use strict';


// Datatable (jquery)
$(function () {
    // Variable declaration for table
    var dt_custokkmer_order = $('.datatables-customer-order'),
      statusObj = {
        'قيد العمل': { title: 'قيد العمل', class: 'bg-label-info' },
        'قيد المراجعة': { title: 'قيد المراجعة', class: 'bg-label-warning' },
        'تم': { title: 'انتهى', class: 'bg-label-success' },
      };

    // orders datatable
    if (dt_customer_order.length) {
      var dt_order = dt_customer_order.DataTable({

        columns: [
          // columns according to JSON
          {
            // For Responsive
            className: 'control',
            searchable: false,
            orderable: false,
            responsivePriority: 2,
            targets: 0,
            render: function (data, type, meta) {
              return '';
            }
          },
          {
            // order order number
            data: null,
            render: function (data, type, meta) {
              var $id = data.id;

              return "<a href='" + order_details + "' class='fw-medium'><span>#" + $id + '</span></a>';
            }
          },
          {
            // order order number
            data: null,
            render: function (data, type, meta) {
              var $workerId = data.worker_id ;

              return "<a href='" + order_details + "' class='fw-medium'><span>#" + $workerId + '</span></a>';
            }
          },
          {
            // spent
            targets: 5,
            render: function (data, type, meta) {
              var $spent = data.Amount;

              return '<span >' + $spent + '</span>';
            }
          },
          {
            // status
            targets: 4,
            render: function (data, type, full, meta) {
              var $status = full['status'];

              return (
                '<span class="badge ' +
                statusObj[$status].class +
                '" text-capitalized>' +
                statusObj[$status].title +
                '</span>'
              );
            }
          },
        ],
        // For responsive popup
        responsive: {
          details: {
            display: $.fn.dataTable.Responsive.display.modal({
              header: function (row) {
                var data = row.data();
                return 'Details of ' + data['order'];
              }
            }),
            type: 'column',
            renderer: function (api, rowIdx, columns) {
              var data = $.map(columns, function (col, i) {
                return col.title !== '' // ? Do not show row in modal popup if title is blank (for check box)
                  ? '<tr data-dt-row="' +
                      col.rowIndex +
                      '" data-dt-column="' +
                      col.columnIndex +
                      '">' +
                      '<td>' +
                      col.title +
                      ':' +
                      '</td> ' +
                      '<td>' +
                      col.data +
                      '</td>' +
                      '</tr>'
                  : '';
              }).join('');

              return data ? $('<table class="table"/><tbody />').append(data) : false;
            }
          }
        }
      });
      $('div.head-label').html('<h5 class="card-title mb-0 text-nowrap">Orders placed</h5>');
    }
})();
