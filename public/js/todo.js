$(function () {
    $(this).on("click", ".editItem", function(event){
        var text = $(this).attr('data-text');
        var id   = $(this).attr('data-id')
        var text = $.trim(text);

        $("#addItem").val(text);
        $("#title").text("Edit Item");
        $("#saveItem").show();
        $("#addButton").hide();
        $("#id").val(id);
    });

    $(this).on("click", "#addNew", function(event){
        $("#addItem").val("");
        $("#title").text("Add New Item");
        $("#saveItem").hide();
        $("#addButton").show();
    });

    $(this).on("click", "#addButton", function(event){
        var text = $("#addItem").val();
        if(text == ""){
            alert("Please Write anything for Item");
        }else{
            $.post('list', {'text' : text, '_token':$('input[name=_token]').val()} , function(data){
                $("#allItems").load(location.href + " #allItems");
            });
        }
    });

    $(this).on("click", "#saveItem", function(event){
        var id = $("#id").val();
        var title = $("#addItem").val();
        $.post('update', {'id' : id, 'title' : title, '_token':$('input[name=_token]').val()} , function(data){
            $("#allItems").load(location.href + " #allItems");
        });
    });

    $(this).on("click", ".checkItem", function(event){
        var id = $(this).attr('data-id');
        var status = 1;
        $.post('update', {'id' : id, 'status' : status, '_token':$('input[name=_token]').val()} , function(data){
            $("#allItems").load(location.href + " #allItems");
        });
    });

    $(this).on("click", ".removeItem", function(event){
        var id = $(this).attr('data-id');
        $.post('delete', {'id' : id, '_token':$('input[name=_token]').val()} , function(data){
            $("#allItems").load(location.href + " #allItems");
        });
    });

});