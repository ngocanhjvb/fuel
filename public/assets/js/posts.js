$(document).ready(function () {
    $('#images').change(function () {
        if (this.files && this.files[0]) {
            let reader = new FileReader();
            //Sự kiện file đã được load vào website
            let img = $(this).parent().find('img');
            reader.onload = function (e) {
                //Thay đổi đường dẫn ảnh
                img.attr('src', e.target.result);
            };
            reader.readAsDataURL(this.files[0]);
        }
    })
});
