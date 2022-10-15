let util =UIkit.util;
const link = '/api/v4/';
let inGet = util.$('#selGET'); 
let outGet = util.$('#outGet'); 
let preloader =util.$('#preloader');

//разложить массив в виде дерева рекурсивно
function tree(obj, $tab = "", $result = "") {
  for (var k in obj) {
    if (obj[k] instanceof Object) {
      $result += $tab + "[" + k + "] <i style='color:red;'>(array)</i><br>";
      $result += tree(obj[k], $tab + "&nbsp;".repeat(4));
    } else {
      $result += $tab + "[" + k + "] => <b>" + obj[k] + "</b><br>";
    }
  }
  return $result;
}

//callback для всей структуры
function showResult(data) {
	outGet.innerHTML = tree(JSON.parse(data));
}

//post
function getPostData(url, payload, callback ){
//	outGet.innerHTML="<div uk-spinner></div><span>...ждите</span>";
	util.removeAttr(preloader, 'hidden');
	UIkit.notification(payload,{pos: 'top-right', status: 'primary'});
	
	util.ajax(url,{
			method: "POST", 
			responseType: 'json',
			data: JSON.stringify({link: payload}),
			}).then(function(data){
            	util.attr(preloader, 'hidden',''); 
//				util.removeClass(outGet, "uk-icon uk-spinner");
//				console.log(data);
				if (!data.response){    
					UIkit.notification('нет данных, выберите другой запрос...',{pos: 'top-right',status: 'danger'});
					outGet.innerHTML='';
				}
				else{
			 	callback(data.response);
			}
			}).catch(function(error) {
				UIkit.notification(error,{pos: 'top-right'});
			});
};	

//после загрузки документа
util.ready(function () {
	util.on(inGet, 'change', function(event){
		let payload = link + inGet.value;
	//	UIkit.notification(payload,{pos: 'top-right'});		payload = JSON.stringify({link: payload});
		getPostData("../../amo/geInfo.php", payload, showResult);
	});

});