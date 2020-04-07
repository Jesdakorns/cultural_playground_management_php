// dashboard
if (window.location.href.indexOf('/dashboard') > 0) {
    function getShowCountDataset() {

        $.ajax({
            type: "GET",
            url: window.location.href + "api_count_dataset.php",
            success: function (result) {
                var myObj = JSON.parse(result);
                var sequence = 0;
                var datasets = [];
                var dataGraph = [];

                $("#item_count").html(myObj.item_count);
                $("#matching_count").html(myObj.matching_count);
                $("#puzzle_count").html(myObj.puzzle_count);
                $("#quiz_count").html(myObj.quiz_count);
                $("#mole_count").html(myObj.mole_count);
                $("#cosmos_count").html(myObj.cosmos_count);
                for (let index = 2; index < 7; index++) {
                    $.each(myObj.dataGames, function (key, val) {

                        if (val['status'] == "not data") {

                        } else {
                            if (val['code_game'] == index) {
                                sequence++;
                                datasets[sequence - 1] = {
                                    sequence: sequence,
                                    series: 'ชุดข้อมูลที่ ' + val['series'],
                                    game: val['game'],
                                    count: val['count'] + ' ครั้ง'
                                };
                                // console.table([sequence,index, val['code_game'], val['game'], val['count']]);
                            }
                        }
                    });
                }
                $('#antiques_statistics_table').DataTable({
                    pageLength: 5,
                    data: myObj.dataAntiquesStatistics,
                    columns: [
                        { "data": 'sequence' },
                        { "data": 'title' },
                        {
                            "data": function (data) {
                                return '<img src="' + data.image + '">';

                            }
                        },
                        {
                            "data": function (data) {
                                return data.count + ' ครั้ง';

                            }
                        },
                    ]
                });

                $('#chart_table').DataTable({
                    pageLength: 5,
                    data: datasets,
                    columns: [
                        { "data": 'sequence' },
                        { "data": 'series' },
                        { "data": 'game' },
                        { "data": 'count' },
                    ]
                });
                $.each(myObj.dataGraph, function (key, val) {
                    if (val['status'] == "not data") {

                    } else {
                        dataGraph[key] = {
                            name: val['name'],
                            percent: val['percent']
                        };
                        // console.table([sequence,index, val['code_game'], val['game'], val['count']]);
                    }
                    // console.log(val[key]);


                });

                CanvasJS.addColorSet("greenShades",
                    [//colorSet Array

                        "#047edf",
                        "#07cdae ",
                        "#ffd500",
                        "#9a55ff",
                        "#3e4b5b"
                    ]);

                var chart = new CanvasJS.Chart("chartContainer",
                    {
                        colorSet: "greenShades",
                        title: {
                            text: ""
                        },
                        legend: {
                            maxWidth: 350,
                            itemWidth: 120
                        },
                        data: [
                            {
                                type: "pie",
                                showInLegend: true,
                                legendText: "{indexLabel}",
                                dataPoints: [
                                    { y: dataGraph[0]['percent'], indexLabel: dataGraph[0]['name'] },
                                    { y: dataGraph[1]['percent'], indexLabel: dataGraph[1]['name'] },
                                    { y: dataGraph[2]['percent'], indexLabel: dataGraph[2]['name'] },
                                    { y: dataGraph[3]['percent'], indexLabel: dataGraph[3]['name'] },
                                    { y: dataGraph[4]['percent'], indexLabel: dataGraph[4]['name'] },

                                ]
                            }
                        ]
                    });
                chart.render();

            }
        });




    }
    setTimeout(getShowCountDataset)
    // setInterval(getShowCountDataset, 5000);   // 1000 = 1 second
}

// create_dataset
if (window.location.href.indexOf('/create_dataset') > 0) {
    function getCreateDataset() {
        $(document).ready(function () {
            $.ajax({
                type: "GET",
                url: window.location.href + "api_game.php",
                success: function (result) {
                    var myObj = JSON.parse(result);
                    $("#games").empty();
                    $.each(myObj, function (key, val) {
                        var option = "<option value=" + val["game_id"] + ">";
                        option = option + val["game_name"];
                        option = option + "</option>";
                        $('#games').append(option);
                    });
                }
            });

            $.ajax({
                type: "GET",
                url: window.location.href + "api_item.php",
                success: function (result) {
                    var myObj = JSON.parse(result);
                    $('#example').DataTable({
                        "data": myObj,
                        columns: [
                            { "data": "sequence" },
                            {
                                "data": function (data) {
                                    return '<img src="' + data.pic_path + '">';

                                }
                            },
                            { "data": "obj_title" },
                            {
                                "data": function (data) {
                                    return '<div class="form-check">' +
                                        '<label class="form-check-label">' +
                                        '<input type="checkbox" class="form-check-input checkbox" name="item[]" id="item[]" value="' + data.sequence + '" > เลือก <i class="input-helper"></i>' +
                                        '</label>' +
                                        '</div>';
                                }
                            }
                        ]
                    });
                }
            });
        });
    }

    function postCreateDataset() {
        var game = $("#games").val()
        var items = $('input:checked').map(function () {
            return $(this).val();
        });
        item = items.get();
        if (item.length == 0) {
            var formData = { gameId: game, all_items: [null] };
        } else {
            var formData = { gameId: game, all_items: item };
        }


        if (item.length == 8 && game != "1") {
            $.ajaxSetup({
                headers: {
                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                }
            });
            $.ajax(
                {
                    url: window.location.href + "create_dataset.php",
                    type: "POST",
                    data: formData,
                    success: function (data) {

                        var myObj = JSON.parse(data);


                        if (myObj.status == "success") {
                            swal({
                                title: "สำเร็จ",
                                text: "บันทึกข้อมูลสำเร็จ",
                                icon: "success",
                                timer: 3000,
                                button: false,
                            });
                        } else if (myObj.status == "unsuccessful") {
                            swal({
                                title: "ไม่สำเร็จ",
                                text: "บันทึกข้อมูลไม่สำเร็จ",
                                icon: "error",
                                button: "ตกลง",
                            });
                        } else if (myObj.status == "error") {
                            swal({
                                title: "ไม่สำเร็จ",
                                text: "ระบบมีปัญหาในการสร้างไฟล์ข้อมูล",
                                icon: "error",
                                button: "ตกลง",
                            });
                        } else if (myObj.status == "warning") {
                            swal({
                                title: "ไม่สำเร็จ",
                                text: "ไม่สามารถบันทึกข้อมูลได้ เนื่องจากเงื่อนไขในการบันทึกไม่ถูกต้อง",
                                icon: "warning",
                                button: "ตกลง",
                            });
                        }
                    },
                    error: function (jqXHR, textStatus, errorThrown) {
                        alert(jqXHR);
                    }
                });
        } else if (item.length < 8 && game != "1") {
            swal({
                title: "ไม่สำเร็จ",
                text: "ไม่สามารถบันทึกข้อมูลได้ เนื่องจากจำนวนข้อมูลที่เลือกไม่ถึง 8 ข้อมูล",
                icon: "warning",
                button: true,
            });
        } else if (item.length > 8 && game != "1") {
            swal({
                title: "ไม่สำเร็จ",
                text: "ไม่สามารถบันทึกข้อมูลได้ เนื่องจากจำนวนข้อมูลที่เลือกมากกว่า 8 ข้อมูล",
                icon: "warning",
                button: true,
            });
        } else if (game == "1") {
            swal({
                title: "ไม่สำเร็จ",
                text: "ไม่สามารถบันทึกข้อมูลได้ เนื่องจากไม่ได้เลือกเกม",
                icon: "warning",
                button: true,
            });
        }

    }
    setTimeout(getCreateDataset)
    $('#submit_add').on('click', function () {
        $("table").DataTable().destroy();
        setTimeout(getCreateDataset)
        postCreateDataset();
    });
}

// delete_dataset
if (window.location.href.indexOf('/delete_dataset') > 0) {
    $(document).ready(function () {
        $.ajax({
            type: "GET",
            url: window.location.href + "api_game.php",
            success: function (result) {
                var myObj = JSON.parse(result);
                $("#games").empty();
                $.each(myObj, function (key, val) {
                    var option = "<option value=" + val["game_id"] + ">";
                    option = option + val["game_name"];
                    option = option + "</option>";
                    $('#games').append(option);
                });
            }
        });
        var div = '<div class="col-md-12 text-center"><h4>ไม่พบข้อมูล</h4></div>';
        $('#data_delect').html(div);
    });

    function searchDelectDataset() {

        var count = 1;
        var game = $("#games").val()
        var formData = { gameId: game };
        $.ajaxSetup({
            headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            }
        });
        $.ajax(
            {
                url: window.location.href + "search_dataset.php",
                type: "POST",
                data: formData,
                success: function (result, textStatus, jqXHR) {
                    var data = JSON.parse(result);
                    // console.log(data);

                    $.each(data, function (key, val) {

                        if (val.status == "success") {
                            var div = '<div class="col-12 col-md-4 grid-margin stretch-card">' +
                                '<div class="card">' +
                                ' <div class="card-body remake">' +
                                ' <h4 class="card-title">ชุดข้อมูลที่ ' + count + '</h4>' +
                                '<hr>' +
                                '<div class="template-demo">' +

                                '<button type="submit" class="btn btn-gradient-danger btn-fw  mr-1" onclick="destroyDeleteDataset(this)" id="set_game" value="' + val.item + '">ลบชุดข้อมูล</button>' +

                                '<button type="submit" class="btn btn-light btn-fw " data-toggle="modal" data-target="#exampleModal" onclick="showDataset(this)" value="' + val.item + '">ดูข้อมูล</button>' +

                                '</div>' +
                                '</div>' +
                                '</div>' +
                                '</div>';

                            var $appendElem = $(div);
                            $appendElem.appendTo('#data_delect');
                        } else if (val.status == "warning") {
                            var div = '<div class="col-md-12 text-center"><h4>ไม่พบข้อมูล</h4></div>';
                            $('#data_delect').html(div);
                        }
                        count++;
                    });
                },
                error: function (jqXHR, textStatus, errorThrown) {
                    alert(jqXHR);
                }
            });
    }

    function destroyDeleteDataset(e) {

        var Id = $(e).val()
        var formData = { dataset_code: Id };

        $.ajaxSetup({
            headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            }
        });
        $.ajax(
            {
                url: window.location.href + "delete_dataset.php",
                type: "POST",
                data: formData,
                success: function (result, textStatus, jqXHR) {
                    var data = JSON.parse(result);
                    if (data.status == "success") {
                        swal({
                            title: "สำเร็จ",
                            text: "ลบข้อมูลสำเร็จ",
                            icon: "success",
                            timer: 3000,
                            button: false,
                        });
                    } else if (data.status == "unsuccessful") {
                        swal({
                            title: "ไม่สำเร็จ",
                            text: "ลบข้อมูลไม่สำเร็จ",
                            icon: "error",
                            button: "ตกลง",
                        });
                    }
                    $('#data_delect').html('');
                    searchDelectDataset()
                }
            });

    }

    $('#search_game').on('click', function () {
        $('#data_delect').html('');
        searchDelectDataset();
    });
}

// create_game
if (window.location.href.indexOf('/create_game') > 0) {

    $(document).ready(function () {
        $.ajax({
            type: "GET",
            url: window.location.href + "api_game.php",
            success: function (result) {
                var myObj = JSON.parse(result);

                $("#games").empty();
                $.each(myObj, function (key, val) {
                    var option = "<option value=" + val["game_id"] + ">";
                    option = option + val["game_name"];
                    option = option + "</option>";
                    $('#games').append(option);
                });
            }
        });
        var div = '<div class="col-md-12 text-center"><h4>ไม่พบข้อมูล</h4></div>';
        $('#data_game').html(div);
    });

    function searchDataset() {
        var count = 1;
        var game = $("#games").val()
        var formData = { gameId: game };
        $.ajaxSetup({
            headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            }
        });
        $.ajax(
            {
                url: window.location.href + "search_dataset.php",
                type: "POST",
                data: formData,
                success: function (result, textStatus, jqXHR) {
                    var data = JSON.parse(result);
                    $.each(data, function (key, val) {

                        if (val.status == "success") {
                            var div = '<div class="col-12 col-md-4 grid-margin stretch-card">' +
                                '<div class="card">' +
                                '<div class="card-body remake">' +
                                '<h4 class="card-title">ชุดข้อมูลที่ ' + count + '</h4>' +
                                '<hr>' +
                                '<div class="template-demo">' +
                                '<button type="submit" class="btn btn-gradient-primary btn-fw  mr-1" onclick="storeFormCreateGame(this)" id="set_game" value="' + val.item + '">สร้างเกม</button>' +
                                '<button type="submit" class="btn btn-light btn-fw " data-toggle="modal" data-target="#exampleModal" onclick="showDataset(this)" value="' + val.item + '">ดูข้อมูล</button>' +
                                '</div>' +
                                '</div>' +
                                '</div>' +
                                '</div>';

                            var $appendElem = $(div);
                            $appendElem.appendTo('#data_game');
                        } else if (val.status == "warning") {
                            var div = '<div class="col-md-12 text-center"><h4>ไม่พบข้อมูล</h4></div>';
                            $('#data_game').html(div);
                        }
                        count++;
                    });
                },
                error: function (jqXHR, textStatus, errorThrown) {
                    alert(jqXHR);
                }
            });
    }

    $('#search_game').on('click', function () {
        $('#data_game').html('');
        searchDataset();
    });

    function storeFormCreateGame(e) {
        var Id = $(e).val()
        var game = $("#games").val()
        var formData = { gameId: game, dataset_code: Id };

        $.ajaxSetup({
            headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            }
        });
        $.ajax(
            {
                url: window.location.href + "create_game.php",
                type: "POST",
                data: formData,
                success: function (result, textStatus, jqXHR) {
                    var data = JSON.parse(result);

                    window.open(data.game_url + "?Museum=" + data.code_user + "&Id=" + data.dataset_code);
                },
                error: function (jqXHR, textStatus, errorThrown) {
                    alert(jqXHR);
                }
            });
    }



}

function showDataset(e) {
    $('#dataset').html('');
    var Id = $(e).val()
    var formData = { Id: Id };
    $.ajaxSetup({
        headers: {
            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
        }
    });
    $.ajax(
        {
            url: window.location.href + "api_dataset.php?Id=" + Id,
            type: "GET",
            data: formData,
            success: function (result, textStatus, jqXHR) {
                var data = JSON.parse(result);
                console.log(data.dataset_url);
//                 cut_url = data.dataset_url.replace("https://navanurak.in.th/cultural_playground_management/", "");
                cut_url = data.dataset_url.replace("http://localhost/cultural_playground_management/", "");
                console.log(cut_url);

                $.getJSON(`../../${cut_url}`, function (data) {
                    console.log(data);
                    data['anurak'].forEach(value => {

                        var div = '<tr>' +
                            '<td>' + value.sequence + '</td>' +
                            '<td><img src="' + value.image + '"></td>' +
                            '<td>' + value.title + '</td>' +
                            '</tr>';

                        var $appendElem = $(div);
                        $appendElem.appendTo('#dataset');
                    });

                });
            }
        });
}

