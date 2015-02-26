$('#subcategory, #subcategory_label').hide();
$('#category').change(function(){
    var category_id = $('#category').val();
    if (category_id != ""){
        var post_url = "/market/get_subcategories/" + category_id;
        $.ajax({
            type: "POST",
             url: post_url,
             success: function(subcategories) //we're calling the response json array 'subcategories'
              {
                $('#subcategory').empty();
                $('#subcategory, #subcategory_label').show();
                   $.each(subcategories,function(subcategory_id,subcategory) 
                   {
                    var opt = $('<option />'); // here we're creating a new select option for each group
                      opt.val(subcategory_id);
                      opt.text(subcategory);
                      $('#subcategory').append(opt); 
                });
               } //end success
         }); //end AJAX
    } else {
        $('#subcategory').empty();
        $('#subcategory, #subcategory_label').hide();
    }//end if
}); //end change 