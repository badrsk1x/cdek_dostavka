$( document ).ready(function() {

    $("#calculator-form").on("submit", function(){


        $.ajax({
            data: $(this).serialize(),
            type: $(this).attr('method'),
            url: 'result.php',
            success: function(response) {
               $('#table_delivery').html(response);

            }
        });
        return false;

    });


    $('select[name=city-from]').select2({
        language: 'ru',
        placeholder: 'Город не выбран',
        ajax: {
            url: 'https://api.cdek.ru/city/getListByTerm/jsonp.php?callback=?',
            dataType: "jsonp",
            data: function (params) {
                return {
                    q: params.term,
                    name_startsWith: params.term,
                };
            },
            processResults: function (resp) {
                var citys = [];

                if (typeof(resp.geonames) != 'object') {
                    return false;
                }
                //console.clear();
                //console.log(resp.geonames);
                resp.geonames.forEach(function(item, i) {
                    var obj = {};
                    obj.id = item.id;
                    obj.text = item.name;
                    obj.cityName = item.cityName;

                    citys.push(obj);
                });
                return {
                    results: citys,
                };
            },
        },
        minimumInputLength: 3,
        templateSelection: function (data) {
           $('#city-from').val(data.id);
           $('#city-from-name').val(data.cityName);
            if (data.id === '') {
                return 'Город не выбран';
            }
            return data.text;
        },
    });



    $('select[name=city-to]').select2({
        language: 'ru',
        placeholder: 'Город не выбран',
        ajax: {
            url: 'https://api.cdek.ru/city/getListByTerm/jsonp.php?callback=?',
            dataType: "jsonp",
            data: function (params) {
                return {
                    q: params.term,
                    name_startsWith: params.term,
                };
            },
            processResults: function (resp) {
                var citys = [];

                if (typeof(resp.geonames) != 'object') {
                    return false;
                }
                //console.clear();
                //console.log(resp.geonames);
                resp.geonames.forEach(function(item, i) {
                    var obj = {};
                    obj.id = item.id;
                    obj.text = item.name;
                    obj.cityName = item.cityName;

                    citys.push(obj);
                });
                return {
                    results: citys,
                };
            },
        },
        minimumInputLength: 3,
        templateSelection: function (data) {
            $('#city-to').val(data.id);
            $('#city-to-name').val(data.cityName);
            if (data.id === '') {
                return 'Город не выбран';
            }
            return data.text;
        },
    });



});