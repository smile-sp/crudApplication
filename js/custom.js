
$(document).ready(function(){
	$("#search").click(function() {

		
		var  searchFor=$( "select.searchFor" ).val();
		var  searchTo=$( "select.searchTo" ).val();
		var  searchText=$( ".txtsearch" ).val();
		if(searchFor==""){
			alert("please select Search For");
			return false;
		}
		if(searchTo==""){
			alert("Please select Search To Criteria");
			return false;
		}
		if(txtsearch==""){
			alert("Please enter text to Search");
			return false;	
		}

		//searchTo=searchFor+searchTo;
	    $.ajax({
	        type: "POST",
	        data: "searchFor="+searchFor+"&searchTo="+searchTo+"&searchText="+searchText+"",
	        url: "Search/searchdata",
	        success: function(data) {
	        	//console.log(data);
	            $("#search-list").html(data);
	        }
	    });
	});
});
