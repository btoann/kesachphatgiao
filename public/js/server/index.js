
$(document).ready(function () {

    /**
     *      Thay đổi hiển thị trên thanh header navbar
     */
    var active_item = $('#tlbh-header-navbar').find('li.nav-item');
    active_item.removeClass('active');
    var items = $('#tlbh-header-navbar').find('li');
    items.each(function () {
        if ($(this).attr('data-active') == 'account') {
            $(this).addClass('active');
        }
    });

    /**
     *      Button: Chọn tất cả
     */
    var checkboxs = $('input[type = checkbox]'),
        select_all = $('#select_all');
    select_all.click(function (e) {
        if (checkboxs.is(':checked')) {
            checkboxs.prop('checked', false);
        }
        else {
            checkboxs.prop('checked', true);
        }
        selectAll_txt();
    });

    /**
     *      Toggle checkbox khi ấn vào chỗ bất kỳ trên record
     */
    var table_record = $('.tlbh-article-table-record');
    table_record.click(function (e) {
        if (!$(e.target).is('input[type = checkbox]') || !$(e.target).is('sub > a')) {
            var record_cb = $(this).find('input[type = checkbox]');
            if (record_cb.is(':checked')) {
                record_cb.prop('checked', false);
            }
            else {
                record_cb.prop('checked', true);
            }
        }
        else {
            if (checkboxs.is(':checked').length <= 0) {
                console.log(checkboxs.is(':checked').length);
            }
        }
        selectAll_txt();
    });

    /**
     *      Thay đổi text của Button: Chọn tất cả
     */
    function selectAll_txt() {
        if (checkboxs.filter(':checked').length > 0) {
            select_all.text('Bỏ chọn tất cả');
        }
        else {
            select_all.text('Chọn tất cả');
        }
    }

});