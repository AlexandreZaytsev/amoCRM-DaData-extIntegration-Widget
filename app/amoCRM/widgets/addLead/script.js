// Замените на свой API-ключ
let token = '65eb861590ccxxxxf4a395f5314ebfd0aaa4b222'; 
var util = UIkit.util; 
console.log(token);
function join(arr /*, separator */) {
  var separator = arguments.length > 1 ? arguments[1] : ", ";
  return arr.filter(function(n){return n}).join(separator);
}

function typeDescription(type) {
  var TYPES = {
    'INDIVIDUAL': 'Индивидуальный предприниматель',
    'LEGAL': 'Организация'
  }
  return TYPES[type];
}			

function showSuggestion(suggestion) {
//  console.log(suggestion);
//console.log(typeof suggestion);
console.log(suggestion);

  var data = suggestion.data;
//  console.log(data);
  
  if (!data)
    return;
  $("#type").text(
    typeDescription(data.type) + " (" + data.type + ")"
  );

  if (data.name) {
    $("#name_short").val(data.name.short_with_opf || "");
    $("#name_full").val(data.name.full_with_opf || "");
  }
  //  alert (data.type);
  if (data.type === 'LEGAL') { // юридическое лицо
    if (data.management !== null)
	{
    $('#manager').val(data.management.name);
	}
  }
  if (suggestion.data.type === 'INDIVIDUAL') { // индивидуальный предриниметель
    $('#manager').val(data.name.full);
  }  
    
  if (data.inn){$("#inn").val(data.inn);}	
  if (data.ogrn){$("#ogrn").val(data.ogrn);}	
  
  
  if (data.address) {
    var address = "";
    if (data.address.data.qc == "0") {
      address = join([data.address.data.postal_code, data.address.value]);
    } else {
      address = data.address.data.source;
    }
    $("#address").val(address);
  }
}

/*----------------------------------------------------------------------------------------------------*/		

//$(document).ready(function() {
	util.ready(function () {
//UIkit.notify("<i class='uk-icon-check'></i> Message with an icon...");

	//запрос через плагин
	$("#party_plugin").suggestions({
//	util.$("#party_plugin").suggestions({	

  			token: token,
  			type: "PARTY",
  			count: 5,
  			onSelect: showSuggestion // Вызывается, когда пользователь выбирает одну из подсказок
	});
		
	//запрос через api
	$("#party_api").bind('input', function(){
//					headers: {"Content-Type":"application/x-www-form-urlencoded; charset=UTF-8"},
//					headers: {'Content-Type":application/json, text/plain, */*'},
		
		payload = JSON.stringify({
						dtype: "party",
						dvalue: $('#party_api').val()
					});
       

		util.ajax("../../dadata/dadata.php", 
				{

					method: "POST", 
					responseType: 'json',
					data: payload,
				 }).then(function(xhr) {
					if(xhr.response.suggestions.length > 0){
  			  			showSuggestion(xhr.response.suggestions[0])
  			  		}
//					console.log(xhr.response);
				});

/*
		$.ajax({
			method: "POST",
			url: "../../dadata/dadata.php", 
			data: payload,
			success: function (data){ 
				if(data.suggestions.length > 0){
  			  showSuggestion(data.suggestions[0])
  			  }
	        },
             error: function (data) {
             console.log('An error occurred.');
             console.log(data);
            },
	    });
		
*/


	    
	});

});
