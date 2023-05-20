function delete_product_comment(id) {
    var popup = jQuery("#modal-delete-product-comment");
    popup.find("input[name=product-comment-id]").val(id);
}
