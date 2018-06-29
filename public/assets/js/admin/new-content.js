$("document").ready(function() {
    jQuery('.datepicker-autoclose').datepicker({
        autoclose: true,
        todayHighlight: true,
        format: "yyyy-mm-dd"
    });
    
    var toolbarOptions = [
	  ['bold', 'italic', 'underline', 'strike'],        // toggled buttons
	  ['blockquote', 'code-block'],
	  [{ 'list': 'ordered'}, { 'list': 'bullet' }],
	  [{ 'header': [1, 2, 3, 4, 5, 6, false] }],
	  [{ 'color': [] }, { 'background': [] }],          // dropdown with defaults from theme
	  [{ 'font': [] }],
	  [{ 'align': [] }],
	  ['clean']                                         // remove formatting button
	];
    var quill = new Quill('#content', {
    	modules: {
		    toolbar: toolbarOptions
		},
        theme: 'snow'
    });

    var form = document.querySelector('#frm-new-content');
	form.onsubmit = function() {
	  	var about = document.querySelector('input[name=contents]');
	  	about.value = $('.ql-editor').html();
  	}

    $("#pdf-attachment").change(function(){
		var filenames = "<div class='bg-success text-white' style='margin:5px 0;padding:5px;'><labe>FILES : </label><ul style='margin:5px;'>";
		for (var i = 0; i < this.files.length; ++i) {
		  var name = this.files.item(i).name;
		  filenames += `<li>${name}</li>`
		}
		filenames += "</ul></div>";

		$('.div-list').html(filenames);
	});
});