/* 
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */


$(document).ready(function () {
    $('.btn-authenticate').click(async function () {
        var search = $('.fieldInputSearch').val();
        if (!search || 'undefined' === typeof (search) || search === '') {
            return false;
        }
        var url = window.siteurl + `authenticate/search`;
        var data = new FormData();
        data.append('search', search);
        $('#div_result').html('');
        $('#div_loader').removeClass('hide');
        var html = await getHTML({url, data});
        $('#div_result').html(html);
        $('#div_loader').addClass('hide');
    });
});