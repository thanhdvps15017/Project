function delete_user(id) {
    var popup = jQuery("#modal-delete-user");
    popup.find("input[name=user_id]").val(id);
}
