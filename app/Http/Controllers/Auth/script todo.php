 var app = new Vue({
            el: '#app',
            data: {
                message: {
                    judul: '',
                    surat: 'silahkan login',
                    pesan: 'anda login pada : ' + new Date().toLocaleString(),
                    array : [
                        {
                            content: 'isi pertama'
                        },
                        {
                            content: 'isi kedua'
                        },
                        {
                            content: 'isi ketiga'
                        }]
                }
            },
        })
        // .$mount("#app"); sama saja dengan el : diatas