$(document).ready(inicio);
function inicio() {
	$("select#tipo2").one("change", function(){
		if($(this).val() == 'Candy Shop'){
			$("div#tipo").after("<div class='form-group'><label for='prueba'>Prueba</label><input type='text' class='form-control' name='prueba' id='prueba' placeholder='Es una prueba'></div>");
		}
	});  	
}