<html lang="en">
    <head>
        <meta charset="utf-8" />

        <style>

            dl {
                display: table;
            }

            dt, dd {
                display: table-cell;
            }

/*            td:first-child {
                text-align: right;
            }*/

        </style>

    </head>
    <body>
        <h2 style="text-align: center"> BALAI KONSERVASI SUMBER DAYA ALAM </h2>
        <div style="height: 40px"></div>
        <div>
            <div style="display: inline-block">
                <address style="font-size: 10pt">
                    BKSDA Kalimantan Barat <br>
                    Jl. Jenderal Ahmad Yani No.121, Bansir Darat, Pontianak Tenggara, Kota Pontianak <br>
                    bksda-kalbar@bksda.go.id<br>
                    78124, Kalimantan Barat<br>
                    Indonesia
                </address>
            </div>
            <div style="display: inline-block; text-align: right; width: 200px">
                {{ $date->format("j F Y") }}
            </div>
        </div>
            
        <hr>
        
        <h3> PROPOSAL PENGAJUAN IZIN PENANGKARAN HEWAN </h3>
        
        <table>
            <tbody>
                <tr>
                    <td> Nama Pemohon: </td> <td> {{ $permit->user->name }} </td>
                </tr>
                <tr>
                    <td> NIK: </td> <td> {{ $permit->user->identity_code }} </td>
                </tr>
                <tr>
                    <td> Spesies Hewan: </td> <td> {{ $permit->species }} </td>
                </tr>
                
                <tr>
                    <td colspan="2" style="text-align: left; height: 40px; vertical-align: bottom;">
                        INDUKAN JANTAN
                    </td>
                </tr>
                <tr> <td> Nama: </td> <td> {{ $permit->father_name }} </td> </tr>
                <tr> <td> Tempat Lahir: </td> <td> {{ $permit->father_birthplace }} </td> </tr>
                <tr> <td> Tanggal Lahir: </td> <td> {{ $permit->father_birthdate->format("j F Y") }} </td> </tr>
                <tr> <td> Generasi: </td> <td> F{{ $permit->father_generation }} </td> </tr>
                <tr> <td> No. Sertifikat: </td> <td> F{{ $permit->father_certificate_code }} </td> </tr>

                <tr>
                    <td colspan="2" style="text-align: left; height: 40px; vertical-align: bottom;">
                        INDUKAN BETINA
                    </td>
                </tr>
                <tr> <td> Nama: </td> <td> {{ $permit->mother_name }} </td> </tr>
                <tr> <td> Tempat Lahir: </td> <td> {{ $permit->mother_birthplace }} </td> </tr>
                <tr> <td> Tanggal Lahir: </td> <td> F{{ $permit->mother_generation }} </td> </tr>
                <tr> <td> Tanggal Lahir: </td> <td> F{{ $permit->mother_generation }} </td> </tr>
                <tr> <td> No. Sertifikat: </td> <td> F{{ $permit->mother_certificate_code }} </td> </tr>

            </tbody>
        </table>

    </body>
</html>