function opacity_btn(campo) {
  setTimeout('$(".'+campo+'").css({ opacity: 0.5 })', 5000 );
}

function menssage_toast(title, campoa, contenido, tiempo){
  switch (campoa) {
    case '1':
      $.toast({
          heading: title,
          text: contenido,
          position: 'top-right',
          loaderBg: '#DFBE47',
          icon:'warning',
          textColor: 'white',
          hideAfter: tiempo,
          stack: 6
      });
      break;
    case '2':
      $.toast({
          heading: title,
          text: contenido,
          position: 'top-right',
          loaderBg: '#DFBE47',
          icon:'error',
          textColor: 'white',
          bgColor: 'rgba(169, 67, 66, 0.7)',
          hideAfter: tiempo,
          stack: 6
      });
      break;
    case '3':
      $.toast({
          heading: title,
          text: contenido,
          position: 'top-right',
          loaderBg: '#DFBE47',
          icon:'info',
          textColor: 'white',
          hideAfter: tiempo,
          stack: 6
      });
      break;
    case '4':
      $.toast({
          heading: title,
          text: contenido,
          position: 'top-right',
          loaderBg: '#DFBE47',
          icon:'success',
          textColor: 'white',
          hideAfter: tiempo,
          stack: 6
      });
      break;
  }
}

function validarInput(campo) {
  if (campo != '') {
    select=document.getElementById(campo).value;
    if( select == null || select == 0 ) {
      $('#'+campo).parent().attr("class", "form-group has-error");
      return false;
    }
    else {
      $("#"+campo).parent().attr("class","form-group has-default");
      return true;
    }
  };
}

function validarSelect(campo) {
  if (campo != '') {
    select=document.getElementById(campo).selectedIndex;
    if( select == null || select == 0 ) {
      $('#'+campo).parent().parent().attr("class", "form-group has-error");
      return false;
    }
    else {
      $("#"+campo).parent().parent().attr("class","form-group has-default");
      return true;
    }
  };
}

function validarconsidencias (campoa, campob){
  var var_length_a = $('#password').val();
  var var_length_b = $('#password_confirmation').val();

  var validad_a = false;
  var validad_b = false;
  var validad_c = false;

  if (var_length_a.length >= 6) {
    validad_a = true;
    //console.error('cumple password');
  }
  if (var_length_b.length >= 6) {
    validad_b = true;
    //console.error('cumple retry password');
  }
  if (validad_a == true &&  validad_b == true) {
      if( var_length_a === var_length_b ){
        //console.error('cumple ');
        return true;
      }
      else {
        //console.error('nocumple intert');
        return false;
      }
  }
  else {
    //console.error('nocumple 1');
    return false;
  }
}

function graph_barras(title, campoa, campob) {
  var myChart = echarts.init(document.getElementById(title));
  var option = {
    color: ['#3398DB'],
    tooltip : {
        trigger: 'axis',
        axisPointer : {            // 坐标轴指示器，坐标轴触发有效
            type : 'shadow'        // 默认为直线，可选为：'line' | 'shadow'
        }
    },
    toolbox: {
        show : true,
        feature : {
            dataView : {show: false, readOnly: false, title : 'Datos', lang: ['Vista de datos', 'Cerrar', 'Actualizar']},
            magicType : {
              show: true,
              type: ['line', 'bar'],
              title : {
                line : 'Gráfico de líneas',
                bar : 'Gráfico de barras',
                stack : 'Acumular',
                tiled : 'Tiled',
                force: 'Cambio de diseño orientado a la fuerza',
                chord: 'Interruptor del diagrama de acordes',
                pie: 'Gráfico circular',
                funnel: 'Gráfico de embudo'
              },
            },
            restore : {show: false, title : 'Recargar'},
            saveAsImage : {show: true , title : 'Guardar'}
        }
    },
    calculable : true,
    grid: {
        left: '3%',
        right: '4%',
        bottom: '3%',
        containLabel: true
    },
    xAxis : [
        {
            type : 'category',
            data : campoa,
            axisTick: {
                alignWithLabel: true
            },
            axisLabel : {
               show:true,
               interval: 'auto',    // {number}
               rotate: 90,
               margin: 6,
               formatter: '{value}',
               textStyle: {
                  //  color: 'blue',
                   fontFamily: 'sans-serif',
                   fontSize: 8,
                   fontStyle: 'italic',
                   fontWeight: 'bold'
               }
            }
            //
        }
    ],
    yAxis : [
        {
            type : 'value'
        }
    ],
    series : [
        {
            name:'Cantidad',
            type:'bar',
            barWidth: '60%',
            data:campob,
            itemStyle: {
              normal: {
                  color: function(params) {
                      // build a color map as your need.
                      var colorList = [
                        '#DD4B39','#00C0EF', '#605CA8', '#FF851B','#00A65A',
                        '#C1232B','#B5C334','#FCCE10','#E87C25','#27727B',
                          '#FE8463','#9BCA63','#FAD860','#F3A43B','#60C0DD',
                          '#D7504B','#C6E579','#F4E001','#F0805A','#26C0C0'
                      ];
                      return colorList[params.dataIndex]
                  }
              }
            }
        }
    ]
  };
  myChart.setOption(option);

  $(window).on('resize', function(){
      if(myChart != null && myChart != undefined){
          myChart.resize();
      }
  });
}

function graph_pie_default(title, campoa, campob){
  var myChart = echarts.init(document.getElementById(title));
  var option = {
        title : {
            show: false,
            text: 'title',
            subtext: 'subtitulo',
            x:'center'
        },
        tooltip : {
            trigger: 'item',
            formatter: "{a} <br/>{b} : {c} ({d}%)"
        },
        legend: {
            type: 'scroll',
            orient: 'vertical',
            right: 10,
            top: 10,
            bottom: 20,
            data: campoa
        },
        series : [
            {
                name: 'Información',
                type: 'pie',
                radius : '55%',
                center: ['40%', '50%'],
                data:campob,
                itemStyle: {
                    emphasis: {
                        shadowBlur: 10,
                        shadowOffsetX: 0,
                        shadowColor: 'rgba(0, 0, 0, 0.5)'
                    }
                }
            }
        ]
  };
  myChart.setOption(option);

  $(window).on('resize', function(){
      if(myChart != null && myChart != undefined){
          myChart.resize();
      }
  });
}

function graph_nested_pies(title, campoa, campob){
  var myChart = echarts.init(document.getElementById(title));
  var option = {
    tooltip: {
        trigger: 'item',
        formatter: "{a} <br/>{b}: {c} ({d}%)"
    },
    legend: {
        orient: 'vertical',
        x: 'left',
        data:campoa
    },
    series: [
        {
            name:'访问来源',
            type:'pie',
            selectedMode: 'single',
            radius: [0, '30%'],

            label: {
                normal: {
                    position: 'inner'
                }
            },
            labelLine: {
                normal: {
                    show: false
                }
            },
            data:campob
        },
        {
            name:'访问来源',
            type:'pie',
            radius: ['40%', '55%'],
            label: {
                normal: {
                    formatter: '{a|{a}}{abg|}\n{hr|}\n  {b|{b}：}{c}  {per|{d}%}  ',
                    backgroundColor: '#eee',
                    borderColor: '#aaa',
                    borderWidth: 1,
                    borderRadius: 4,
                    rich: {
                        a: {
                            color: '#999',
                            lineHeight: 22,
                            align: 'center'
                        },
                        hr: {
                            borderColor: '#aaa',
                            width: '100%',
                            borderWidth: 0.5,
                            height: 0
                        },
                        b: {
                            fontSize: 16,
                            lineHeight: 33
                        },
                        per: {
                            color: '#eee',
                            backgroundColor: '#334455',
                            padding: [2, 4],
                            borderRadius: 2
                        }
                    }
                }
            },
            data:campob
        }
    ]
  };
  myChart.setOption(option);

  $(window).on('resize', function(){
      if(myChart != null && myChart != undefined){
          myChart.resize();
      }
  });
}

function graph_barras_min_max(title,campoa,campob) {
  var myChart = echarts.init(document.getElementById(title));
  var seriesLabel = {
      normal: {
          show: true,
          textBorderColor: '#333',
          textBorderWidth: 2
      }
  }

  var option = {
      title: {
          show: false,
          text: 'Title'
      },
      tooltip: {
          trigger: 'axis',
          axisPointer: {
              type: 'shadow'
          }
      },
      legend: {
          data: campoa
      },
      grid: {
          left: 100
      },
      toolbox: {
          show: true,
          feature: {
            dataView : {show: true, readOnly: false, title : 'Datos', lang: ['Vista de datos', 'Cerrar', 'Actualizar']},
            restore : {show: false, title : 'Recargar'},
            saveAsImage: {show: true , title : 'Guardar'}
          }
      },
      xAxis: {
          type: 'value',
          name: 'Tours',
          axisLabel: {
              formatter: '{value}'
          }
      },
      yAxis: {
          type: 'category',
          inverse: true,
          data: campoa,
          axisLabel: {
            fontSize: 8,
            fontStyle: 'italic',
            fontWeight: 'bold'
        }
      },
      series: [
          {
              name: 'No.',
              type: 'bar',
              data: campob,
              label: seriesLabel,
              markPoint: {
                  symbolSize: 1,
                  symbolOffset: [0, '50%'],
                  label: {
                     normal: {
                          formatter: '{a|{a}\n}{b|{b} }{c|{c}}',
                          backgroundColor: 'rgb(242,242,242)',
                          borderColor: '#aaa',
                          borderWidth: 1,
                          borderRadius: 3,
                          padding: [1, 5],
                          lineHeight: 26,
                          shadowBlur: 5,
                          shadowColor: '#000',
                          shadowOffsetX: 0,
                          shadowOffsetY: 1,
                          position: 'right',
                          distance: 5,
                          rich: {
                              a: {
                                  align: 'left',
                                  color: '#fff',
                                  fontSize: 10,
                                  textShadowBlur: 1,
                                  textShadowColor: '#000',
                                  textShadowOffsetX: 0,
                                  textShadowOffsetY: 1,
                                  textBorderColor: '#333',
                                  textBorderWidth: 1
                              },
                              b: {
                                   color: '#333',
                                   fontSize: 8
                              },
                              c: {
                                  //color: '#ff8811',
                                  //textBorderColor: '#000',
                                  //textBorderWidth: 1,
                                  fontSize: 8
                              }
                          }
                     }
                  },
                  data: [
                      {type: 'max', name: 'Max: '},
                      {type: 'min', name: 'Min: '}
                  ]
              },
              itemStyle: {
                normal: {
                    color: function(params) {
                        // build a color map as your need.
                        var colorList = [
                          '#DD4B39','#00C0EF', '#605CA8', '#FF851B','#00A65A',
                          '#C1232B','#B5C334','#FCCE10','#E87C25','#27727B',
                            '#FE8463','#9BCA63','#FAD860','#F3A43B','#60C0DD',
                            '#D7504B','#C6E579','#F4E001','#F0805A','#26C0C0'
                        ];
                        return colorList[params.dataIndex]
                    }
                }
              }
          }
      ]
  };

  myChart.setOption(option);

  $(window).on('resize', function(){
      if(myChart != null && myChart != undefined){
          myChart.resize();
      }
  });
}

function graph_barras_min_max_average(title, campoa, campob) {
  var myChart = echarts.init(document.getElementById(title));
  var option = {
      title : {
          show: false,
          text: 'Title',
          subtext: 'Subtitle'
      },
      tooltip : {
          trigger: 'axis'
      },
      legend: {
          data:campoa
      },
      toolbox: {
          show : true,
          feature : {
              dataView : {show: false, readOnly: false, title : 'Datos', lang: ['Vista de datos', 'Cerrar', 'Actualizar']},
              magicType : {
                show: true,
                type: ['line', 'bar'],
                title : {
                  line : 'Gráfico de líneas',
                  bar : 'Gráfico de barras',
                  stack : 'Acumular',
                  tiled : 'Tiled',
                  force: 'Cambio de diseño orientado a la fuerza',
                  chord: 'Interruptor del diagrama de acordes',
                  pie: 'Gráfico circular',
                  funnel: 'Gráfico de embudo'
                },
              },
              restore : {show: false, title : 'Recargar'},
              saveAsImage : {show: true , title : 'Guardar'}
          }
      },
      calculable : true,
      xAxis : [
          {
              type : 'category',
              data : campoa,
              axisLabel : {
                 show:true,
                 interval: 'auto',    // {number}
                 rotate: 90,
                 margin: 6,
                 formatter: '{value}',
                 textStyle: {
                    //  color: 'blue',
                     fontFamily: 'sans-serif',
                     fontSize: 8,
                     fontStyle: 'italic',
                     fontWeight: 'bold'
                 }
              }
          }
      ],
      yAxis : [
          {
              type : 'value'
          }
      ],
      series : [
          {
              name:'Datos',
              type:'bar',
              data: campob,
              markPoint : {
                itemStyle: {
                  normal: {
                      color: '#00C0EF',
                      borderColor:'#00C0EF',
                      borderWidth: '#00C0EF',
                      label: {
                        show: true,
                        formatter: null,
                        textStyle: {
                            color: '#ffff',
                            fontFamily: 'Arial, Verdana, sans...',
                            fontSize: 10,
                            fontStyle: 'normal',
                            fontWeight: 'normal',
                            },
                      },
                  },
                  emphasis: {
                    color: '#C1232B',
                    borderColor:'#C1232B',
                    borderWidth:'#C1232B',
                    label: {
                        show: true,
                        formatter: null,
                        textStyle: {
                                color: '#ffff',
                                fontFamily: 'Arial, Verdana, sans...',
                                fontSize: 9,
                                fontStyle: 'normal',
                                fontWeight: 'normal',
                        },
                    },
                  },
                },
                data : [
                      {type : 'max', name: 'Máximo'},
                      {type : 'min', name: 'Mínimo'}
                ]
              },
              markLine : {
                  itemStyle: {
                    normal: {
                        color: '#00C0EF',
                        lineStyle: {
                          color: '#605CA8',
                          type: 'solid',
                          // width: <各异>,
                          shadowColor: 'rgba(0,0,0,0)',
                          shadowBlur: 5,
                          shadowOffsetX: 3,
                          shadowOffsetY: 3,
                        },
                        label: {
                            show: true,
                            formatter: null,
                            textStyle: {
                              color:'#FF851B',
                              // align: <各异>,
                              // baseline: <各异>,
                              fontFamily: 'Arial, Verdana, sans...',
                              fontSize: 12,
                              fontStyle: 'normal',
                              fontWeight: 'normal',
                            },
                        },
                    },
                    emphasis: {
                        color:'#27727B',
                        lineStyle: {
                          color:'#FCCE10',
                          type: 'solid',
                          // width: <各异>,
                          shadowColor: 'rgba(0,0,0,0)',
                          shadowBlur: 5,
                          shadowOffsetX: 3,
                          shadowOffsetY: 3,
                        },
                        label: {
                            show: true,
                            formatter: null,
                            textStyle: {
                              color:'#26C0C0',
                              // align: <各异>,
                              // baseline: <各异>,
                              fontFamily: 'Arial, Verdana, sans...',
                              fontSize: 12,
                              fontStyle: 'normal',
                              fontWeight: 'normal',
                            },
                        },
                    },
                  },
                  data : [
                      {type : 'average', name: 'Promedio'}
                  ]
              },
              itemStyle: {
                normal: {
                    color: function(params) {
                        // build a color map as your need.
                        var colorList = [
                          '#DD4B39','#00C0EF', '#605CA8', '#FF851B','#00A65A',
                          '#C1232B','#B5C334','#FCCE10','#E87C25','#27727B',
                            '#FE8463','#9BCA63','#FAD860','#F3A43B','#60C0DD',
                            '#D7504B','#C6E579','#F4E001','#F0805A','#26C0C0'
                        ];
                        return colorList[params.dataIndex]
                    }
                }
              }
          }
      ]
  };
  myChart.setOption(option);

  $(window).on('resize', function(){
      if(myChart != null && myChart != undefined){
          myChart.resize();
      }
  });
}

function graph_barras__with_text_fly(title, campoa, campob) {
  var myChart = echarts.init(document.getElementById(title));
  var option = {
    title: {
        show: false,
        text: 'Title',
        subtext: 'Subtitle'
    },
    tooltip: {
        trigger: 'axis',
        axisPointer: {
            type: 'shadow'
        }
    },
    toolbox: {
        show : true,
        feature : {
            dataView : {show: false, readOnly: false, title : 'Datos', lang: ['Vista de datos', 'Cerrar', 'Actualizar']},
            magicType : {
              show: true,
              type: ['line', 'bar'],
              title : {
                line : 'Gráfico de líneas',
                bar : 'Gráfico de barras',
                stack : 'Acumular',
                tiled : 'Tiled',
                force: 'Cambio de diseño orientado a la fuerza',
                chord: 'Interruptor del diagrama de acordes',
                pie: 'Gráfico circular',
                funnel: 'Gráfico de embudo'
              },
            },
            restore : {show: true, title : 'Recargar'},
            saveAsImage : {show: true , title : 'Guardar'}
        }
    },
    calculable : true,
    grid: {
        left: '3%',
        right: '4%',
        bottom: '3%',
        containLabel: true
    },
    xAxis: {
        type: 'value',
        boundaryGap: [0, 0.01]
    },
    yAxis: {
        type: 'category',
        data: campoa
    },
    label: {
            normal: {
                show: true,
                textBorderColor: '#333',
                textBorderWidth: 1,
                position: 'right',
                fontSize: 8,
            }
        },
    series: [
        {
            name: 'Cantidad',
            type: 'bar',
            data: campob,
            itemStyle: {
              normal: {
                  color: function(params) {
                      // build a color map as your need.
                      var colorList = [
                        '#DD4B39','#00C0EF', '#605CA8', '#FF851B','#00A65A',
                        '#C1232B','#B5C334','#FCCE10','#E87C25','#27727B',
                          '#FE8463','#9BCA63','#FAD860','#F3A43B','#60C0DD',
                          '#D7504B','#C6E579','#F4E001','#F0805A','#26C0C0'
                      ];
                      return colorList[params.dataIndex]
                  }
              }
            }
        }
    ]
  };

  myChart.setOption(option);

  $(window).on('resize', function(){
      if(myChart != null && myChart != undefined){
          myChart.resize();
      }
  });
}

function graph_brush(title, campoa, campob, campoc, campomax) {
  var myChart = echarts.init(document.getElementById(title));
  var itemStyle = {
    normal: {
    },
    emphasis: {
        barBorderWidth: 1,
        shadowBlur: 10,
        shadowOffsetX: 0,
        shadowOffsetY: 0,
        shadowColor: 'rgba(0,0,0,0.5)'
    }
  };
  var option = {
      backgroundColor: '#eee',
      legend: {
          data: ['Subida MB', 'Bajada MB'],
          align: 'left',
          left: 10
      },
      brush: {
          toolbox: ['rect', 'polygon', 'lineX', 'lineY', 'keep', 'clear'],
          xAxisIndex: 0
      },
      toolbox: {
          feature: {
              magicType: {
                  type: ['stack', 'tiled']
              },
              title: {
                line: 'for line charts',
                bar: 'for bar charts',
                stack: 'for stacked charts',
                tiled: 'for tiled charts',
              },
              dataView: {show: true, readOnly: false, title : 'Datos', lang: ['Vista de datos', 'Cerrar', 'Actualizar']},
              brush: {
                title: {
                  rect: 'Rectangle selection',
                  polygon: 'Polygon selection',
                  lineX: 'Horizontal selection',
                  lineY: 'Vertical selection',
                  keep: 'Keep previous select...',
                  clear: 'Clear selection',
                },
              }
          }
      },
      tooltip: {
          trigger: 'axis',
          axisPointer : {            // 坐标轴指示器，坐标轴触发有效
              type : 'shadow'        // 默认为直线，可选为：'line' | 'shadow'
          }
      },
      xAxis: {
          data: campoa,
          name: 'X Axis',
          silent: false,
          axisLine: {onZero: true},
          splitLine: {show: false},
          splitArea: {show: false},
          axisLabel : {
                 show:true,
                 interval: 'auto',    // {number}
                 rotate: 90,
                 margin: 6,
                 formatter: '{value}',
                 textStyle: {
                    //  color: 'blue',
                     fontFamily: 'sans-serif',
                     fontSize: 8,
                     fontStyle: 'italic',
                     fontWeight: 'bold'
                 }
              }
      },
      yAxis: {
          inverse: false, //Invertir
          splitArea: {show: false}
      },
      grid: {
          left: 100
      },
      visualMap: {
          type: 'continuous',
          dimension: 1,
          text: ['High', 'Low'],
          inverse: false,
          itemHeight: 200,
          calculable: true,
          min: -campomax,
          max: campomax,
          top: 60,
          left: 10,
          inRange: {
              colorLightness: [0.4, 0.8]
          },
          outOfRange: {
              color: '#bbb'
          },
          controller: {
              inRange: {
                  color: '#2f4554'
              }
          }
      },
      series: [
          {
              name: 'Subida MB',
              type: 'bar',
              stack: 'one',
              itemStyle: itemStyle,
              data: campob
          },
          {
              name: 'Bajada MB',
              type: 'bar',
              stack: 'one',
              itemStyle: itemStyle,
              data: campoc
          }
      ]
  };
  myChart.setOption(option);

  $(window).on('resize', function(){
      if(myChart != null && myChart != undefined){
          myChart.resize();
      }
  });
}

function graph_brush_horizontal(title, campoa, campob, campoc){
  var myChart = echarts.init(document.getElementById(title));
  var option = {
      tooltip : {
          trigger: 'axis',
          axisPointer : {            // 坐标轴指示器，坐标轴触发有效
              type : 'shadow'        // 默认为直线，可选为：'line' | 'shadow'
          }
      },
      legend: {
          data: ['Subida', 'Bajada'],
      },
      grid: {
          left: '3%',
          right: '4%',
          bottom: '3%',
          containLabel: true
      },
      xAxis : [
          {
              type : 'value'
          }
      ],
      yAxis : [
          {
              type : 'category',
              axisTick : {show: false},
              data : campoa,
              axisLabel : {
                 show:true,
                 interval: 'auto',    // {number}
                 textStyle: {
                    //  color: 'blue',
                     fontFamily: 'sans-serif',
                     fontSize: 8,
                     fontStyle: 'italic',
                     fontWeight: 'bold'
                 }
              }
          }
      ],
      series : [
          {
              name:'Subida',
              type:'bar',
              stack: '总量',
              label: {
                  normal: {
                      show: true
                  }
              },
              data:campob
          },
          {
              name:'Bajada',
              type:'bar',
              stack: '总量',
              label: {
                  normal: {
                      show: true,
                  }
              },
              data:campoc
          }
      ]
  };
  myChart.setOption(option);

  $(window).on('resize', function(){
      if(myChart != null && myChart != undefined){
          myChart.resize();
      }
  });
}

var Configuration_table_one= {
  paging: false,
  Filter: false,
  searching: false,
  bInfo: false,
  "processing": true,
  "columnDefs": [
        { //Subida 1
            "targets": [3],
            "visible": false,
            "searchable": false
        },
        { //Bajada 1
            "targets": [4],
            "visible": false,
            "searchable": false
        }
    ],
  language:{
    "sProcessing":     "Procesando...",
    "sLengthMenu":     "Mostrar _MENU_ registros",
    "sZeroRecords":    "No se encontraron resultados",
    "sEmptyTable":     "Ningún dato disponible",
    "sInfo":           "Mostrando registros del _START_ al _END_ de un total de _TOTAL_ registros",
    "sInfoEmpty":      "Mostrando registros del 0 al 0 de un total de 0 registros",
    "sInfoFiltered":   "(filtrado de un total de _MAX_ registros)",
    "sInfoPostFix":    "",
    "sSearch":         "<i class='fa fa-search'></i> Buscar:",
    "sUrl":            "",
    "sInfoThousands":  ",",
    "sLoadingRecords": "Cargando...",
    "oPaginate": {
      "sFirst":    "Primero",
      "sLast":     "Último",
      "sNext":     "Siguiente",
      "sPrevious": "Anterior"
    },
    "oAria": {
      "sSortAscending":  ": Activar para ordenar la columna de manera ascendente",
      "sSortDescending": ": Activar para ordenar la columna de manera descendente"
    }
  },
  "footerCallback": function ( row, data, start, end, display ) {
                    var api = this.api(), data;

                    // converting to interger to find total
                    var intVal = function ( i ) {
                      return typeof i === 'string' ?
                            i.replace(/[\$,]/g, '')*1 :
                            typeof i === 'number' ?
                                i : 0;
                    };

                  //CONTADOR DE ZEROS EN CADA COLUMNA
                    var nregister = api.column(3, { search:'applied' }).data().length;
                    var count_ene = api.column(3, { search:'applied' } ).data()
                              .filter( function (value, index) {
                                    return value <= 0 ? true : false;
                              }).length;

                    var count_feb = api.column(4, { search:'applied' } ).data()
                              .filter( function (value, index) {
                                    return value <= 0 ? true : false;
                              }).length;

                  //SUMA EN COLUMNAS
                    var monto_ene = api.column( 3 , { search:'applied' }).data().reduce( function (a, b) {
                            return intVal(a) + intVal(b);
                        }, 0 );
                    var monto_feb = api.column( 4 , { search:'applied' }).data().reduce( function (a, b) {
                            return intVal(a) + intVal(b);
                        }, 0 );

                  //Columna de Promedio
                  var count_average_up = api.column(3, { search:'applied' } ).data()
                              .filter( function (value, index) {
                                    return value <= 0 ? true : false;
                              }).length;

                  var monto_average_up = api.column( 3 , { search:'applied' }).data().reduce( function (a, b) {
                          return intVal(a) + intVal(b);
                      }, 0 );

                  var count_average_down = api.column(4, { search:'applied' } ).data()
                              .filter( function (value, index) {
                                    return value <= 0 ? true : false;
                              }).length;

                  var monto_average_down = api.column( 4 , { search:'applied' }).data().reduce( function (a, b) {
                          return intVal(a) + intVal(b);
                      }, 0 );


                  //Asignación de valores
                    var nCells = row.getElementsByTagName('th');

                    nCells[0].innerHTML = 'PROMEDIO CONSUMIDO';

                    if (nregister != 0){
                      if (monto_average_up != 0) { nCells[1].innerHTML = parseFloat( monto_average_up / (nregister - count_average_up) ).toFixed(1) + 'GB'; } else { nCells[1].innerHTML =0; }
                      if (monto_average_down != 0) { nCells[2].innerHTML = parseFloat( monto_average_down / (nregister - count_average_down) ).toFixed(1) + 'GB'; } else { nCells[2].innerHTML =0; }
                    }
                    else {
                      nCells[1].innerHTML = 0;
                      nCells[2].innerHTML = 0;
                    }
    }
};


var Configuration_table_responsive= {
  dom: "<'row'<'col-sm-4'B><'col-sm-4'l><'col-sm-4'f>>" +
          "<'row'<'col-sm-12'tr>>" +
          "<'row'<'col-sm-5'i><'col-sm-7'p>>",
    buttons: [
      {
        extend: 'excelHtml5',
        text: '<i class="fa fa-file-excel-o"></i> Extraer a Excel',
        titleAttr: 'Excel',
        className: 'btn btn-info custombtntable',
      },
      {
        extend: 'csvHtml5',
        text: '<i class="fa fa-file-text-o"></i> Extraer a CSV',
        titleAttr: 'CSV',
        className: 'btn btn-danger',
      }
  ],
  "processing": true,

  language:{
    "sProcessing":     "Procesando...",
    "sLengthMenu":     "Mostrar _MENU_ registros",
    "sZeroRecords":    "No se encontraron resultados",
    "sEmptyTable":     "Ningún dato disponible",
    "sInfo":           "Mostrando registros del _START_ al _END_ de un total de _TOTAL_ registros",
    "sInfoEmpty":      "Mostrando registros del 0 al 0 de un total de 0 registros",
    "sInfoFiltered":   "(filtrado de un total de _MAX_ registros)",
    "sInfoPostFix":    "",
    "sSearch":         "<i class='fa fa-search'></i> Buscar:",
    "sUrl":            "",
    "sInfoThousands":  ",",
    "sLoadingRecords": "Cargando...",
    "oPaginate": {
      "sFirst":    "Primero",
      "sLast":     "Último",
      "sNext":     "Siguiente",
      "sPrevious": "Anterior"
    },
    "oAria": {
      "sSortAscending":  ": Activar para ordenar la columna de manera ascendente",
      "sSortDescending": ": Activar para ordenar la columna de manera descendente"
    }
  }
};


var Configuration_table_responsive_two= {
  dom: "<'row'<'col-sm-5'B><'col-sm-3'l><'col-sm-4'f>>" +
          "<'row'<'col-sm-12'tr>>" +
          "<'row'<'col-sm-5'i><'col-sm-7'p>>",
    buttons: [
      {
        text: '<i class="fa fa-user-plus margin-r5"></i> Crear Usuario',
        titleAttr: 'Crear Usuario',
        className: 'btn btn-success creatadduser',
        action: function ( e, dt, node, config ) {
          $('#modal-CreatUser').modal('show');
          if (document.getElementById("creatusersystem")) {
            $('#creatusersystem')[0].reset();
          }
        }
      },
      {
        extend: 'excelHtml5',
        text: '<i class="fa fa-file-excel-o margin-r5"></i> Extraer a Excel',
        titleAttr: 'Excel',
        className: 'btn btn-info custombtntable',
      },
      {
        extend: 'csvHtml5',
        text: '<i class="fa fa-file-text-o margin-r5"></i> Extraer a CSV',
        titleAttr: 'CSV',
        className: 'btn btn-danger',
      }
  ],
  "processing": true,
  language:{
    "sProcessing":     "Procesando...",
    "sLengthMenu":     "Mostrar _MENU_ registros",
    "sZeroRecords":    "No se encontraron resultados",
    "sEmptyTable":     "Ningún dato disponible",
    "sInfo":           "Mostrando registros del _START_ al _END_ de un total de _TOTAL_ registros",
    "sInfoEmpty":      "Mostrando registros del 0 al 0 de un total de 0 registros",
    "sInfoFiltered":   "(filtrado de un total de _MAX_ registros)",
    "sInfoPostFix":    "",
    "sSearch":         "<i class='fa fa-search'></i> Buscar:",
    "sUrl":            "",
    "sInfoThousands":  ",",
    "sLoadingRecords": "Cargando...",
    "oPaginate": {
      "sFirst":    "Primero",
      "sLast":     "Último",
      "sNext":     "Siguiente",
      "sPrevious": "Anterior"
    },
    "oAria": {
      "sSortAscending":  ": Activar para ordenar la columna de manera ascendente",
      "sSortDescending": ": Activar para ordenar la columna de manera descendente"
    }
  }
};
