/*!
* @author Teitra Mega [office@teitramega.co.id]
* @package Jquery, Bootstraps JS, Tautocomplete, Bootstrap Notify
*/

$(document).ready(function () {
    var input_cari_nik = $("#cari-nik").tautocomplete({
        width: "700px",
        columns: ['NIK', 'NAMA', 'JNS KELAMIN','ALAMAT'],
        norecord: "NIK atau Nama tidak ditemukan!",
        placeholder: "Cari NIK / Nama penduduk ..",
        ajax: {
            url: base_url + "/candidate/penduduk",
            type: "GET",
            data: function () {
                return [{ test: input_cari_nik.searchdata() }];
            },
            success: function (data) {
                            
                var filterData = [];

                var searchData = eval("/" + input_cari_nik.searchdata() + "/gi");

                $.each(data, function (i, v) {
                    if (v.nik.search(new RegExp(searchData)) != -1) {
                        filterData.push(v);
                    }
                    if (v.nama.search(new RegExp(searchData)) != -1) {
                        filterData.push(v);
                    }
                });
                return filterData;
            }
        },
        onchange: function () {

            select_penduduk(input_cari_nik.id());
        }
    });

});

function select_penduduk(param) 
{

    $.get( base_url + "/candidate/penduduk/" + param , function( data ) 
    {
        $('td#data-nik').html(data.nik);
        $('td#data-nama').html(data.nama);
        $('td#data-tgl-lahir').html(data.tgl_lahir);
        $('td#data-jns-kelamin').html(data.jns_kelamin);
        $('td#data-alamat').html(data.alamat);

        $('td#data-agama').html(data.agama);
        $('td#data-status-kawin').html(data.status_kawin);
        $('td#data-kewarganegaraan').html(data.kewarganegaraan);

        if(data.status === true)
        {
            $('div#dialog-lanjutkan').modal('show');
        } 

    });

}

