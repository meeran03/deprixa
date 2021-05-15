$(document).ready(function() {
var dataTable = $('#table_users').DataTable( {
            "processing": true,
            "serverSide": true,
            "pageResize": true,
            "responsive": true,
                "aoColumnDefs": [
              { "bVisible": false, "aTargets": [ 9 ] },{ "bVisible": false, "aTargets": [ 8 ] },{ "bVisible": false, "aTargets": [ 7 ] },{"orderable": false,"searchable": false, "aTargets":[11]}
            ],
            "language": {
                "processing": "<img src='"+siteurl+"assets/images/ajax-loader.gif'/>" //add a loading image,simply putting <img src="loader.gif" /> tag.
            },
            "ajax":{
                url : siteurl + "get_users.php", // json datasource
                type: "post",  // method  , by default get
                error: function(msg){  // error handling
                    $(".table_users-error").html("");
                    $("#table_users").append('<tbody class="table_users-error"><tr><th colspan="3">No data found in the server</th></tr></tbody>');
                    $("#table_users_processing").css("display","none");
                },
                 "lengthMenu": [[10, 25, 50, -1], [10, 25, 50, "All"]]
            }
        } ); 
var colvis = new $.fn.dataTable.ColVis( dataTable, {
        buttonText: 'Show/Hide Columns<img src="'+siteurl+'/assets/images/down.gif">',
        activate: 'mouseover',
        exclude: [ 0 ]
    } );
    $( colvis.button() ).insertAfter('.dataTables_length');
    
 
} );