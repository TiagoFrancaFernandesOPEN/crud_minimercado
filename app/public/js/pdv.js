// var tempData = '{"id":1, "cod":1002,"nome":"Nome do Produto","preco":2.00}';
// json = JSON.parse(tempData);



var datajson;

$(function () {
  // var json = {
  //   "people": {
  //     "person": [{
  //       "name": "Peter",
  //       "age": 43,
  //       "code": 143,
  //       "sex": "male"
  //     },
  //     {
  //       "name": "Zara",
  //       "age": 65,
  //       "code": 165,
  //       "sex": "female"
  //     }]
  //   }
  // };
  


    jQuery('#itemSearch').keypress(function (event) {
      var keycode = (event.keyCode ? event.keyCode : event.which);
      if (keycode == '13') {
          var api = "//local.projetostestes/testesc/app/public/api/json.json";
          $.getJSON(api, function (data) {
            datajson = data;

                $.each(datajson.people.person, function (i, v) {
                  if (v.code == jQuery('#itemSearch').val()) {
                    console.log(v.name);
                    jQuery('#produtoInput_nome_big').html(v.name);
                    return;
                  }
                });
          });//.getjson
      }
      event.stopPropagation();
    });
    
  
  

});