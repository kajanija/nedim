<script type="text/javascript">
$(function() {
$("#newNote").submit(function() {

var url = "images.php"; // the script where you handle the form input.
var noteUrl = $('#noteUrl).val();
$.ajax({
       type: "POST",
       url: url,
       data: {noteUrl: noteUrl},
       success: function(data)
       {
           alert(data); // show response from the php script.
       }
     });

return false; // avoid to execute the actual submit of the form.
});
});
</script>


<form id="newNote">
<input type="text" class="form-control" id="noteUrl">
<input type="button" class="btn btn-default" id="addNote" data-toggle="modal" data-target="#noteModal" value="Add Note"/>