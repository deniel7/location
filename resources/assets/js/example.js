var exampleModule = (function(commonModule) {

    var datatableBaseURL = commonModule.datatableBaseURL + 'examples';
    // var select2BaseURLBrand = commonModule.select2BaseURL + 'examples';

    var init = function() {
        _applyDatatable();
    };

    var _applyThousandSeperator = function() {
        // $("input.number").each(function() {
        //     var input_name = $(this).data('input');

        //     $(this).autoNumeric('init', {
        //         aSep: ',',
        //         aDec: '.',
        //         aSign: 'Rp ',
        //         mDec: '0'
        //     });

        //     $(this).on('change keyup', function() {
        //         var value = $(this).val().replace('Rp ', '');
        //         $("input[name='" + input_name + "']").val(value);
        //     });
        // });
    };

    var _applySummernote = function() {
        // $('#editor').summernote();
    }

    var _applyDatepicker = function() {
        // $('.datepicker').datepicker({
        //     weekStart: 1,
        //     todayHighlight: true,
        //     clearBtn: true,
        //     format: 'yyyy-mm-dd',
        //     autoclose: true
        // });
    };

    var _applySelect2Brand = function() {
        // $('select.brand_ajax').select2({
        //     minimumInputLength: 2,
        //     ajax: {
        //         url: select2BaseURLBrand,
        //         dataType: "json",
        //         type: "POST",
        //         data: function(params) {
        //             var queryParameters = {
        //                 term: params.term
        //             };
        //             return queryParameters;
        //         },
        //         processResults: function(data) {
        //             return {
        //                 results: $.map(data, function(item) {
        //                     return {
        //                         text: item.name + ' (' + item.code + ')',
        //                         id: item.id
        //                     };
        //                 })
        //             };
        //         }
        //     }
        // });
    };

    var _applyColorpicker = function() {
        // $('#item_color').colorpicker();
    };

    var _applyDatatable = function() {
        /* Tambah Input Field di TFOOT */
        $('#datatable tfoot th').each(function() {
            var title = $(this).text();
            if (title != '') {
                $(this).html('<input type="text" placeholder="Search ' + title + '" />');
            }
        });

        var table = $('#datatable').DataTable({
            processing: true,
            serverSide: true,
            ajax: {
                "url": datatableBaseURL,
                "type": "POST"
            },
            language: {
                "decimal": ",",
                "thousands": "."
            },
            columns: [{
                data: 'name',
                name: 'name'
            }, {
                data: 'description',
                name: 'description'
            }, {
                data: 'created_at',
                name: 'created_at'
            }, {
                data: 'updated_at',
                name: 'updated_at'
            }, {
                data: 'action',
                name: 'action',
                orderable: false,
                searchable: false
            }]
        });

        /* Ketika Value pada Input di TFOOT berubah, Maka Search Sesuai Kolom */
        table.columns().every(function() {
            var that = this;
            $('input', this.footer()).on('keyup change', function() {
                if (that.search() !== this.value) {
                    that
                        .search(this.value)
                        .draw();
                }
            });
        });

    };

    return {
        init: init
    };

})(commonModule);