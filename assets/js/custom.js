var resizefunc = [];
function number(objek) {
	a = objek.value;
	b = a.replace(/[^\d]/g,"");
	c = "";
	panjang = b.length;
	j = 0;
	for (i = panjang; i > 0; i--) {
		j = j + 1;
		if (((j % 3) == 1) && (j != 1)) {
			c = b.substr(i-1,1) + c;
		} else {
			c = b.substr(i-1,1) + c;
		}
	}
	objek.value = c;
}

function $_GET(param) {
	var vars = {};
	window.location.href.replace( 
		/[?&]+([^=&]+)=?([^&]*)?/gi, // regexp
		function( m, key, value ) { // callback
			vars[key] = value !== undefined ? value : '';
		}
		);

	if ( param ) {
		return vars[param] ? vars[param] : null;	
	}
	return vars;
}


function checkModule(){
	if ($_GET('module') == null) {
		alert('Silahkan pilih modul terlebih dahulu');
	};
}

$(document).ready(function() {

	// $(document.body).on('hidden.bs.modal', function () {
	// 	$('#modal-data_').removeData('bs.modal')
	// });
if(location.hash) {
	$('a[href=' + location.hash + ']').tab('show');
}
$(document.body).on("click", "a[data-toggle]", function(event) {
	location.hash = this.getAttribute("href");
	$.ajax({
		type: "POST",
		url: "http://127.0.0.1/cms/setting/menu",
		data: { value: dummy }
	}).done(function( msg ) {
		alert( "Data Saved: " + msg );
	});
});
$(window).on('popstate', function() {
	var anchor = location.hash || $("a[data-toggle=tab]").first().attr("href");
	$('a[href=' + anchor + ']').tab('show');
});


$('#gallery').mixItUp();

$.validate({
	modules : 'file',
});

$(".search-select").select2({
	placeholder : 'Pilih Data...',
	minimumResultsForSearch: 10,
	allowClear: true,
});
$('.wysihtml5').wysihtml5();

$('#datatable').dataTable();

$('.tip-bottom').tooltip({
	container: 'body',
	placement: 'bottom'
});
$('.tip-top').tooltip({
	container: 'body',
	placement: 'top'
});
$('.tip-right').tooltip({
	container: 'body',
	placement: 'right'
});
$('.tip-left').tooltip({
	container: 'body',
	placement: 'left'
});




$('.icp-auto').iconpicker({
	defaultValue: false
});

$('.icp').on('iconpickerSelected', function(e) {
	$('.lead .picker-target').get(0).className = 'picker-target fa-3x ' +
	e.iconpickerInstance.options.iconBaseClass + ' ' +
	e.iconpickerInstance.getValue(e.iconpickerValue);
});

$('div.iconpicker-items').click(function() {
	$('.iconPicker').val($('div.iconpicker-selected').attr('title').substring(1));
});

$('#chkAll').click(function (e) {

	if ($(this).is(':checked')) {
		$(this).parents('tr').addClass('selected');

		$('#datatable tbody input[type=checkbox]').addClass('checked');

	} else {
		$(this).parents('tr').removeClass('selected');
		$('#datatable tbody input[type=checkbox]').removeClass('checked');
	}
	$('#datatable tbody input[type=checkbox]').prop("checked", this.checked);

});

var i=1;
$("#add_row_menu").click(function(){
	$('#addr'+i).html("<td class='text-center'>"+ (i+1) +"</td><input type='hidden' name='idPAttributeDetail[]' value=''><td><input name='namePAttributeDetail[]' type='text' class='form-control input-md' style='color:#000;' placeholder='Isi Atribut'/></td>");

	$('#tab_logic').append('<tr id="addr'+(i+1)+'"></tr>');
	i++; 
});
$("#delete_row_menu").click(function(){
	if(i>1){
		$("#addr"+(i-1)).html('');
		i--;
	}
});   



});