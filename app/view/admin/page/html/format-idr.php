
$.each($('.format-idr'), function(k, v){
  let id = $(v).attr('id');
  $('#'+id).off('blur');
  $("<input />")
    .attr("id", id+'__output')
    .attr("name", $(v).attr('name'))
    .attr("type", 'hidden')
    .attr("value", '0')
    .insertAfter('#'+id);
  $('#'+id).removeAttr('name');
  $('#'+id).on('blur', function(e){
    e.preventDefault();
    let value = $(this).val();
    let value_number = value.replace( /^\D+/g, '').split('.').join("");
    $('#'+id+'__output').val(value_number);
  });
  $('#'+id).priceFormat({
  	prefix: 'Rp',
  	centsSeparator: ',',
  	thousandsSeparator: '.',
  	centsLimit: 0
  });
});
