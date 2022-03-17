
var count = 1;
function add()
{
  count+=1
  html = '<div class="con" id="con'+count+'">\
      				<ul>\
      					<li id="sub1'+count+'"><input type="text" name="mainsub'+count+'"></li><br>\
      				</ul>\
      			</div>'

            var form= document.getElementById('gradesheet')
            form.innerHTML+=html
}





var counter = 1;
function add_more()
{
	counter+=1
	html1 = '<div class="container" id="container">\
	<center>\
      		<form include="" method="post" id="gradesheet" name="div">\
      			<!--Item input box-->\
      				<input type="text" name="subitem" id="subitem" value="">\
      				   <br>\
      		</form>\
      		<button class="btn btn-primary" onclick="add()"><i class="fas fa-plus"></i></button>\
      	    <button class="btn btn-secondary" onclick="remove()"><i class="fas fa-minus"></i></button><br>\
      	    <button class="btn btn-success" type="submit" name="save">Save</button><br>\
      	</center>\
      	</div>'

      	var form1 = document.getElementById('container')
      	form1.innerHTML+=html1
}

// $(document).ready(function){
// 	var max_fields = 10;
// 	var wrapper = $("#gradesheet");
// 	var add_button = $(".btn btn-primary");

// 	var x =1

// 	$(add_button).click(function(e){
// 		e.preventDefault();
// 		if(x < max_fields)
// 		{
// 			$(wrapper).append('<div><input type="text" name="mainsub"/><a href="#" class="remove_field">Remove</a></div>');
// 			x++;
// 		}
// 	});

// 	$(wrapper).on("click","remove_field", function(e){
// 		e.preventDefault();
// 		$(this).parent('div').remove();
// 		x--;
// 	});
// }
