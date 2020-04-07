<script>
    function show_per(museum,data, data1,data2) {

        var Museum = museum;
        var Id = data;
        var Num = data1;
        var volume = data2;
        console.log("data:" + Id, Num);
        location.replace("./main.php?Museum=" + Museum + "&Id=" + Id + "&Num=" + Num + "&volume=" + volume);
        // var Id = {
        //     Id: data,
        //     Num: data1
        // }
        // console.log(data1);

        // $.post("./main.php", Id, function(data, data1) {
        //     $('.center').hide();
        //     $("#Showtext").html(data, data1);
        // });
    }
</script>