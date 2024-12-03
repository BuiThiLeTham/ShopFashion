$.ajaxSetup({
    headers: {
        'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
    }
});

// function removeRow(id, url) {
//     if (confirm('Xóa mà không thể khôi phục. Bạn có chắc ?')) {
//         $.ajax({
//             type: 'DELETE',
//             datatype: 'JSON',
//             data: { id },
//             url: url,
//             success: function (result) {
//                 if (result.error === false) {
//                     alert(result.message);
//                     location.reload();
//                 } else {
//                     alert('Xóa lỗi vui lòng thử lại');
//                 }
//             }
//         })
//     }
// }
function removeRow(id, url) {
    if (confirm('Bạn có chắc chắn muốn xóa người dùng này?')) {
        fetch(url + '/' + id, {
            method: 'DELETE',
            headers: {
                'X-CSRF-TOKEN': '{{ csrf_token() }}',
                'Content-Type': 'application/json'
            }
        })
        .then(response => {
            if (response.ok) {
                return response.json();
            }
            throw new Error('Không thể xóa người dùng');
        })
        .then(data => {
            alert(data.message);
            location.reload(); // Tải lại trang để cập nhật danh sách người dùng
        })
        .catch(error => {
            alert(error.message);
        });
    }
}

function removeRow(id) {
    if (confirm('Bạn có chắc muốn xóa người dùng này?')) {
        $.ajax({
            url: '/admin/user01/destroy/' + id,
            type: 'DELETE',
            success: function(response) {
                alert(response.message); // Hiển thị thông báo thành công
                location.reload(); // Làm mới trang sau khi xóa thành công
            },
            error: function(response) {
                alert('Không thể xóa người dùng.');
            }
        });
    }
}

/*Upload File */
$('#upload').change(function () {
    const form = new FormData();
    form.append('file', $(this)[0].files[0]);

    $.ajax({
        processData: false,
        contentType: false,
        type: 'POST',
        dataType: 'JSON',
        data: form,
        url: '/admin/upload/services',
        success: function (results) {
            if (results.error === false) {
                $('#image_show').html('<a href="' + results.url + '" target="_blank">' +
                    '<img src="' + results.url + '" width="100px"></a>');

                $('#thumb').val(results.url);
            } else {
                alert('Upload File Lỗi');
            }
        }
    });
});
