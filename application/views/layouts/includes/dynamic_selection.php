<script>
$(document).ready(function () {
    //let's create arrays
    var options = {
        'Barang': [{
            display: "Lelang Umum",
            value: "LU"
        }, {
            display: "Lelang Sederhana",
            value: "LS"
        }, {
            display: "Pengadaan Langsung",
            value: "PL"
        }, {
            display: "Penunjukkan Langsung",
            value: "PK"
        }, {
            display: "Sayembara/Kontes",
            value: "SY"            
        }],

        'Konstruksi': [{
            display: "Pelelangan Umum",
            value: "LU"
        }, {
            display: "Pelelangan Terbatas",
            value: "LT"
        }, {
            display: "Pemilihan Langsung",
            value: "PML"
        }, {
            display: "Penunjukkan Langsung",
            value: "PK"
        }, {
            display: "Pengadaan Langsung",
            value: "PL"            
        }],

        'Konsultan': [{
            display: "Seleksi Umum",
            value: "SU"
        }, {
            display: "Seleksi Sederhana",
            value: "SS"
        }, {
            display: "Penunjukkan Langsung",
            value: "PK"
        }, {
            display: "Pengadaan Langsung",
            value: "PL"
        }, {
            display: "Sayembara",
            value: "SY"             
        }],

        'Jasa lainnya': [{
            display: "Lelang Umum",
            value: "LU"
        }, {
            display: "Lelang Sederhana",
            value: "LS"
        }, {
            display: "Penunjukkan Langsung",
            value: "PK"
        }, {
            display: "Pengadaan Langsung",
            value: "PL"            
        }, {
            display: "Sayembara/Kontes",
            value: "SY"            
        }]
    };

    //If parent option is changed
    $("#parent_selection").change(function () {
        var parent = $(this).val(); //get option value from parent

        if (options[parent] == undefined) {
            return $("#child_selection").html('');
        }
        list(options[parent]);
    });

    //function to populate child select box
    function list(array_list) {
        $("#child_selection").html(""); //reset child options
        $(array_list).each(function (i) { //populate child options
            $("#child_selection").append("<option value='" + array_list[i].value + "'>" + array_list[i].display + "</option>");
        });
    }

});

</script>
