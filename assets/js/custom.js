
$(document).ready(function () {
    $('select').material_select();
    $("#addSize").click(function () {
        data = ' <div class="row">';
        data += '<div class="col m6 s6">';
        data += '<div class="input-field ">';
        data += '<input id="size" type="number" name="size[]" class="validate">';
        data += '<label for="size">Enter Size</label>';
        data += '</div>';
        data += '</div>';
        data += '<div class="col m6 s6">';
        data += '<div class="input-field ">';
        data += '<input id="stock" type="number" name="stock[]" class="validate">';
        data += '<label for="stock">Quantity</label>';
        data += '</div>';
        data += '</div>';
        data += '</div>';
        $("#newSizes").append(data);
    });
});

function increaseValue() {
    var value = parseInt(document.getElementById('number').value, 10);
    value = isNaN(value) ? 0 : value;
    value++;
    document.getElementById('number').value = value;
  }
  
  function decreaseValue() {
    var value = parseInt(document.getElementById('number').value, 10);
    value = isNaN(value) ? 0 : value;
    value < 1 ? value = 1 : '';
    value--;
    document.getElementById('number').value = value;
  }

  $(document).ready(function(){
    // the "href" attribute of the modal trigger must specify the modal ID that wants to be triggered
    $('#modal1').modal();
  });