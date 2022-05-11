Circles.create({
    id:'circles-1',
    radius:45,
    value:60,
    maxValue:100,
    width:7,
    text: 90,
    colors:['#f1f1f1', '#ff9e27'],
    duration:400,
    wrpClass:'circles-wrp',
    textClass:'circles-text',
    styleWrapper:true,
    styleText:true
})

Circles.create({
    id:'circles-2',
    radius:45,
    value:70,
    maxValue:100,
    width:7,
    text: 36,
    colors:['#f1f1f1', '#2bb930'],
    duration:400,
    wrpClass:'circles-wrp',
    textClass:'circles-text',
    styleWrapper:true,
    styleText:true
})

Circles.create({
    id:'circles-3',
    radius:45,
    value:40,
    maxValue:100,
    width:7,
    text: 12,
    colors:['#f1f1f1', '#f25961'],
    duration:400,
    wrpClass:'circles-wrp',
    textClass:'circles-text',
    styleWrapper:true,
    styleText:true
})

/* var xmlhttp = new XMLHttpRequest();
var url = "http://localhost/dashboardSigt/jsonData.json";
xmlhttp.open("GET",url,true);
xmlhttp.send();
xmlhttp.onreadystatechange = function(){
    if(this.readyState == 4 && this.status == 200){
        var data = JSON.parse(this.responseText)
        console.log(data.data)
        var tipoProducto = data.data.map(function(elem){
            return elem.tipoProducto;
        });
        console.log(tipoProducto)
        var numProductos = data.data.map(function(elem){
            return elem.numProductos;
        });
        console.log(numProductos)
    }
 */
    $("custom-tabs-four-home-tab").ready(function () {
       $('#fecha').datepicker({
        changeMonth: true,
        changeYear: true
      })
      prodDiario();
      });
      
      
    $("#custom-tabs-four-profile-tab").click(function () {
      
      var dateFormat = "mm/dd/yy",
      from = $( "#from" )
        .datepicker({
          defaultDate: "+1w",
          changeMonth: true,
          changeYear: true,
          numberOfMonths: 1
        })
        .on( "change", function() {
          to.datepicker( "option", "minDate", getDate( this ) );
        }),
      to = $( "#to" ).datepicker({
        defaultDate: "+1w",
        changeMonth: true,
        changeYear: true,
        numberOfMonths: 1
      })
      .on( "change", function() {
        from.datepicker( "option", "maxDate", getDate( this ) );
      });
 
    function getDate( element ) {
      var date;
      try {
        date = $.datepicker.parseDate( dateFormat, element.value );
      } catch( error ) {
        date = null;
      }
 
      return date;

    } 


    prodCentral();

    });


    $("#custom-tabs-four-messages-tab").click(function(){

        prodCentralM();
    });

function showChart(){
    document.getElementById('contenedor').style.display = 'block';
    
};

function prodCentral(){
    Highcharts.chart('contenedor',{
        chart:{
            type:'line' //graficar ineas
        },
        title:{
            text:'Productos por Central'
        },
        xAxis:{
            allowDecimals:false,
            categories: ['23-marzo', '24-marzo', '25-marzo', '26-marzo', '27-marzo', '28-marzo', '29-marzo', '30-marzo', '31-marzo']
              
        },
        
        yAxis:{
            title:{
            text:'Total Productos'
            }
        },
        legend:{
            layout:'vertical',
            align: 'right', //Ubicacion de los nombres de las series
            verticalAlign:'middle'
        },
    
    
        series:[{
            name:'LB',
            data:[13060,13051,13037,13033,13034,13035,13030]
        },{
            name:'BA',
            data:[4519,4513,4512,4506,4505,4507,4504]
        },{
            name:'IPTV',
            data:[412,413,413,413,413,413,413]

        }],

     })
}

function prodCentralM(){
    Highcharts.chart('contenedor', {
        chart: {
          type: 'column'
        },
        title: {
          text: 'Total Productos'
        },
        subtitle: {
          text: 'Valor Mensual'
        },
        xAxis: {
          categories: [
            'Enero',
            'Febrero',
            'Marzo',
            'Abril',
            'Mayo',
            'Junio',
            'Julio',
            'Agosto',
            'Septiembre',
            'Octubre',
            'Noviembre',
            'Diciembre'
          ],
          crosshair: true
        },
        yAxis: {
          min: 0,
          title: {
            text: 'Total Productos'
          }
        },
        tooltip: {
          headerFormat: '<span style="font-size:10px">{point.key}</span><table>',
          pointFormat: '<tr><td style="color:{series.color};padding:0">{series.name}: </td>' +
            '<td style="padding:0"><b>{point.y:1f}</b></td></tr>',
          footerFormat: '</table>',
          shared: true,
          useHTML: true
        },
        plotOptions: {
          column: {
            pointPadding: 0.2,
            borderWidth: 0
          }
        },
        series: [{
          name: 'LB',
          data: [13223,13153,12360]
      
        }, {
          name: 'BA',
          data: [4628,4578,4251]
      
        }, {
          name: 'IPTV',
          data: [410,407,375]
      
        }]
      });
}

function prodDiario() {
  Highcharts.chart('contenedor', {
    chart:{
        type:'column'
    },
    title: {
      text: 'Total Productos'
    },
    xAxis: {
        categories:['LB','BA','IPTV']
    },
    series:[{
        data: [
        {
            name:'LB',
            color:'#29CAF9',
            y:5
        },
        {
            name:'BA',
            color:'#FA0A0A',
            y:3
        },
        {
            name:'IPTV',
            color:'#1AC60C',
            y:10
        }]

    }]

})

}
    
/* var sm = '<soapenv:Envelope xmlns:xsi="http://www.w3.org/2001/XMLSchema-instance" xmlns:xsd="http://www.w3.org/2001/XMLSchema" xmlns:soapenv="http://schemas.xmlsoap.org/soap/envelope/" xmlns:urn="urn:Sapewsdl">' +
'<soapenv:Header/>' +
'<soapenv:Body>' +
   '<urn:getListarProductos soapenv:encodingStyle="http://schemas.xmlsoap.org/soap/encoding/">' +
    '<parameters xsi:type="xsd:string">'+ {
 "password": "SIGT_SM",
 "command": "ProductosTotal",
 "fecha": "2022-04-06"
 
} + '</parameters>' +
   '</urn:getListarProductos>' +
'</soapenv:Body>' +
'</soapenv:Envelope>';

    let xhr = new XMLHttpRequest()

    xhr.open('GET','http://10.29.98.205/wsserver_sm.php?wsdl')

    xhr.addEventListener('load',(data) => {
        console.log(data.target.response);

    })

    xhr.send(); */



/* 
     result = arrayProduct.forEach(element => {
        console.log(element)
    })    */

    /* for(let item of arrayProduct){
        console.log(item);
    }
     */
    
   async function getData() {
    var xmlText = '{"type":"info","data":[{"tipoProducto":"LB","total":"238962","fecha":"2022-04-04"},{"tipoProducto":"BA","total":"87857","fecha":"2022-04-04"},{"tipoProducto":"IPTV","total":"17464","fecha":"2022-04-04"}]}'
      const datapoints = JSON.parse(xmlText); 

      return datapoints;
   
       let arrayProduct = data.data
  
      console.log(arrayProduct) 

   };
   
  getData().then(datapoints => {
      const tProduct = datapoints.data.map(
          function(index){
              return  index.tipoProducto;
          })
  
      const nProduct = datapoints.data.map(
          function(index){
              return  index.total;
          }) 
          console.log (tProduct);
          console.log (nProduct);

          var prod = [238962,87857,17464]

  
          $(function () {
            $('#productoTotal').highcharts({
                chart:{
                    type:'column',
                },
                title:{
                    text: 'Total de Productos'
                },
                xAxis: {
                    categories:tProduct
                    
                },
                yAxis:{
                    title:{
                        text: ' Cantidad'
                    }
                },
                subtitle: {
                    text: 'Servicios'
                },
                series: [{
                  name: 'Productos',
                  colorByPoint:true,
                  colors: [
                    '#ff9e27',
                    '#2bb930',
                    '#f25961'
                ],
                  data: (function(){
                    var data = [];
                    for(var i=0; i < prod.length; i++)
                    {
                        data.push([prod[i]]);
                    }
                    return data;

                  }) ()

                }]
                   
            });
    
        })

    })


  
    
          
    