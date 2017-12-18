$(function () {
 $('.datepickermonth').datepicker({ language: 'es', format: "yyyy-mm", viewMode: "months", minViewMode: "months", autoclose: true, clearBtn: true });
 $('.datepickermonth').val('').datepicker('update');
 $(":button").css('opacity', '0.5');


 $('.datepickermonthcomplet').datepicker({ language: 'es', format: "yyyy-mm-dd", autoclose: true, clearBtn: true });
 $('.datepickermonthcomplet').val('').datepicker('update');
});

$(".btnconsumptionunity").on("click", function () {
  var selectunitymonth =$('#selunidad').val();
  if (validarInput('date_search_unity_month') == false ) {
     menssage_toast('Mensaje', '2', 'Ingrese una fecha' , '3000');
	}
  else {
    if (validarSelect('selunidad') == true ) {
      menssage_toast('Mensaje', '4', 'Operación en proceso' , '3000');
      graph_consumos_max_min();
    }
    else {
      menssage_toast('Mensaje', '2', 'Seleccione minimo una opción' , '3000');
    }
  }
});

function graph_consumos_max_min() {
  var unity = $('#selunidad').val();
  var date= $('#date_search_unity_month').val();
  var _token = $('input[name="_token"]').val();
  var data_name = [];
  var data_upload = [];
  var data_descent = [];
  $.ajax({
      type: "POST",
      url: "/data_consumption_unity",
      data: { data : date, data_unity: unity, _token : _token },
      success: function (data){
        //alert(data);
        $.each(JSON.parse(data),function(index, objdata){
          data_name.push(objdata.Dias);
          data_upload.push('+'+objdata.Carga);
          data_descent.push('-'+objdata.Descarga);
        });
        var maxValueInArray = Math.max.apply(Math, data_upload);
        var minValueInArray = Math.min.apply(Math, data_descent);
        if (maxValueInArray > minValueInArray) {
          maxvalue =maxValueInArray;
        }
        else {
          maxvalue =minValueInArray;
        }
        graph_brush('main_consumo_dia', data_name, data_upload, data_descent, maxvalue);
      },
      error: function (data) {
        console.log('Error:', data);
      }
  });
}

$(".btnconsumptiontop").on("click", function () {

  if (validarInput('date_search_top_month') == false ) {
     menssage_toast('Mensaje', '2', 'Ingrese una fecha' , '3000');
	}
  else {
    menssage_toast('Mensaje', '4', 'Operación en proceso' , '3000');
    graph_consumos_top();
  }
});

function graph_consumos_top() {
  var unity = $('#selunidad').val();
  var date= $('#date_search_top_month').val();
  var _token = $('input[name="_token"]').val();
  var data_name = [];
  var data_upload = [];
  var data_descent = [];
  $.ajax({
      type: "POST",
      url: "/data_consumption_top_month",
      data: { data : date, _token : _token },
      success: function (data){
        //alert(data);
        $.each(JSON.parse(data),function(index, objdata){
          data_name.push(objdata.Camion);
          data_upload.push('+'+objdata.Up1);
          data_descent.push('-'+objdata.Down1);
        });
        graph_brush_horizontal('main_consumo_sem', data_name, data_upload, data_descent);
        tablaConsumotop(data, $("#example2"));
      },
      error: function (data) {
        console.log('Error:', data);
      }
  });
}

function tablaConsumotop(datajson, table){
  table.DataTable().destroy();
  var vartable = table.dataTable(Configuration_table_one);
  vartable.fnClearTable();
  $.each(JSON.parse(datajson), function(index, status){
    vartable.fnAddData([
      status.Camion,
      status.Up,
      status.Down,
      status.Up1,
      status.Down1,
    ]);
  });
}

$(".btnconsumptiontopday").on("click", function () {

  if (validarInput('date_search_top_days') == false ) {
     menssage_toast('Mensaje', '2', 'Ingrese una fecha' , '3000');
	}
  else {
    menssage_toast('Mensaje', '4', 'Operación en proceso' , '3000');
    graph_consumption_day();
  }
});

function graph_consumption_day() {
  var date= $('#date_search_top_days').val();
  var _token = $('input[name="_token"]').val();
  var data_name = [];
  var data_up = [];
  var data_down = [];
  $.ajax({
      type: "POST",
      url: "/data_consumption_day_all",
      data: { data : date,  _token : _token },
      success: function (data){
        alert(data);
        $.each(JSON.parse(data),function(index, objdata){
          data_name.push(objdata.Camion);
          data_up.push({ value: objdata.Up, name: objdata.Camion},);
          data_down.push({ value: objdata.Down, name: objdata.Camion},);
        });
        graph_pie_default('main_consumo_dia_up', data_name, data_up);
        graph_pie_default('main_consumo_dia_down', data_name, data_down);
      },
      error: function (data) {
        console.log('Error:', data);
        alert('3');
      }
  });
}
