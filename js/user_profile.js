$('#dt_workinfo').DataTable({
  "ajax": {
    "url": base_url + "user/ajax_get_workinfo/",
    "dataSrc": ""
  },
  "columns": [
    { "data": function(data, type, row, meta) {
        return data.p_from+' - '+data.p_to ;
      }
    },
    {"data":"p_position"},
    {"data":"w_type"},
    {"data":"p_company"},
    {"data":"p_salarymonthly"},
    { "data": function(data, type, row, meta) {
      if(data.p_salarygrade !== null){
        return data.p_salarygrade+' / '+data.p_salarystep ;
      }else{
        return '' ;
      }
      }
    },
    {"data":"p_appointment"},
    {"data":"p_isservicerecord"}
  ],
  columnDefs: [{
      // targets: [0, 1],
      visible: false,
      searchable: true,
    }, ],
   dom: "Bfrtip",
          buttons: [
          {
            extend: "excel",
            className: "btn-sm"
          },
          {
            extend: "pdfHtml5",
            className: "btn-sm"
          },
          {
            extend: "print",
            className: "btn-sm"
          },
          ],
  deferRender: true,
  scrollY: 300,
  paging: true,
  scrollCollapse: true,
  scroller: true,
  autoWidth: false,
});
