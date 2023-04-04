// Call the dataTables jQuery plugin
$(document).ready(function() {
  $('#dataTable').DataTable({
      processing: true,
      serverSide: true,
      stateSave: true,
      pageLength: 10,
      lengthMenu: [10, 20, 30, 50, 100, 200, 500, 1000],
      ajax: {
        'url': '/diamonds',
        'type': 'GET'
      },
      columns: [
        {data: 'index', name: 'index', orderable: true, searchable: true},
        {data: 'cut', name: 'cut', orderable: true, searchable: true},
        {data: 'color', name: 'color', orderable: true, searchable: true},
        {data: 'clarity', name: 'clarity', orderable: true, searchable: true},
        {data: 'carat_weight', name: 'carat_weight', orderable: true, searchable: true},
        {data: 'cut_quality', name: 'cut_quality', orderable: true, searchable: true},
        {data: 'lab', name: 'lab', orderable: true, searchable: true},
        {data: 'symmetry', name: 'symmetry', orderable: true, searchable: true},
        {data: 'polish', name: 'polish', orderable: true, searchable: true},
        {data: 'eye_clean', name: 'eye_clean', orderable: true, searchable: true},
        {data: 'culet_size', name: 'culet_size', orderable: true, searchable: true},
        {data: 'culet_condition', name: 'culet_condition', orderable: true, searchable: true},
        {data: 'depth_percent', name: 'depth_percent', orderable: true, searchable: true},
        {data: 'table_percent', name: 'table_percent', orderable: true, searchable: true},
        {data: 'meas_length', name: 'meas_length', orderable: true, searchable: true},
        {data: 'meas_width', name: 'meas_width', orderable: true, searchable: true},
        {data: 'meas_depth', name: 'meas_depth', orderable: true, searchable: true},
        {data: 'girdle_min', name: 'girdle_min', orderable: true, searchable: true},
        {data: 'girdle_max', name: 'girdle_max', orderable: true, searchable: true},
        {data: 'fluor_color', name: 'fluor_color', orderable: true, searchable: true},
        {data: 'fluor_intensity', name: 'fluor_intensity', orderable: true, searchable: true},
        {data: 'fancy_color_dominant_color', name: 'fancy_color_dominant_color', orderable: true, searchable: true},
        {data: 'fancy_color_secondary_color', name: 'fancy_color_secondary_color', orderable: true, searchable: true},
        {data: 'fancy_color_overtone', name: 'fancy_color_overtone', orderable: true, searchable: true},
        {data: 'fancy_color_intensity', name: 'fancy_color_intensity', orderable: true, searchable: true},
        {data: 'total_sales_price', name: 'total_sales_price', orderable: true, searchable: true}
      ]
  });
});
