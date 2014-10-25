
$(function()
{
    if( $.fn.dataTable ) {
        $("table.filterable").dataTable();

        $("table.filterable-fn").dataTable({
            sPaginationType: "full_numbers",
            "bRetrieve": true
        });
    }

    if( $.fn.select2 ) {
        $("select.mws-select2").select2();
    }
})