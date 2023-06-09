$(document).ready(function () {
    var max_fields = 5; 
    var wrapper = $("#append-area"); 
    var add_button = $(".add_field_button"); 

    var x = 1; 
    $(add_button).click(function (e) { 
        e.preventDefault();
            $(wrapper).append($('#append-item').html());
             //add input box
    }); 

    
    $(wrapper).on("click", ".bi-x-circle-fill", function (e) { //user click on remove text
        $(this).parent('div').remove();
    })
});

var newName = "nontek";
for (var i = 1; i <= 5; i++) {
  var newInputName = newName + i;
  var newInput = $("<input type='text' />").attr("name", newInputName);
  $("#nonTeknis").append(newInput);
  console.log(newInputName);
}



