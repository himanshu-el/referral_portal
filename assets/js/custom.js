$(document).ready(function(){
  $(".sidebar-part .close-btn").click(function(){	
  	$("body").toggleClass("sidepart-show")
  })

  var t = $('#example').DataTable();
  var counter = 1;

  $('#addRow').on('click', function () {
      t.row.add([counter + '.1', counter + '.2', counter + '.3', counter + '.4', counter + '.5']).draw(false);

      counter++;
  });

  // Automatically add a first row of data
  $('#addRow').click();


});
