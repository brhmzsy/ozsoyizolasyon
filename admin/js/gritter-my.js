var Gritter = function () {


    $('#basarili').click(function(){

        $.gritter.add({
            // (string | mandatory) the heading of the notification
            title: '<p style="color: #78cd51;">İşlem Başarılı</p>',
            // (string | mandatory) the text inside the notification
            text: 'Tebrikler işlem başarılı bir şekilde gerçekleşti.',
            // (bool | optional) if you want it to fade out on its own or just sit there
            sticky: false,
            // (int | optional) the time you want it to be alive for before fading out
            time: '1000'
        });

        return false;
    });
	
    $('#basarisiz').click(function(){

        $.gritter.add({
            // (string | mandatory) the heading of the notification
            title: '<p style="color: #ff6c60;">İşlem Başarısız</p>',
            // (string | mandatory) the text inside the notification
            text: 'İşlem başarısız bir hata gerçekleşti.',
            // (bool | optional) if you want it to fade out on its own or just sit there
            sticky: false,
            // (int | optional) the time you want it to be alive for before fading out
            time: '1000'
        });

        return false;
    });


}();