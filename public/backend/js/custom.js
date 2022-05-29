$(document).ready(function () {
    $.ajaxSetup({
        headers: {
            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
        }
    });

    $('#category-dropdown').on('change', function() {
        var category_id = this.value;
        $.ajax({
            url:"get-product-sub-category",
            type: "POST",
            data: {
                category_id: category_id,
            },
            dataType : 'json',
            success: function(result){
                $('#sub_category-dropdown').html('');
                if (result.status == '200') {
                    $.each(result.data, function(key, value){
                        $("#sub_category-dropdown").append('<option value="'+value.id+'">'+value.sub_category_name+'</option>');
                    });
                }else{
                    $("#sub_category-dropdown").append('<option value="">Not Found</option>');
                }

            }
        });
    });
});
