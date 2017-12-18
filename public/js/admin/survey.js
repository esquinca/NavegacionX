$(function () {
 $('.datepickermonth').datepicker({ language: 'es', format: "yyyy-mm", viewMode: "months", minViewMode: "months", autoclose: true, clearBtn: true });
 $('.datepickermonth').val('').datepicker('update');
 $(":button").css('opacity', '0.5');
 automultiselect('selectgraphs');
});

function automultiselect(campo){
  $('#'+campo).multiselect({
    buttonWidth: '100%',
    nonSelectedText: 'Elija uno o más',
    enableClickableOptGroups: true,
    enableCollapsibleOptGroups: false,
    enableFiltering: false,
    includeSelectAllOption: true,
    onSelectAll: function () {
        menssage_toast('Mensaje', '4', 'Todas opciones seleccionadas' , '3000');
    },
    onDeselectAll: function () {
        menssage_toast('Mensaje', '2', 'Seleccione minimo una opción' , '3000');
    },
    onChange: function(option, checked, select) {
      var opselected = $(option).val();
      if(checked == true) {

      } else if(checked == false){

      }
    }
  });
  $('#'+campo).multiselect('selectAll', false);
  $('#'+campo).multiselect('updateButtonText');
}

$(".btngeneral").on("click", function () {
  var multiselectact =$('#selectgraphs').val();
  if (validarInput('date_search_pral') == false ) {
     menssage_toast('Mensaje', '2', 'Ingrese un valor' , '3000');
	}
  else {
    if ( multiselectact != '') {
      menssage_toast('Mensaje', '4', 'Operación en proceso' , '3000');
      $(".btngeneral").css({ opacity: 1 });
      opacity_btn('btngeneral');
      var multiselectact2 =$('#selectgraphs').val();
      var numbersArray = multiselectact2.toString().split(',');

      $.each(numbersArray, function(index, value) {
        switch (value) {
          case '1':
              // alert(index + ': ' + value);
              graph_survey_nationality();
              break;
          case '2':
              // alert(index + ': ' + value);
              graph_survey_age();
              break;
          case '3':
              // alert(index + ': ' + value);
              graph_survey_domain();
              break;
          case '4':
              // alert(index + ': ' + value);
              graph_survey_tours();
              break;
        }
      });

    }
    else {
      menssage_toast('Mensaje', '2', 'Seleccione minimo una opción' , '3000');
    }
  }
});

function graph_survey_nationality() {
  var date= $('#date_search_pral').val();
  var _token = $('input[name="_token"]').val();
  var data_name = [];
  var data_count = [];
  //alert('1');
  $.ajax({
      type: "POST",
      url: "/data_nationality",
      data: { data : date,  _token : _token },
      success: function (data){
        //alert(data);
        $.each(JSON.parse(data),function(index, objdata){
          data_name.push(objdata.Nacionalidad);
          data_count.push(objdata.Cantidad);
        });
        graph_barras('main_nationality', data_name, data_count);
      },
      error: function (data) {
        console.log('Error:', data);
        alert('3');
      }
  });
}

function graph_survey_age() {
  var date= $('#date_search_pral').val();
  var _token = $('input[name="_token"]').val();
  var data_name = [];
  var data_count = [];
  //alert('1');
  $.ajax({
      type: "POST",
      url: "/data_ages",
      data: { data : date,  _token : _token },
      success: function (data){
        //alert(data);
        $.each(JSON.parse(data),function(index, objdata){
          data_name.push(objdata.Edades);
          data_count.push({ value: objdata.Cantidad, name: objdata.Edades},);
        });
        graph_pie_default('main_ages', data_name, data_count);
      },
      error: function (data) {
        console.log('Error:', data);
        alert('3');
      }
  });
}

function graph_survey_domain() {
  var date= $('#date_search_pral').val();
  var _token = $('input[name="_token"]').val();
  var data_name = [];
  var data_count = [];
  //alert('1');
  $.ajax({
      type: "POST",
      url: "/data_domains",
      data: { data : date,  _token : _token },
      success: function (data){
        //alert(data);
        $.each(JSON.parse(data),function(index, objdata){
          data_name.push(objdata.Dominio);
          data_count.push(objdata.email);
        });
        graph_barras_min_max_average('main_domains', data_name, data_count);
      },
      error: function (data) {
        console.log('Error:', data);
        alert('3');
      }
  });
}

function graph_survey_tours() {
  var date= $('#date_search_pral').val();
  var _token = $('input[name="_token"]').val();
  var data_name = [];
  var data_count = [];
  $.ajax({
      type: "POST",
      url: "/data_tours",
      data: { data : date,  _token : _token },
      success: function (data){
        //alert(data);
        $.each(JSON.parse(data),function(index, objdata){
          data_name.push(objdata.Tour);
          data_count.push(objdata.Cantidad);
        });
        graph_barras_min_max('main_tours', data_name, data_count);
      },
      error: function (data) {
        console.log('Error:', data);
        alert('3');
      }
  });
}
