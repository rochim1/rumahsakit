
            new Vue({
                el: '#vuetemp',
                data: {
                    fotoData: "{{asset('/images/index.png')}}",

                    data_form: {
                        rekamMedis: '{{$id_pasien}}',
                        nama_baru: '',
                        jenis_kelamin: '',
                        NIK: '',
                        warganegara: '',
                        agama: '',
                        tgl_lahir: '',
                        umur: '',
                        bulan: '',
                        namaibu: '',
                        pekerjaan: '',
                        telp: '',
                        email: '',

                        kelurahan: '',
                        kecamatan: '',
                        kabupaten: '',
                        kota: '',
                        alamat: '',

                        foto: '',

                        asuransi: '',
                        idasuransi: '',

                        bahasa: '',
                        cacatfisik: '',
                        cirifisik: '',
                    },
                    infotambahan: {
                        hubungan_kel: '',
                        nama_kel: '',
                        jenis_kel: '',
                        pekerjaan_kel: '',
                        telp_kel: '',
                        email_kel: '',

                        kelurahan_kel: '',
                        kecamatan_kel: '',
                        kabupaten_kel: '',
                        kota_kel: '',
                        alamat_kel: '',
                    }
                },
                mounted() {
                    this.apiKota();
                },
                methods: {
                    browsefile: function () {
                        $('#pilihprofil').click();
                    },
                    onImageChange(e) {
                        let files = e.target.files || e.dataTransfer.files;
                        if (!files.length) //jika tidak terisi
                            return;
                        this.createImage(files[0]);
                        // karena data berupa array maka file[0]
                    },
                    createImage(file) {

                        let reader = new FileReader();
                        let vm = this;
                        reader.onload = (e) => {
                            vm.fotoData = e.target.result;
                            vm.data_form.foto = file;
                        };
                        reader.readAsDataURL(file);
                    },
                    apiKota: function () {
                        axios.get("{{url('/daftarkota')}}").then(function (hasil) {
                            daftarKota = JSON.parse(hasil.data);
                            this.kota = daftarKota.provinsi;
                            // seharusnya cara menampilkannya memakai data vue, namun karena kendala variabel yang telat fill belum tahu cara nya
                            id = $('#kota');
                            id = $('#kota').html(
                                '<option value="">--provinsi--</option>');
                            for (let index = 0; index < this.kota.length; index++) {
                                id.append("<option value='" + this.kota[index].id +
                                    "'>" + this.kota[index].nama + '</option>');
                            }
                        });
                        this.apiKabupaten();
                        this.apiKecamatan();
                        this.apiKelurahan();
                    },
                    apiKabupaten: function () {

                        id = $('#kota');
                        idkota = id.val();
                        axios.get("/daftarkabupaten/" + idkota).then(
                            function (hasil) {
                                console.log(JSON.parse(hasil.data));
                                daftarKota = JSON.parse(hasil.data);
                                this.kabupaten = daftarKota.kota_kabupaten;
                                objkabupaten = $('#kabupaten');
                                objkabupaten.html(
                                    '<option value="">--Kabupaten--</option>');
                                for (let index = 0; index < this.kabupaten
                                    .length; index++) {
                                    objkabupaten.append("<option value='" + this
                                        .kabupaten[index].id + "'>" + this
                                        .kabupaten[index].nama + "</option>")
                                }
                            });
                        this.apiKecamatan();
                        this.apiKelurahan();
                    },
                    apiKecamatan: function () {

                        id = $('#kabupaten');
                        idkabupaten = id.val();
                        axios.get("/daftarkecamatan/" + idkabupaten).then(
                            function (hasil) {
                                console.log(JSON.parse(hasil.data));
                                daftarKota = JSON.parse(hasil.data);
                                this.kecamatan = daftarKota.kecamatan;
                                objkecamatan = $('#kecamatan');
                                objkecamatan.html(
                                    '<option value="">--Kecamatan--</option>');
                                for (let index = 0; index < this.kecamatan
                                    .length; index++) {
                                    objkecamatan.append("<option value='" + this
                                        .kecamatan[index].id + "'>" + this
                                        .kecamatan[index].nama + "</option>")
                                }
                            });
                        this.apiKelurahan();
                    },
                    apiKelurahan: function () {

                        id = $('#kecamatan');
                        idkelurahan = id.val();
                        axios.get("/daftarkelurahan/" + idkelurahan).then(
                            function (hasil) {
                                console.log(JSON.parse(hasil.data));
                                daftarKota = JSON.parse(hasil.data);
                                this.kelurahan = daftarKota.kelurahan;
                                objkelurahan = $('#kelurahan');
                                objkelurahan.html(
                                    '<option value="">--Kelurahan--</option>');
                                for (let index = 0; index < this.kelurahan
                                    .length; index++) {
                                    objkelurahan.append("<option value='" + this
                                        .kelurahan[index].id + "'>" + this
                                        .kelurahan[index].nama + "</option>")
                                }
                            });
                    },
                    generate: function () {
                        axios.get("{{route('rekammedis')}}").then(
                            Respons => {
                                this.data_form.rekamMedis = Respons.data;
                            }
                        )
                        // kedepan nomor RM akan dirapikan dan berurutan
                    },
                    clear: function () {
                        const vm = this;
                        $.each(this.data_form, function (index, value) {
                            vm.data_form[index] = '';
                        });
                        $.each(this.infotambahan, function (index, value) {
                            vm.infotambahan[index] = '';
                        });
                        vm.fotoData = "{{asset('/images/index.png')}}";
                    },
                    simpanpasien: function () {
                        if (this.data_form.rekamMedis) {
                            const self = this;
                            var data = new FormData();
                            $.each(this.data_form, function (index, value) {
                                data.append(index, value);
                            });
                            if (this.infotambahan.hubungan_kel) {
                                $.each(this.infotambahan, function (index, value) {
                                    data.infotambahan(index, value);
                                });
                            }
                            axios.post("{{route('daftarPasien')}}", data)
                                .then(Respon => {
                                    console.log(Respon.data.message.nama);
                                    swal("Berhasil Input Pasien!",
                                        Respon.data.message.nama +
                                        " dengan No.RM : " +
                                        Respon.data.message.rekam, "success");
                                    this.clear();
                                    this.generate();
                                })
                                .catch(err => {
                                    swal("Gagal Input Pasien!",
                                        "periksa form atau segera hubungi administrator",
                                        "error");
                                });
                        } else {
                            swal("Gagal Input Pasien!", "generate no rekam medis", "error");
                        }
                    },
                    umur: function () {
                        this.data_form.tgl_lahir = $("#mdate").val();
                        if (this.data_form.tgl_lahir) {
                            bulan = this.data_form.tgl_lahir.substr(5, 2).toString();
                            tanggal = this.data_form.tgl_lahir.substr(8, 2).toString();
                            tahun = this.data_form.tgl_lahir.substr(0, 4).toString();
                            this.getAge(bulan + "/" + tanggal + "/" + tahun);
                        } else {
                            swal("isikan tanggal lahir", "", "warning");
                        }
                    },
                    getAge: function (dateString) {
                        {
                            var now = new Date();
                            var today = new Date(now.getYear(), now.getMonth(), now
                                .getDate());

                            var yearNow = now.getYear();
                            var monthNow = now.getMonth();
                            var dateNow = now.getDate();

                            var dob = new Date(dateString.substring(6, 10),
                                dateString.substring(0, 2) - 1,
                                dateString.substring(3, 5)
                            );

                            var yearDob = dob.getYear();
                            var monthDob = dob.getMonth();
                            var dateDob = dob.getDate();
                            var age = {};
                            var ageString = "";
                            var yearString = "";
                            var monthString = "";
                            var dayString = "";


                            yearAge = yearNow - yearDob;

                            if (monthNow >= monthDob)
                                var monthAge = monthNow - monthDob;
                            else {
                                yearAge--;
                                var monthAge = 12 + monthNow - monthDob;
                            }

                            if (dateNow >= dateDob)
                                var dateAge = dateNow - dateDob;
                            else {
                                monthAge--;
                                var dateAge = 31 + dateNow - dateDob;

                                if (monthAge < 0) {
                                    monthAge = 11;
                                    yearAge--;
                                }
                            }

                            age = {
                                years: yearAge,
                                months: monthAge,
                                days: dateAge
                            };

                            if (age.years > 1) yearString = " tahun";
                            else yearString = " tahun";
                            if (age.months > 1) monthString = " bulan";
                            else monthString = " bulan";
                            if (age.days > 1) dayString = " hari";
                            else dayString = " hari";


                            if ((age.years > 0) && (age.months > 0) && (age.days > 0)) {
                                this.data_form.umur = age.years + yearString;
                                this.data_form.bulan = age.months + monthString;
                                days = age.days + dayString;
                            } else if ((age.years == 0) && (age.months == 0) && (age.days >
                                    0)) {
                                this.data_form.umur = 0;
                                this.data_form.bulan = 0;
                                days = age.days + dayString;
                            } else if ((age.years > 0) && (age.months == 0) && (age.days ==
                                    0)) {
                                this.data_form.umur = age.years + yearString;
                                this.data_form.bulan = 0;
                                days = "HBD";
                            } else if ((age.years > 0) && (age.months > 0) && (age.days ==
                                    0)) {
                                this.data_form.umur = age.years + yearString;
                                this.data_form.bulan = age.months + monthString;
                                days = 0;
                            } else if ((age.years == 0) && (age.months > 0) && (age.days >
                                    0)) {
                                this.data_form.umur = 0;
                                this.data_form.bulan = age.months + monthString;
                                days = age.days + dayString;
                            } else if ((age.years > 0) && (age.months == 0) && (age.days >
                                    0)) {
                                this.data_form.umur = age.years + yearString;
                                this.data_form.bulan = 0;
                                days = age.days;
                            } else if ((age.years == 0) && (age.months > 0) && (age.days ==
                                    0)) {
                                this.data_form.umur = 0;
                                this.data_form.bulan = age.months + monthString;
                                days = 0;
                            } else ageString = "Oops! Could not calculate age!";
                        }
                    },
                    printFormMedis: function () {
                        var prtContent = document.getElementById("form_register");
                        var WinPrint = window.open();
                        WinPrint.document.write(prtContent.innerHTML);
                        WinPrint.document.close();
                        WinPrint.focus();
                        WinPrint.print();
                        WinPrint.close();
                    }
                },

            })

